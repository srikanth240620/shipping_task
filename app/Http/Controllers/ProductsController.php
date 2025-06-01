<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Crypt;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        try {

            $id = Crypt::decryptString($id);

            $data = DB::table('products')->where('id', $id)->first();
            if ($data) {

                $image = json_decode($data->image);
                foreach ($image as $key => $val) {
                    $image[$key] = url('/' . $val);
                }
                $data->image = $image;
                $data->size = json_decode($data->size);

                $data->color = json_decode($data->color);

                $data->encode = Crypt::encryptString($data->id);

                // dd($data);

                return view('products', ['data' => $data]);
            }
            return redirect('/home');
        } catch (\Exception $e) {
            return redirect('/home');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
