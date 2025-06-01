<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;


class CheckoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $user_id = auth()->user()->id;

            if ($request->product_id) {
                $product_id = Crypt::decryptString($request->product_id);

                $data = DB::table('products')->where('id', $product_id)->get();
                $total_amount = 0;

                foreach ($data as $k => $val) {
                    $image = json_decode($val->image);
                    if (!empty($image[0])) {
                        $val->image = url('/' . $image[0]);
                    } else {
                        $val->image = '';
                    }
                    $val->size = $request->size;
                    $val->color = $request->color;
                    $val->quantity = $request->quantity;
                    $val->total_amount = ($request->quantity) * ($val->price);
                    $total_amount = ($request->quantity) * ($val->price);
                }
            } else {
                $query = DB::table('cart')->where('cart.user_id', $user_id)->where('cart.status', 1);
                $total_amount = $query->clone()->sum('cart.total_amount');
                $data = $query->leftjoin('products', 'products.id', '=', 'cart.product_id')
                    ->select('cart.*', 'products.name', 'products.description', 'products.image')
                    ->get();
                foreach ($data as $k => $val) {
                    $image = json_decode($val->image);
                    if (!empty($image[0])) {
                        $val->image = url('/' . $image[0]);
                    } else {
                        $val->image = '';
                    }
                }
            }




            return view('checkouts', ['data' => $data, 'total_amount' => $total_amount]);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "address" => "required",
            "city" => "required",
            "state" => "required",
            "pincode" => "required",

            "cart_number" => "required|numeric|digits_between:13,19",
            "security_code" => "required|numeric|digits_between:4,4",
            "name_on_cart" => "required",
            'expiration_date' => [
                'required',
                'regex:/^(0[1-9]|1[0-2]) \/ \d{2}$/'
            ],

        ]);

        $user_id = auth()->user()->id;
        $product_id = [];

        if ($request->product_id) {
            $product_id_in = Crypt::decryptString($request->product_id);

            $product_id[] = $product_id_in;

            $data = DB::table('products')->where('id', $product_id_in)->get();
            $total_amount = 0;

            foreach ($data as $k => $val) {
                $image = json_decode($val->image);
                if (!empty($image[0])) {
                    $val->image = url('/' . $image[0]);
                } else {
                    $val->image = '';
                }
                $val->size = $request->size;
                $val->color = $request->color;
                $val->quantity = $request->quantity;
                $val->total_amount = ($request->quantity) * ($val->price);
                $total_amount = ($request->quantity) * ($val->price);
                $val->product_id = $val->id;
            }
        } else {
            $query = DB::table('cart')->where('cart.user_id', $user_id)->where('cart.status', 1);
            $total_amount = $query->clone()->sum('cart.total_amount');
            $data = $query->leftjoin('products', 'products.id', '=', 'cart.product_id')
                ->select('cart.*', 'products.name', 'products.description', 'products.image')
                ->get();
            foreach ($data as $k => $val) {
                $image = json_decode($val->image);
                if (!empty($image[0])) {
                    $val->image = url('/' . $image[0]);
                } else {
                    $val->image = '';
                }
                $product_id[] = $val->product_id;
            }

            $cart_status = DB::table('cart')->where('cart.user_id', $user_id)->where('cart.status', 1)->update(['status' => 0]);
        }

        if (count($product_id) == 0) {
            return redirect('/orders')->with('error', 'Order placed failed!');
        }

        // dd($product_id);

        $tax_amount = 0;

        $order = [
            "user_id" => $user_id,
            "product_id" => json_encode($product_id),
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "address" => $request->address,
            "city" => $request->city,
            "state" => $request->state,
            "pincode" => $request->pincode,
            "cart_number" => $request->cart_number,
            "security_code" => $request->security_code,
            "name_on_cart" => $request->name_on_cart,
            "expiration_date" => $request->expiration_date,

            "tax_amount" => $tax_amount,
            "total_amount" => $total_amount,
            "status" => 1,
        ];


        $order_id =  DB::table('order')->insertGetId($order);

        $status = 0;
        foreach ($data as $val) {

            $product = [
                "user_id" => $user_id,
                "order_id" => $order_id,
                "product_id" => $val->product_id,
                "name" => $val->name,
                "image" => $val->image,
                "size" => $val->size,
                "color" => $val->color,
                "price" => $val->price,
                "quantity" => $val->quantity,
                "total_amount" => $val->total_amount,
                "status" => $status,
            ];

            $order_product =  DB::table('order_product')->insertGetId($product);
        }

        // send email
        // $total_amount = $total_amount;
        $name = auth()->user()->name;
        $email = auth()->user()->email;

        Mail::to($email)->send(new OrderMail($data, $total_amount, $name));
        //end email

        return redirect('/orders')->with('success', 'Order placed successfully!');

        // return redirect('/orders')->with('error', 'Order placed failed!');
    }


    public function show()
    {

        // return $this->subject('Test Email from Laravel')
        //     ->view('email.order');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
