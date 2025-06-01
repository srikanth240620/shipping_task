<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Crypt;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $user_id = auth()->user()->id;

            $query = DB::table('cart')->where('cart.user_id', $user_id)->where('cart.status', 1);

            $total_amount = $query->clone()->sum('cart.total_amount');

            $data = $query->leftjoin('products', 'products.id', '=', 'cart.product_id')
                ->select('cart.*', 'products.name', 'products.description', 'products.image')
                ->orderby('cart.id', 'desc')
                ->get();

            foreach ($data as $k => $val) {

                $image = json_decode($val->image);

                if (!empty($image[0])) {
                    $val->image = url('/' . $image[0]);
                } else {
                    $val->image = '';
                }
                $val->encode = Crypt::encryptString($val->product_id);
            }


            return view('cart', ['data' => $data, 'total_amount' => $total_amount]);
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
        try {

            $product = DB::table('products')->where('id', $request->product_id)->first();

            if ($product) {
                $quantity = 1;
                $total_amount = $product->price;

                $size = (json_decode($product->size)[0]) ?? '';
                $color = (json_decode($product->color)[0]) ?? '';


                if ($request->quantity) {
                    $quantity = $request->quantity;
                    $total_amount = ($request->quantity) * ($product->price);
                }
                if ($request->size) {
                    $size = $request->size;
                }
                if ($request->color) {
                    $color = $request->color;
                }
                $user_id = auth()->user()->id;

                $data = [
                    "user_id" => $user_id,
                    "product_id" => $product->id,
                    "price" => $product->price,
                    "quantity" => $quantity,
                    "total_amount" => $total_amount,
                    "size" => $size,
                    "color" => $color,
                    "status" => 1,
                ];



                $check_cart =  DB::table('cart')->where('product_id', $product->id)->where('status', 1)->where('user_id', $user_id)->first();

                if ($check_cart && $check_cart->size == $size && $check_cart->color == $color) {
                    $total_quantity = $quantity + $check_cart->quantity;
                    $data['quantity'] = $total_quantity;
                    $data['total_amount'] = ($total_quantity * $product->price);
                    $cart = DB::table('cart')->where('id', $check_cart->id)->update($data);
                } else {
                    $cart = DB::table('cart')->insert($data);
                }

                $cart_count = DB::table('cart')->where('status', 1)->where('user_id', $user_id)->sum('quantity');
                $product->encode = url('/checkouts') . '/' . Crypt::encryptString($product->id) . '?type=product';
                $product->size = $size;
                $product->color = $color;
                $img = json_decode($product->image)[0] ?? '';
                $product->img = $img;




                return [
                    "code" => 200,
                    "message" => "cart added successfully",
                    "cart_count" => $cart_count,
                    "data" => $product,

                ];
            }

            return [
                "code" => 400,
                "message" => "cart added failed",
            ];
        } catch (\Exception $e) {
            return [
                "code" => 400,
                "message" => "cart added failed",
            ];
        }
    }

    public function update(Request $request)
    {
        try {

            $user_id = auth()->user()->id;

            $check_cart = DB::table('cart')->where('id', $request->cart_id)->where('user_id', $user_id)->first();

            if ($check_cart) {

                if ($request->type == 'remove') {
                    $data = ['status' => 0];
                } else {
                    $data = [
                        "quantity" => $request->quantity,
                        "total_amount" => ($request->quantity) * ($check_cart->price),
                    ];
                }
                $check_cart = DB::table('cart')->where('id', $request->cart_id)->update($data);


                $cart_count = DB::table('cart')->where('user_id', $user_id)->where('status', 1)->sum('quantity');

                return [
                    "code" => 200,
                    "message" => "cart update successfully",
                    "cart_count" => $cart_count,
                ];
            }


            return [
                "code" => 400,
                "message" => "cart update failed",
            ];
        } catch (\Exception $e) {
            return [
                "code" => 400,
                "message" => "cart update failed",
            ];
        }
    }
}
