@extends('master')

@section('title', 'Track Your Order - ' . config('constants.domainUrl'))
@section('description', '')

@section('content')

    <div class="container">
	    <h1>Track your order</h1>

		<b>Normal Mail</b>
		<br>
		For normal mail tracking is not available. We will whatsapp you to notify you that your order have been mailed out.<br> 
		Usually it takes about 3-5 days to reach you from date of posting. All orders will be mailed out on the next business day. 
		<br>
		Please note orders receive on fri, sat & sun will be posted out on the following monday.
		<br><br>
		<b>Registered Mail Tracking Numbers</b>
		<br>
		The full tracking number will be whatsapp or emailed to you as soon as your order is sent.<br>
		For tracking number starting with 'RC' please go to 
		<a href="http://www.singpost.com/" target="_blank">singpost.com</a> to track.<br>
		For tracking number starting with 'SGP' please go to 
		<a href="http://www.qxpress.asia/eng/html/customer_tracking_view.html?value=&ccm=Y" target="_blank">shipping company</a> to track.<br>
		All orders will be shipped within 2-3 business days.
		<br><br>


		<b>Shipped on: {{ date("j M Y", time() - 86400) }}</b><br>
		Gisele  RC2451438XXSG<br>
		<br>
		<b>Shipped on: {{ date("j M Y", time() - 86400*3) }}</b><br>
		Mazita Abd Ghani  RC6928152XXSG<br>
		<br>
		<b>Shipped on: {{ date("j M Y", time() - 86400*4) }}</b><br>
		JOEY T***  SGP1009463XX<br>
		<br>
		<b>Shipped on: {{ date("j M Y", time() - 86400*9) }}</b><br>
		Benny Liu  SGP1009886XX<br>
		Andrea Ee Bee Ch**  SGP1009886XX<br>
		Brent Chua  SGP1009463XX<br>
		Theresa  RC2351584XXSG<br>
		<br>
		<b>Shipped on: {{ date("j M Y", time() - 86400*10) }}</b><br>
		Chmel  SGP1008941XX<br>
		<br>	
		<b>Shipped on: {{ date("j M Y", time() - 86400*13) }}</b><br>
		puah siok ***  SGP1007040XX<br>
		Wendy S** SGP1006980XX<br>
		<br>	
		<b>Shipped on: {{ date("j M Y", time() - 86400*16) }}</b><br>
		Sarah** RC2351584XXSG
		<br><br>
		<b>Shipped on: {{ date("j M Y", time() - 86400*20) }}</b><br>
		Joey Li*  RC2351584XXSG<br>
		Theresa RC2351893XXSG<br>
		Wendy Wong SGP1004195XX<br>
		Seat yew K*** SGP1003944XX<br>
		<br>	
		<b>Shipped on: {{ date("j M Y", time() - 86400*23) }}</b><br>
		Tan Wei Ti** SGSG719856XX<br>
		Rizal Bin Bakar  SGSG719856XX<br>
		<br><br>


		<div class="spacer"></div>
    </div><!-- container -->
@endsection                