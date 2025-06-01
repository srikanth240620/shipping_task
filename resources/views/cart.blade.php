@extends('layouts.main')

@section('style')

@stop

@section('content')  

@if(count($data)>0)
 <div class="container cart_hide">
            <table class="table">
                <thead>
                    <tr>
                        <th width="60%">PRODUCT</th>
                        <th width="20%">QUANTITY</th>
                        <th width="20%" class="text-end">TOTAL</th>
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
                                    <a href="{{url('/products/'.$val->encode)}}" style="color:black;"><h5>{{$val->name}}</h5></a>
                                    <p class="m-0">Price - {{$val->price}}</p>
                                    <p class="m-0">Size - {{$val->size}}</p>
                                    <p class="m-0">Color - {{$val->color}}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex">
                                <button id="btn-minus" class="btn btn-outline-dark" onclick="quantity_infor('less',{{($k+1)}},{{$val->id}})"><i
                                        class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                                <span id="counter" class="ml-4 mr-4 quantity_text_{{($k+1)}} mt-auto mb-auto"
                                    style="font-size: 18px;">{{$val->quantity}}</span>
                                <input type="hidden" value="{{$val->quantity}}" name="quantity[]" class="quantity_input_{{($k+1)}}">
                                <input type="hidden" value="{{$val->price}}" name="price[]" class="price_input_{{($k+1)}}">

                                 <button id="btn-plus" class="btn btn-outline-dark" onclick="quantity_infor('add',{{($k+1)}},{{$val->id}})"><i
                                        class="fa fa-plus" aria-hidden="true"></i>
                                </button>

                               
                                <i class="fa fa-trash cursor-pointer mb-auto ml-3 mt-auto" aria-hidden="true" onclick="update_cart('{{($k+1)}}','{{$val->id}}','remove',0)"></i>
                            </div>

                        </td>
                        <td class="text-end">
                            <div>Rs. <span class="total_sum_{{($k+1)}}">{{$val->total_amount}}</span></div>
                            <input type="hidden" name="total_amount[]" class="total_am_{{($k+1)}}" value="{{$val->total_amount}}">
                        </td>
                    </tr>

                    @endforeach


                </tbody>
            </table>
            <hr>

            <div class="d-flex justify-content-end">
                <div class="width_checkout">
                    <h4>Estimated total Rs. <span class="full_total_amount">{{$total_amount}}</span></h4>
                    <p>Taxes, discounts and shipping calculated at checkout.</p>
                    <div class='btn-holder'>
                        <a href="{{url('checkouts')}}" class="hover-border-1 shadow m-0 text-center">
                            <span>Buy Now</span>
                        </a>
                    </div>
                </div>
            </div>
 </div>
              @endif
           
 <div class="text-center pt-4 cart_empty_design" @if(count($data)>0) style="display: none" @endif>
    <h4 class="mt-4 mb-3">Your cart is empty</h4>
 <div class='btn-holder'>
                        <a href="{{url('/')}}" class="hover-border-1 shadow m-0 text-center">
                            <span>Continue Shopping</span>
                        </a>
                    </div>
                    </div>

          

       

         @endsection

    @section('script')

    <script src="{{url('/js/cart.js')}}"></script>


    @stop