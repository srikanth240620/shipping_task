@extends('layouts.main')

@section('style')

<style>
 #slideshow-items-container {
    position: relative;
    display: inline-block;
    width: 370px;
    height: 400px;
    overflow: hidden;
    border: 1px solid #ccc;
  }
  .slideshow-items {
    width: 370px;
    height: 400px;
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
    width: 330px;
    height: 330px;
    display: none;
    top: 0;
    left: 520px; /* to the right of the image */
    background-repeat: no-repeat;
    z-index: 10;
  }
  .slideshow-items.active {
    cursor: crosshair;
  }
 /* #lens {
  width: 365px;
  height: 165px;
  background-color: rgba(233, 233, 233, 0.4);
  position: absolute;
  display: none;
  z-index: 1;
  border: 1px solid var(--light-grey-2);
  pointer-events: none;
}

#result {
  display: none;
  position: absolute;
  z-index: 1;
  border: 1px solid var(--light-grey-2);
  background-repeat: no-repeat;
  background-position: 0 0;
  background-size: cover;
} */
</style>

@stop

@section('content')  

@if(request('search'))
<div style="width: 405px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 23px;
    text-align:center;">
    <h5>Search results</h5>
<form action="{{url('/')}}" method="get">
 <input type="text" class="form-control" name="search" placeholder="Search here..." id="searchInput" value="{{request('search')}}" style="width:100%;">
<div class='btn-holder mb-0'>

                                    <button type="submit" class="hover-border-1 shadow text-center">
                                        <span>Search</span>
                                    </button>
                                    <a href="{{url('/')}}" class="hover-border-1 shadow text-center">
                                        <span>Reset</span>
                                    </a>
                                </div>
                                </form>
                                </div>
                                @endif

<div class="row  pt-xl-5">


    @php
$search=request('search');

  $products=DB::table('products')->where('status',1)->where('name', 'LIKE', '%' . $search . '%')->get();

  foreach ($products as $key => $value) {
    $image=json_decode($value->image);
    $value->image=$image;
    $value->img=url('/'.$image[0]??"");
     $value->encode = Crypt::encryptString($value->id);
 $value->size=json_decode($value->size);
  $value->color=json_decode($value->color);


  }
        

    @endphp



    @foreach($products as $val)

   

            <div class="col-md-3 mb-3">

                <div class="product-card">
                    <a href="{{url('products/'.$val->encode)}}" class="redirect_a_tag">
                        <div class="product-image-container">

                          
                            <img src="{{$val->img}}"
                                class="product-image" alt="Product">

                        </div>
                        <div class="product-info">
                            <h5 class="mt-2 mb-1">{{$val->name}}</h5>

                            <div class="product-price">

                                <span style="font-size: 18px; color: #28a745; font-weight: bold;" class="ml-2">RS
                                    {{$val->price}}</span>
                            </div>
                            <div class="product-icons mb-0">
                                <div class='btn-holder'>

                                    <button class="hover-border-1 shadow m-0" @if(count($val->size)>1 || count($val->color)>1) onclick="view_product(event,'{{ rawurlencode(json_encode($val)) }}')" @else onclick="add_cart(event,'single','{{$val->id}}')" @endif>
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

             @endforeach

           

        </div>


{{-- product details display --}}

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="ProductDetails" tabindex="-1" role="dialog" aria-labelledby="ProductDetailsLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> --}}
<div class="position-relative">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 30px;height: 30px;position: absolute;z-index: 10;right: 11px;top: 7px;">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      <div class="modal-body">


<div class="row">
 <div class="col-md-6">
         <div id='lens'></div>
         <div id='slideshow-items-container' class="production_top_images">
           
         </div>
         <div id='result'></div>
         <div class='production_bottom_images'>
          
         </div>
      </div>


      <div class="col-md-6">
         <h4 class="product_title_in" style="width: 92%"></h4>
         <p class="product_description_in"></p>
         <input type="hidden" name="product_id_in" value="" class="product_id_in" >
         <form action="{{ url('/checkouts') }}" method="GET" class="">
         <input type="hidden" name="product_id" value="" class="product_encode" >
         <input type="hidden" name="type" value="product">
         <div class="mb-3">
            <h2 class="h5 fw-semibold mb-3" style="font-size: 16px;">Size</h2>
            <div class="size-option d-flex size_details">
              
            </div>
         </div>
         <div class="mb-3">
            <h2 class="h5 fw-semibold mb-3" style="font-size: 16px;">Color</h2>
            <div class="size-option d-flex color_details">
              
            </div>
         </div>
         <h2 class="h5 fw-semibold mb-3" style="font-size: 16px;">Quantity</h2>
         <div class="d-flex mt-3">
           <button id="btn-minus" type="button" class="btn btn-outline-dark" onclick="quantity_update('less')"><i
               class="fa fa-minus" aria-hidden="true"></i>
            </button>
            <span id="counter" class="ml-4 mr-4 quantity_text mt-auto mb-auto"
               style="font-size: 18px;">1</span>
            <input type="hidden" value="1" name="quantity" class="quantity_input">
            <input type="hidden" value="" name="price" class="price">
            
 <button id="btn-plus" type="button" class="btn btn-outline-dark" onclick="quantity_update('add')"><i
               class="fa fa-plus" aria-hidden="true"></i>
            </button>

            
         </div>
         <h2 class="h5 fw-semibold mt-3" style="font-size: 16px;">Price</h2>
         <input type="hidden" name="price" class="product_price" value="">
         <span class="price_num">RS <span class="price_value"></span></span>
         <div class='btn-holder d-flex'>
             <button type="button" class="hover-border-1 shadow m-0 mr-5 text-center" onclick="add_cart(event,'multiple','0')">
            <span>Add to Cart</span>
            </button>
            <button class="hover-border-1 shadow m-0 text-center" type="submit">
            <span>Buy Now</span>
            </button>
           
         </div>
      </div>
   </div>


        
      </div>
      
    </div>
  </div>
</div>






{{-- Cart message --}}

        <div class="position-relative p-3 shadow rounded bg-white add_to_cart" style="display: none;">

<div class="d-flex justify-content-between">
    <div class="d-flex">
     <i class="fa fa-check mr-2 font-size: 21px; text-success" style="font-size: 22px;" aria-hidden="true"></i>
<div class="text-success">Item added to your cart</div>
</div>
<i class="fa fa-times close_cart" aria-hidden="true"></i>

</div>

<div class="d-flex mt-2">
    <img src="" width="100" class="cart_image_in" height="100" alt="">
    <div class="pl-2">
        <h6> <b class="product_title"></b></h6>
        <div>Size: <span class="product_size"></span></div>
        <div>Color: <span class="product_color"></span></div>
    </div>
</div>

<div class='btn-holder mb-0'>
                                    <a href="{{url('/cart')}}" class="hover-border-1 shadow w-75 text-center">
                                        <span>View cart</span>
                                    </a>

                                    <a href="{{url('/checkouts')}}" class="hover-border-1 shadow w-75 text-center check_out_rul">
                                        <span>Check Out</span>
                                    </a>
                                </div>


        </div>
        


         @endsection

    @section('script')
<script src="{{url('/js/home.js')}}"></script>

    @stop