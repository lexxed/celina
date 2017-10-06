@extends('master')
@section('title', 'Checkout - ' . config('constants.brandName') )
@section('content')

    <div class="container">
        <p>
        	<a href="{{ url('shop') }}">Home</a> / 
        	<a href="{{ url('cart') }}">Cart</a> / 
        	Customer Information
        </p>
        <h1>Customer Information</h1>

		{{-- 
        @foreach (Cart::content() as $item)
        	{{ dump($item) }}
        	<br>name: {{ $item->name }} 
        @endforeach
		--}}
        
        <div class="row">
	        <div class="col-md-6">
	       		 
			    <form method="POST" action="/checkout">
					{{ csrf_field() }} 
			        <div class="form-group @if ($errors->has('email')) has-error @endif">
			            <label class="control-label" for="inputError1">Email</label>
			            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ old('email')}}">
			            <small class="text-danger">{{ $errors->first('email') }}</small>
			        </div>
			        <div class="form-group @if ($errors->has('name')) has-error @endif">
			            <label class="control-label" for="inputError1">Name</label>
			            <input name="name" type="name" class="form-control" id="inputName" placeholder="Name" value="{{ old('name') }}">	
			            <small class="text-danger">{{ $errors->first('name') }}</small>
			        </div>
					<div class="form-group col-md-6 col-xs-6 nopadding @if ($errors->has('postalcode')) has-error @endif">
			            <label class="control-label" for="inputError1">Postal Code</label>
		            	<input name="postalcode" type="postalcode" class="form-control" id="postalcode" placeholder="Postal Code (eg. 640300)" value="{{ old('postalcode') }}">	
		            	<small class="text-danger">{{ $errors->first('postalcode') }}</small>
			        </div>	
			        <div class="form-group col-md-6 col-xs-6 nopadding-right @if ($errors->has('blk')) has-error @endif">
			            <label class="control-label" for="inputError1">Blk / Hse No</label>
		            	<input name="blk" type="blk" class="form-control" id="blk" placeholder="Blk / Hse" value="{{ old('blk') }}">	
		            	<small class="text-danger">{{ $errors->first('blk') }}</small>
			        </div>
			        <div class="form-group @if ($errors->has('street')) has-error @endif">
			            <label class="control-label" for="inputError1">Street Name</label>
		            	<input name="street" type="street" class="form-control" id="street" placeholder="Street Name" value="{{ old('street') }}">
		            	<small class="text-danger">{{ $errors->first('street') }}</small>
			        </div>	
					<div class="form-group col-md-6 col-xs-6 nopadding @if ($errors->has('unit')) has-error @endif">
			            <label class="control-label" for="inputError1">Unit Number</label>
		            	<input name="unit" type="unit" class="form-control" id="unit" placeholder="12-300" value="{{ old('unit') }}">
		            	<small class="text-danger">{{ $errors->first('unit') }}</small>
			        </div>	
			        <div class="form-group col-md-6 col-xs-6 nopadding-right @if ($errors->has('building')) has-error @endif">
			            <label class="control-label" for="inputError1">Building Name</label>
		            	<input name="building" type="building" class="form-control" id="building" placeholder="* optional" value="{{ old('building') }}">
		            	<small class="text-danger">{{ $errors->first('building') }}</small>
			        </div>		
			        <div class="form-group @if ($errors->has('mobile')) has-error @endif">
			            <label class="control-label" for="inputError1">Mobile Number</label>
		            	<input name="mobile" type="mobile" class="form-control" id="mobile" placeholder="Mobile Number ( Whatsapp only )" value="{{ old('mobile') }}">
		            	<small class="text-danger">{{ $errors->first('mobile') }}</small>
			        </div>		     	

					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif		      

			        <div class="form-group">
			        	<button type="submit" class="btn btn-success btn-lg">Continue to payment</button>
			        </div>	
			        
			    </form>
						 
			</div>	     
		</div>

    </div>
@endsection       