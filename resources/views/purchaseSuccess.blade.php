@extends('master')
@section('title', 'Thank you for your Order')
@section('content')

    <div class="container">
        <p>
        	<a href="{{ url('/') }}">Home</a> / 
        	Order Confirmation
        </p>
        <h1>Order Confirmation</h1>

        Thank you for your order.<br><br>

        You can track your orders at <a href="{{ url('track-order') }}">Track your order page</a>
        <br><br>
        <a href="{{ url('shop') }}">Click here to continue shopping</a>
        <br>

    </div><!-- container -->
    <div class="spacer"></div>
@endsection                