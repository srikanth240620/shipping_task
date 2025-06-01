@extends('layouts.main')
@section('style')

<style>
    #slideshow-items-container {
    position: relative;
    display: inline-block;
    width: 520px;
    height: 500px;
    overflow: hidden;
    border: 1px solid #ccc;
  }
  .slideshow-items {
    width: 520px;
    height: 500px;
    display: none;
  }
  .slideshow-items.active {
    display: block;
  }
  .slideshow-thumbnails {
    width: 100px;
    height: 100px;
    cursor: pointer;
    opacity: 0.5;
    display: inline-block;
    vertical-align: top;
    border: 1px solid #ccc;
    margin: 5px 5px 0 0;
  }
  .slideshow-thumbnails.active {
    opacity: 1;
    border-color: #000;
  }
  #lens {
    position: absolute;
    border: 1px solid #888;
    width: 165px;
    height: 165px;
    background-color: rgba(255, 255, 255, 0.4);
    display: none;
    pointer-events: none; /* IMPORTANT: allow mouse events to pass through */
    z-index: 10;
  }
  #result {
    position: absolute;
    border: 1px solid #888;
    width: 430px;
    height: 430px;
    display: none;
    top: 0;
    left: 520px; /* to the right of the image */
    background-repeat: no-repeat;
    z-index: 10;
  }
  .slideshow-items.active {
    cursor: crosshair;
  }
</style>
@stop
@section('content')  
<div class="container mt-3">
   <div class="row">
      <div class="col-md-6">
         <div id='lens'></div>
         <div id='slideshow-items-container'>
            @foreach ($data->image as $k=>$img)
            <img class='slideshow-items @if($k===0) active @endif'
               src='{{$img}}'>
            @endforeach
         </div>
         <div id='result'></div>
         <div class=''>
            @foreach ($data->image as $k=>$img)
            <img class='slideshow-thumbnails @if($k===0) active @endif'
               src='{{$img}}'>
            @endforeach
         </div>
      </div>
      <div class="col-md-6">
         <h4>{{$data->name}}</h4>
         <p>{{$data->description}}</p>
         <form action="{{ url('/checkouts') }}" method="GET" class="">
         <input type="hidden" name="product_id" value="{{$data->encode}}">
         <input type="hidden" name="type" value="product">
         <div class="mb-3">
            <h2 class="h5 fw-semibold mb-3" style="font-size: 16px;">Size</h2>
            <div class="size-option d-flex">
               @foreach ($data->size as $k=>$v)
               <input type="radio" id="size-{{$k}}"  @if($k===0) checked @endif name="size" value="{{$v}}">
               <label for="size-{{$k}}">{{$v}}</label>
               @endforeach
            </div>
         </div>
         <div class="mb-3">
            <h2 class="h5 fw-semibold mb-3" style="font-size: 16px;">Color</h2>
            <div class="size-option d-flex">
               @foreach ($data->color as $k=>$v)
               <input type="radio" id="color-{{$k}}"  @if($k===0) checked @endif name="color" value="{{$v}}">
               <label for="color-{{$k}}" style="text-transform: capitalize;">{{$v}}</label>
               @endforeach
            </div>
         </div>
         <h2 class="h5 fw-semibold mb-3" style="font-size: 16px;">Quantity</h2>
         <div class="d-flex mt-3">
            <button id="btn-plus" type="button" class="btn btn-outline-dark" onclick="quantity_update('less')">
                <i class="fa fa-minus" aria-hidden="true"></i>
            </button>
            <span id="counter" class="ml-4 mr-4 quantity_text mt-auto mb-auto"
               style="font-size: 18px;">1</span>
            <input type="hidden" value="1" name="quantity" class="quantity_input">
            <button id="btn-minus" type="button" class="btn btn-outline-dark" onclick="quantity_update('add')">
                <i class="fa fa-plus" aria-hidden="true"></i>
                
            </button>
         </div>
         <h2 class="h5 fw-semibold mt-3" style="font-size: 16px;">Price</h2>
         <input type="hidden" name="price" class="price" value="{{$data->price}}">
         <span class="price_num">RS <span class="price_value">{{$data->price}}</span></span>
         <div class='btn-holder mt-5'>
            <button class="hover-border-1 shadow m-0 w-50 text-center" type="submit">
            <span>Buy Now</span>
            </button>
            {{-- <a href="#" class="hover-border-1 shadow">
            <span>Add to Cart</span>
            </a> --}}
         </div>
      </div>
   </div>

   <hr class="mt-5">
   {{-- product list --}}
<div class="row  pt-xl-5">


    @php
  $products=DB::table('products')
  ->where('id','!=',$data->id)
  ->where('status',1)->get();

  foreach ($products as $key => $value) {
    $image=json_decode($value->image);
    $value->img=$image[0]??"";
     $value->encode = Crypt::encryptString($value->id);
  }
        

    @endphp

    @foreach($products as $val)

   

            <div class="col-md-4 mb-3">

                <div class="product-card">
                    <a href="{{url('products/'.$val->encode)}}" class="redirect_a_tag">
                        <div class="product-image-container">

                          
                            <img src="{{url('/'.$val->img)}}"
                                class="product-image" alt="Product">

                        </div>
                        <div class="product-info">
                            <h5 class="mt-2 mb-1">{{$val->name}}</h5>

                            <div class="product-price">

                                <span style="font-size: 18px; color: #28a745; font-weight: bold;" class="ml-2">RS
                                    {{$val->price}}</span>
                            </div>
                            {{-- <div class="product-icons">
                                <div class='btn-holder'>
                                    <button class="hover-border-1 shadow" onclick="add_cart(event,'{{$val->id}}')">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div> --}}
                        </div>
                    </a>
                </div>

            </div>

             @endforeach

           

        </div>

   {{-- End product list --}}

</div>


 


@endsection
@section('script')

    <script src="{{url('/js/product.js')}}"></script>

@stop