@extends('layouts.main')

@section('style')

@stop

@section('content')  
 <div class="">
   <div class="row">
      <div class="col-md-6 checkout_padding_left pt-4" style="background: white">
        <form id="myForm" method="post" action="{{ url('/checkouts_store') }}" class="needs-validation" novalidate>
         @csrf
         @method('post')

<input type="hidden" name="product_id" value="{{ request('product_id') }}">
<input type="hidden" name="type" value="{{ request('type') }}">
<input type="hidden" name="size" value="{{ request('size') }}">
<input type="hidden" name="color" value="{{ request('color') }}">
<input type="hidden" name="quantity" value="{{ request('quantity') }}">

         <div class="row">
            <div class="col-md-12 mt-2">
               <h5>Contact</h5>
            </div>
            <div class="col-md-12 mt-2">
               <input type="email" value="{{auth()->user()->email}}" readonly class="form-control">
            </div>
            <div class="col-md-12 mt-2">
               <h5>Delivery</h5>
            </div>
            <div class="col-md-12 mt-2">
               <select name="country" class="form-control">
                  <option value="india">Indai</option>
               </select>
            </div>
            <div class="col-md-6 mt-2">
<input type="text"
           name="first_name" required
           value="{{ old('first_name') }}"
           class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
           placeholder="First Name">
            <div class="invalid-feedback">@error('first_name') {{ $message }} @else Please enter your first name.  @enderror</div>               
            
            </div>
            <div class="col-md-6 mt-2">
               <input type="text" name="last_name" required value="{{ old('last_name') }}"
           class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" placeholder="Last Name">
               <div class="invalid-feedback"> @error('last_name') {{ $message }} @else Please enter your last name.  @enderror</div>
                
            </div>
            <div class="col-md-12 mt-2">
               <textarea name="address" required cols="3" rows="4" 
           class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" placeholder="Address">{{ old('address') }}</textarea>
               <div class="invalid-feedback"> @error('address') {{ $message }} @else Please enter your address.  @enderror</div>
            </div>
            <div class="col-md-12 mt-2">
               <input type="text" class="form-control" placeholder="Apartment, suite, etc. (optional)">
            </div>
            <div class="col-md-4 mt-2">
               <input type="text" name="city" required value="{{ old('city') }}" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}"  placeholder="City">
               <div class="invalid-feedback"> @error('city') {{ $message }} @else Please enter your city name.  @enderror</div>
            </div>
            <div class="col-md-4 mt-2">
               <select name="state" required class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}">
        <option value="">Select</option>
        <option value="Andhra Pradesh" {{ old('state') == 'Andhra Pradesh' ? 'selected' : '' }}>Andhra Pradesh</option>
        <option value="Arunachal Pradesh" {{ old('state') == 'Arunachal Pradesh' ? 'selected' : '' }}>Arunachal Pradesh</option>
        <option value="Assam" {{ old('state') == 'Assam' ? 'selected' : '' }}>Assam</option>
        <option value="Bihar" {{ old('state') == 'Bihar' ? 'selected' : '' }}>Bihar</option>
        <option value="Chandigarh" {{ old('state') == 'Chandigarh' ? 'selected' : '' }}>Chandigarh</option>
        <option value="Chhattisgarh" {{ old('state') == 'Chhattisgarh' ? 'selected' : '' }}>Chhattisgarh</option>
        <option value="Dadra and Nagar Haveli" {{ old('state') == 'Dadra and Nagar Haveli' ? 'selected' : '' }}>Dadra and Nagar Haveli</option>
        <option value="Daman and Diu" {{ old('state') == 'Daman and Diu' ? 'selected' : '' }}>Daman and Diu</option>
        <option value="Delhi" {{ old('state') == 'Delhi' ? 'selected' : '' }}>Delhi</option>
        <option value="Goa" {{ old('state') == 'Goa' ? 'selected' : '' }}>Goa</option>
        <option value="Gujarat" {{ old('state') == 'Gujarat' ? 'selected' : '' }}>Gujarat</option>
        <option value="Haryana" {{ old('state') == 'Haryana' ? 'selected' : '' }}>Haryana</option>
        <option value="Himachal Pradesh" {{ old('state') == 'Himachal Pradesh' ? 'selected' : '' }}>Himachal Pradesh</option>
        <option value="Jammu and Kashmir" {{ old('state') == 'Jammu and Kashmir' ? 'selected' : '' }}>Jammu and Kashmir</option>
        <option value="Jharkhand" {{ old('state') == 'Jharkhand' ? 'selected' : '' }}>Jharkhand</option>
        <option value="Karnataka" {{ old('state') == 'Karnataka' ? 'selected' : '' }}>Karnataka</option>
        <option value="Kerala" {{ old('state') == 'Kerala' ? 'selected' : '' }}>Kerala</option>
        <option value="Ladakh" {{ old('state') == 'Ladakh' ? 'selected' : '' }}>Ladakh</option>
        <option value="Lakshadweep" {{ old('state') == 'Lakshadweep' ? 'selected' : '' }}>Lakshadweep</option>
        <option value="Madhya Pradesh" {{ old('state') == 'Madhya Pradesh' ? 'selected' : '' }}>Madhya Pradesh</option>
        <option value="Maharashtra" {{ old('state') == 'Maharashtra' ? 'selected' : '' }}>Maharashtra</option>
        <option value="Manipur" {{ old('state') == 'Manipur' ? 'selected' : '' }}>Manipur</option>
        <option value="Meghalaya" {{ old('state') == 'Meghalaya' ? 'selected' : '' }}>Meghalaya</option>
        <option value="Mizoram" {{ old('state') == 'Mizoram' ? 'selected' : '' }}>Mizoram</option>
        <option value="Nagaland" {{ old('state') == 'Nagaland' ? 'selected' : '' }}>Nagaland</option>
        <option value="Odisha" {{ old('state') == 'Odisha' ? 'selected' : '' }}>Odisha</option>
        <option value="Puducherry" {{ old('state') == 'Puducherry' ? 'selected' : '' }}>Puducherry</option>
        <option value="Punjab" {{ old('state') == 'Punjab' ? 'selected' : '' }}>Punjab</option>
        <option value="Rajasthan" {{ old('state') == 'Rajasthan' ? 'selected' : '' }}>Rajasthan</option>
        <option value="Sikkim" {{ old('state') == 'Sikkim' ? 'selected' : '' }}>Sikkim</option>
        <option value="Tamil Nadu" {{ old('state') == 'Tamil Nadu' ? 'selected' : '' }}>Tamil Nadu</option>
        <option value="Telangana" {{ old('state') == 'Telangana' ? 'selected' : '' }}>Telangana</option>
        <option value="Tripura" {{ old('state') == 'Tripura' ? 'selected' : '' }}>Tripura</option>
        <option value="Uttar Pradesh" {{ old('state') == 'Uttar Pradesh' ? 'selected' : '' }}>Uttar Pradesh</option>
        <option value="Uttarakhand" {{ old('state') == 'Uttarakhand' ? 'selected' : '' }}>Uttarakhand</option>
        <option value="West Bengal" {{ old('state') == 'West Bengal' ? 'selected' : '' }}>West Bengal</option>
    </select>
               <div class="invalid-feedback"> @error('state') {{ $message }} @else Please select a state.  @enderror</div>
            </div>
            <div class="col-md-4 mt-2">
               <input type="text" name="pincode" required value="{{ old('pincode') }}" class="form-control {{ $errors->has('pincode') ? 'is-invalid' : '' }}" placeholder="Pincode">
               <div class="invalid-feedback"> @error('pincode') {{ $message }} @else Please enter your Pincode.  @enderror</div>
            </div>
            <div class="col-md-12 mt-2">
               <input class="" type="checkbox" value="" id="flexCheckChecked">
               <label class="form-check-label" for="flexCheckChecked">
               Save this information for next time
               </label>
            </div>

             <div class="col-md-12 mt-2">
                <h5>Payment</h5>
                <p>All transactions are secure and encrypted.</p>
            </div>


<div class="col-md-12">
    <div class="row bg-light cart_border">
        <div class="col-md-12 d-flex justify-content-between cart_title"><div> Credit card </div> <img src="{{url('/img/credit-card.png')}}" alt="Cart" width="25" height="25"></div>
         <div class="col-md-12 mt-2">
               <input type="text" name="cart_number" required value="{{ old('cart_number') }}" class="form-control {{ $errors->has('cart_number') ? 'is-invalid' : '' }}" placeholder="Cart number" pattern="\d*"
       oninput="this.value = this.value.replace(/[^0-9]/g, '')" minlength="13" maxlength="19">
               <div class="invalid-feedback"> @error('cart_number') {{ $message }} @else Please enter your Cart number. @enderror</div>
            </div>

             <div class="col-md-6 mt-2">
  <input type="text" id="expDate" name="expiration_date" required value="{{ old('expiration_date') }}" class="form-control {{ $errors->has('expiration_date') ? 'is-invalid' : '' }}"  placeholder="MM / YY" maxlength="7">
               <div class="invalid-feedback"> @error('expiration_date') {{ $message }} @else  Please enter your expiration date. @enderror</div>
            </div>

             <div class="col-md-6 mt-2">
               <input type="text" name="security_code" required value="{{ old('security_code') }}" class="form-control {{ $errors->has('security_code') ? 'is-invalid' : '' }}" placeholder="Security code" pattern="\d*"
       oninput="this.value = this.value.replace(/[^0-9]/g, '')" required minlength="3" maxlength="4">
               <div class="invalid-feedback"> @error('security_code') {{ $message }} @else Please enter your Security code. @enderror</div>
            </div>

             <div class="col-md-12 mt-2 mb-2">
               <input type="text" name="name_on_cart" required value="{{ old('name_on_cart') }}" class="form-control {{ $errors->has('name_on_cart') ? 'is-invalid' : '' }}" placeholder="Name on cart">
               <div class="invalid-feedback"> @error('name_on_cart') {{ $message }} @else Please enter your Name on cart. @enderror</div>
            </div>
    </div>
</div>


             <div class="col-md-12 mt-5 mb-5">
              <button class="btn btn-success w-100" type="submit"> Pay now</button>
            </div>
         </div>
        </form>
      </div>
         <div class="col-md-6 checkout_padding_right pt-4">

<div class="product_max_height pr-3">

   @foreach($data as $val)
            <div class="d-flex justify-content-between mt-2">
               <div class="position-relative mr-4" style="width:20%;">
                  <img src="{{$val->image}}" width="100" height="100" alt="" class="shadow-sm" style="border-radius: 10px;">
                  <span class="checkout_count">{{$val->quantity}}</span>
               </div>
               <div class="mt-auto mb-auto" style="width:60%;">
                  <h6>{{$val->name}}</h5>
                  <p>{{$val->size}} / {{$val->color}}</p>
               </div>
               <h6 class="mt-auto mb-auto text-end" style="width:20%;">
               Rs. {{$val->total_amount}}</h5>
            </div>
            @endforeach

            </div>
        
         <hr class="mr-3">
         <div class="row pr-3">
            <div class="col-md-6">
               Subtotal
            </div>
            <div class="col-md-6 text-end">
               Rs. {{$total_amount}}
            </div>
            <div class="col-md-6 mt-2">
               Shipping
            </div>
            <div class="col-md-6 mt-2 text-end">
               Enter shipping address
            </div>
            <div class="col-md-6 mt-2">
               Estimated taxes
            </div>
            <div class="col-md-6 mt-2 text-end">
               Rs. 0
            </div>
            <div class="col-md-6 mt-3">
               <h5>Total</h5>
            </div>
            <div class="col-md-6 mt-3 text-end">
               <h5>Rs. {{$total_amount}}</h5>
            </div>
         </div>
      </div>
   </div>
</div>



         @endsection

    @section('script')

    <script src="{{url('/js/checkouts.js')}}"></script>

    @stop