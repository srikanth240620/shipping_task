 <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('/logo.png')}}" width="30" alt=""></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active active_under_line"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="#">Catalog</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li> --}}
            </ul>

         

<div class="dropdown">
  <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-user mr-4" style="cursor: pointer; font-size: 20px; color: black;"></i>
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
    <a class="dropdown-item" href="{{url('/orders')}}">Order View</a>
    <div class="dropdown-divider"></div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="dropdown-item">Logout</button>
    </form>
  </div>
</div>


            <i class="fas fa-search fa-lg mr-4" id="openSearch" style="cursor: pointer;"></i>


            
            <!-- Search Icon -->

@php
$cart_count=DB::table('cart')->where('user_id',auth()->user()->id)->where('status',1)->sum('quantity');
@endphp

            <a href="{{url('/cart')}}">
                <div class="position-relative mr-3">
                    <span class="cart_nav cart_count">{{$cart_count}}</span>
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </div>
            </a>


        </div>
    </nav>

      <!-- Search Overlay -->
    <div class="search-overlay searchOverlay">
        <form action="/" method="get">
        <input type="text" class="form-control" name="search" placeholder="Search here..." id="searchInput" style="width:400px;">
        <i class="fa fa-times close-btn" aria-hidden="true" id="closeSearch"></i>
        </form>

    </div>