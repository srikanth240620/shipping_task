@extends('layouts.main')

@section('style')

@stop

@section('content')  



 <div class="text-center pt-4 cart_empty_design">

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show ml-auto mr-auto" style="width: 600px" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show ml-auto mr-auto" style="width: 600px" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


    <h4 class="mt-4 mb-3">Your Orders </h4>
 <div class='btn-holder'>
                        <a href="{{url('/')}}" class="hover-border-1 shadow m-0 text-center">
                            <span>Continue Shopping</span>
                        </a>
                    </div>
                    </div>


@php

$data = DB::table('order_product')->where('order_product.user_id',auth()->user()->id)
->join('order','order.id','=','order_product.order_id')
->select('order_product.*','order.status as order_status')
->orderby('order_product.id','desc')
->get();



@endphp




 <div class="container cart_hide">
            <table class="table">
                <thead>
                    <tr>
                        <th width="40%">PRODUCT</th>
                        <th width="20%">ORDER STATUS</th>
                        <th width="25%">SHIPPING STATUS</th>
                        <th width="15%" class="text-end">TOTAL AMOUNT</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $k=>$val)

                    <tr class="remove_row_{{($k+1)}}">
                        <td>
                            <div class="d-flex">
                                <img src="{{$val->image}}"
                                    alt="" width="100" height="100">
                                <div class="ml-5">
                                    <a href="{{url('/products/'.Crypt::encryptString($val->product_id))}}" style="color:black;"><h5>{{$val->name}}</h5></a>
                                    <p class="m-0">Price - {{$val->price}}</p>
                                    <p class="m-0">Size - {{$val->size}}</p>
                                    <p class="m-0">Color - {{$val->color}}</p>
                                </div>
                            </div>
                        </td>

 <td>
                                @if($val->order_status==1)
                               <span class="text-success">Success</span>
                               @elseif($val->order_status==2)
                               <span class="text-danger">Failed</span>
                               @else
                               <span class="text-danger">Pending</span>
                               @endif

                        </td>


                        <td>
                                @if($val->status==1)
                               <span class="text-success">Success</span>
                               @elseif($val->status==2)
                               <span class="text-danger">Failed</span>
                               @else
                               <span class="text-danger">Pending</span>
                               @endif

                        </td>
                        <td class="text-end">
                            <div>Rs. <span class="total_sum_{{($k+1)}}">{{$val->total_amount}}</span></div>
                            <input type="hidden" name="total_amount[]" class="total_am_{{($k+1)}}" value="{{$val->total_amount}}">
                        </td>
                    </tr>

                    @endforeach


                </tbody>
            </table>
           
 </div>
            
          

       

         @endsection

    @section('script')

    <script src="{{url('/js/orders.js')}}"></script>


    @stop