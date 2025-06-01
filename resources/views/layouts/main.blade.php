<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ url('/logo.png') }}" type="image/png" />


   
 @include('includes.style')
    @yield('style')
</head>

<body style="height: 100%" class="bg-light">


    <!-- Navbar -->
     @include('includes.header')

      <!-- Navbar -->

  {{-- content --}}


    <div class="container-fluid ">

         @yield('content')


    </div>




</body>
   @include('includes.script')
    @yield('script')



</html>