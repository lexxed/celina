@extends('master')
@section('title', 'Shipping & Payment - ' . config('constants.brandName') )
@section('content')

    <div class="container">
        <p>
        	<a href="{{ url('shop') }}">Home</a> / 
        	<a href="{{ url('cart') }}">Cart</a> / 
            <a href="{{ url('checkout') }}">Customer Information</a> / 
        	Shipping & Payment
        </p>
        <h1>Shipping & Payment</h1>

        <b>Shipping Address</b><br>
        {{ Session::get('customerinformation')->blk }} {{ Session::get('customerinformation')->street }}<br>
        {{ Session::get('customerinformation')->building }}<br>
        #{{ Session::get('customerinformation')->unit }}<br>
        Postal Code {{ Session::get('customerinformation')->postalcode }}
        <br><br>

        {{--
        @foreach (Cart::content() as $item)
            {{ dump($item) }}
            <br>name: {{ $item->name }} 
        @endforeach

        cart total: 
        ${{ Cart::total()*100 }}
        --}}
        <b>Payment Method</b><br>
       
            <label style="font: 15px arial;"><input type="radio" onclick="javascript:yesnoCheck();" name="paymentmethod" id="creditcard" value="creditcard"/> Credit Card</label>
            <br>
            <label style="font: 15px arial;"><input type="radio" onclick="javascript:yesnoCheck();" name="paymentmethod" id="fundtransfer" value="fundtransfer"/> Fund Transfer</label><br>
            <label style="font: 15px arial;"><input type="radio" onclick="javascript:yesnoCheck();" name="paymentmethod" id="paynow" value="paynow"/> PayNow</label><br>

        <br>

        <div class="row">
	       <div class="col-md-6">

                <div id="creditcardshow" style="display:none;">
                    <b>Credit Card Payment</b><img src="{{ asset('img/lock.png') }}" alt="lock" class="img-thumbnail img-thumbnail-noborder">
                    <br><br>

                    <form action="/purchase" method="POST">
                    {{ csrf_field() }}                    
                      <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{ config('services.stripe.key') }}"
                        data-amount="{{ Cart::total()*100 }}"
                        data-name="Celina Babe Pte Ltd"
                        data-description="SGD{{ Cart::total() }}"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto"
                        data-currency="sgd">
                      </script>
                    </form>  
                    
                    <br>
                    <img src="{{ asset('img/icon-amex.png') }}" alt="lock" class="img-thumbnail img-thumbnail-noborder">
                    <img src="{{ asset('img/icon-mastercard.png') }}" alt="lock" class="img-thumbnail img-thumbnail-noborder">
                    <img src="{{ asset('img/icon-visa.png') }}" alt="lock" class="img-thumbnail img-thumbnail-noborder">
                </div>    

                <div id="fundtransfershow" style="display:none;">

                    <b>Internet Banking/ATM Bank Transfer (Local only)</b>
                    <br>
                    Singapore Customers can make payment via Internet Funds transfer or ATM transfer to:
                    <br><br>
                    <b>Transfer Amount: SGD{{ Cart::total() }}</b><br>
                    <b>OCBC CURRENT: 527-794481-001</b>
                    <br>
                    <b>POSB SAVINGS: 039-77164-0</b>
                    <br><br>
                    Once payment is completed, please send us the Transaction Date, Transaction Number and your Name.
                    You can notify through email: {{ config('constants.supportEmail') }} or Whatsapp us at {{ config('constants.mobileNumber') }}
                    <br><br>
                    Once payment is confirmed, you will receive an email stating that your order is "Awaiting Fulfilment" and will be shipped within 1-2 business days.
                    <br><br>
                </div>          


                <div id="paynowshow" style="display:none;">
                    <img src="{{ asset('img/paynow.png') }}" alt="lock" class="img-thumbnail img-thumbnail-noborder">
                    <br><br>                    
                    Please send payment via Mobile number to: <br>
                    <b>{{ config('constants.mobileNumber') }}</b>
                    <br>
                    Confirm Payee's Nickname is:<br>
                    <b>Lexx Celina520</b><br>
                    Transfer Amount:<br>
                    <b>SGD{{ Cart::total() }}</b><br>                    
                    <br>
                    Once payment is completed please send us a Whatsapp message with your name.<br>
                    Once payment is confirmed, you will receive an email stating that your order is "Awaiting Fulfilment" and will be shipped within 1-2 business days.                    


                </div>                       



            </div><!-- col-md-6 -->
        </div><!-- row -->

        <br>
        Having problems with payment ? <br>
        Please Whatsapp us at {{ config('constants.mobileNumber') }}
        <div class="spacer"></div>

    </div><!-- container -->
@endsection      

@section('extra-js')
    
<script type="text/javascript">
    window.onload = function() {
        document.getElementById('creditcardshow').style.display = 'none';
        document.getElementById('fundtransfershow').style.display = 'none';
        document.getElementById('paynowshow').style.display = 'none';
    }

    function yesnoCheck() {
        if (document.getElementById('creditcard').checked) {
            document.getElementById('paynowshow').style.display = 'none';
            document.getElementById('fundtransfershow').style.display = 'none';
            document.getElementById('creditcardshow').style.display = 'block';
        } 
        else if (document.getElementById('fundtransfer').checked) {
            document.getElementById('paynowshow').style.display = 'none';
            document.getElementById('creditcardshow').style.display = 'none';
            document.getElementById('fundtransfershow').style.display = 'block';
        }         
        else if (document.getElementById('paynow').checked) {
            document.getElementById('creditcardshow').style.display = 'none';
            document.getElementById('fundtransfershow').style.display = 'none';
            document.getElementById('paynowshow').style.display = 'block';
        }         

    }

</script>



