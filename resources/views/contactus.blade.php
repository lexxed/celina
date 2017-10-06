@extends('master')

@section('title', 'Contact Us - ' . config('constants.domainUrl'))
@section('description', '')

@section('content')

    <div class="container">
	    <h1>Contact Us</h1>
		 <br>
		 To contact us please email to 
		 <br><br>
		 <b>{{ config('constants.supportEmail') }}</b><br>
		 <br>
		 * All emails will be replied within <b>24 hours</b> during business days.
		 <br><br>
		 <b>Mailing Address:</b><br>
		 {{ config('constants.brandName') }}<br>
		 VBOX 886580<br>
		 Singapore 919191
		</p>
    </div><!-- container -->
    <div class="spacer"></div>
@endsection                