<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">  

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Store CSRF token for AJAX calls -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    <!-- Favicon and Apple Icons -->
    <link rel="shortcut icon" href="{{ asset('img/favicoccn.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicon-16x16.png') }}" sizes="16x16" />


</head>
<body>
@include('partials.analytics')

    <header>
        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ url('/') }}">
                <p style="color:#F778A1;">
                {{ config('constants.brandName') }}
                </p>
              </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                {{--
                <li class="{{ set_active('shop') }}"><a href="{{ url('/shop') }}">Products</a></li>
                --}}

                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/shop') }}">All Products</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/eye-masks') }}">Eye Masks</a></li>
                        <li><a href="{{ url('/face-masks') }}">Face Masks</a></li>
                        <li><a href="{{ url('/lip-masks') }}">Lip Masks</a></li>
                        <li><a href="{{ url('/chest-masks') }}">Chest Masks</a></li>
                        <li><a href="{{ url('/neck-masks') }}">Neck Masks</a></li>
                        <li><a href="{{ url('/cleanser') }}">Cleansers</a></li>
                        <li><a href="{{ url('/diet') }}">Slimming & Diet</a></li>
                    </ul>
                </li>   
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                <li><a href="{{ url('/track-order') }}">Track Your Order</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                {{--
                <li class="{{ set_active('wishlist') }}">
                    <a href="{{ url('/wishlist') }}">Wishlist ({{ Cart::instance('wishlist')->count(false) }})</a>
                </li>
                --}}
                <li class="{{ set_active('cart') }}">
                    <a href="{{ url('/cart') }}">Cart ({{ Cart::instance('default')->count(false) }})</a>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>

    </header>

    @yield('content')

    <footer>
      <div class="container">
        <p class="text-muted">© Copyright 2017, <a href="{{ url('/') }}">{{ config('constants.footercopyright') }}</a></p>
        <p class="text-muted">VBOX 886580 Singapore 919191</p>
      </div>
    </footer>

<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

@yield('extra-js')

</body>
</html>
