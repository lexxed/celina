@extends('master')

@section('title', 'Discover The Best In Beauty at Wholesale Prices | '. config('constants.brandName') .'&#174;')

@section('description', 'Shop With Ease & Comfort. Fast & Flexible Delivery. Selection of masks, beauty & slimming products at wholesale prices.')




       
@section('content')

<?php //app('Gloudemans\Notify\Notifications\Notification')->render(); 
/*
    <a href="{{ url('/shop') }}">
        <img src="{{ asset('img/gloss.jpg') }}" alt="{{ config('constants.brandName') }} banner" class="img-thumbnail img-thumbnail-noborder">
    </a>
*/
?>

    <div class="jumbotron jumbotron-billboard">
      <div class="img"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p style="color:#F778A1;font-size: 230%;text-shadow: 1px 1px #0C090A;">
                    <b>Discover the best in beauty..</b>
                    </p>                    
                </div>
            </div>
        </div>
    </div>

    <div class="container">  

        <img src="https://res.cloudinary.com/dncotieoi/image/upload/v1509688369/header04_tlmblq.jpg" alt="product" class="img-responsive">
        <br>

        <div class="row">
            
            <div class="col-md-3 col-sm-3">
                <div class="card h-100 thumbnail2">
                    <div class="card-header"><b>Face Masks</b></div>
                    <div class="caption text-center">
                        <a href="{{ url('face-masks') }}"><img src="{{ asset('img/face-mask-main01.jpg') }}" alt="product" class="img-responsive"></a>
                    </div> <!-- end caption -->
                </div> <!-- end thumbnail -->
            </div> <!-- end col-md-3 -->

            <div class="col-md-3 col-sm-3">
                <div class="card h-100 thumbnail2">
                    <div class="card-header"><b>Eye Masks</b></div>
                    <div class="caption text-center">
                        <a href="{{ url('eye-masks') }}"><img src="{{ asset('img/eye-mask-main01.jpg') }}" alt="product" class="img-responsive"></a>
                    </div> <!-- end caption -->
                </div> <!-- end thumbnail -->
            </div> <!-- end col-md-3 -->

            <div class="col-md-3 col-sm-3">
                <div class="card h-100 thumbnail2">
                    <div class="card-header"><b>Cleansers</b></div>
                    <div class="caption text-center">
                        <a href="{{ url('cleanser') }}"><img src="{{ asset('img/main/royal-jelly.jpg') }}" alt="product" class="img-responsive"></a>
                    </div> <!-- end caption -->
                </div> <!-- end thumbnail -->
            </div> <!-- end col-md-3 -->            

            <div class="col-md-3 col-sm-3">
                <div class="card h-100 thumbnail2">
                    <div class="card-header"><b>Slimming</b></div>
                    <div class="caption text-center">
                        <a href="{{ url('diet') }}"><img src="https://res.cloudinary.com/dncotieoi/image/upload/v1509688596/share-plum_j4pnq7.png" alt="product" class="img-responsive"></a>
                    </div> <!-- end caption -->
                </div> <!-- end thumbnail -->
            </div> <!-- end col-md-3 -->            

        </div> <!-- end row -->    

        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="card h-100 thumbnail2">
                    <div class="card-header"><b>Lip Masks</b></div>
                    <div class="caption text-center">
                        <a href="{{ url('lip-masks') }}"><img src="{{ asset('img/lip-mask-main01.jpg') }}" alt="product" class="img-responsive"></a>
                    </div> <!-- end caption -->
                </div> <!-- end thumbnail -->
            </div> <!-- end col-md-3 -->                        

            <div class="col-md-3 col-sm-3">
                <div class="card h-100 thumbnail2">
                    <div class="card-header"><b>Chest Masks</b></div>
                    <div class="caption text-center">
                        <a href="{{ url('chest-masks') }}"><img src="{{ asset('img/chest-mask-main01.jpg') }}" alt="product" class="img-responsive"></a>
                    </div> <!-- end caption -->
                </div> <!-- end thumbnail -->
            </div> <!-- end col-md-3 -->                        

            <div class="col-md-3 col-sm-3">
                <div class="card h-100 thumbnail2">
                    <div class="card-header"><b>Neck Masks</b></div>
                    <div class="caption text-center">
                        <a href="{{ url('neck-masks') }}"><img src="{{ asset('img/neck-mask-main01.jpg') }}" alt="product" class="img-responsive"></a>
                    </div> <!-- end caption -->
                </div> <!-- end thumbnail -->
            </div> <!-- end col-md-3 -->                   
        </div>

        <div class="row">
        	<div class="col-md-12">
	            <p>
                    <h1>
                        Over <a href="http://www.qoo10.sg/gmkt.inc/Mobile/My/Reviews.aspx?goodscode=401369786" target="_blank"><u>33130</u></a> Customers Reviews on Qoo10
                    </h1>
                </p>

	            <div class="row">
	                <div class="col-md-2 col-sm-3">
	                    <img src="{{ asset('img/review01.jpg') }}" alt="users review photos" class="img-thumbnail"><br><br>
	                </div>
	                <div class="col-md-10 col-sm-9">
	                    <img src="{{ asset('img/stars.png') }}" alt="4 stars" class=" img-thumbnail-noborder">
	                    <b>Satisfied with collagen eye masks</b><br>
	                    Written by Jennif*** on 8 March 2017<br><br>
	                    Quality is good and the mask gives a cooling and soothing feeling. It doesn't slide down easily like other eye masks.
	                </div>
	            </div>          
	            <div class="row">
	                <div class="col-md-2 col-sm-3">
	                    <img src="{{ asset('img/review02.jpg') }}" alt="users review photos" class="img-thumbnail"><br><br>
	                </div>
	                <div class="col-md-10 col-sm-9">
	                    <img src="{{ asset('img/stars.png') }}" alt="4 stars" class="img-thumbnail-noborder">
	                    <b>Very happy with the eye masks</b><br>
	                    Written by Wendy W*** on 23 Feb 2017<br><br>
	                    Have bought before and was very nice to use. Put in fridge for extra relaxation.
	                </div>
	            </div>   

                <div class="row">
                    <div class="col-md-2 col-sm-3">
                        <img src="{{ asset('img/review03.jpg') }}" alt="users review photos" class="img-thumbnail"><br><br>
                    </div>
                    <div class="col-md-10 col-sm-9">
                        <img src="{{ asset('img/stars.png') }}" alt="4 stars" class="img-thumbnail-noborder">
                        <b>Great Buy</b><br>
                        Written by Ice*** on 21 Feb 2017<br><br>
                        Have bought before and was very nice to use. Put in fridge for extra relaxation. Very good for wrinkles.
                    </div>
                </div>                
 
                <p>
                <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg">Shop now</a> 
                <!--
                <span style="color:#F778A1;font-size: 130%;text-shadow: 1px 1px #0C090A;">$1 Shipping in SG</span>
                -->
                </p>
                <img src="https://res.cloudinary.com/dncotieoi/image/upload/v1509688468/OneDollarShipping_o1rwo8.jpg" alt="product" class="img-responsive">
                <br>                 

            </div><!-- end col-md-12 -->
            
        </div> <!-- end row -->   


    </div> <!-- end container -->

@endsection
