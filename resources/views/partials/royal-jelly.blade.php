                <b>Easy-to-carry:</b><br>
                The HHA Facial Paper can be easily carried in bags to cleanse and refresh your skin anytime anywhere, at the office or on a trip.
                <br><br>
                <b>Deep-cleaning:</b><br>
                The Hamamelis Virginiana extract produces rich and delicate foam, thoroughly removing oil,dirt, dead skin and cosmetic residues from not only the outermost, but also the innermost part of skin, and making your skin fresh and clean.
                <br><br>
                <b>Mild caring:</b><br>
                Natural bee propolis, royal jelly and plant extracts are integrated into a mind and non-irritating product even suitable for babies; naturally refreshing and confirming, it can be used for tender parts like lips and eyes and is undoubtedly a must-have for sensitive skins.
                <br><br>
                <b>Thorough Moisturizing:</b><br>
                With the magic of Aloe Barbadensis, the water molecules are sent to reach every cell deep in the skin, replenishing you skin like a clean stream; even the driest skin can be nourished and moisturized for 24 hours, which completely renews and revitalizes your skin.
                <br><br>
                <b>Specifications</b><br>
                76mm x 76mm x 42mm<br>
                50 pieces / box
                <br><br>
                <b>Ingredients</b><br>
                Hamamelis Virginiana extract, Natural bee propolis,  Aloe Barbadensis

            
                <p><h1>Photos of Usage</h1></p>
                <h4>My hand is applied with various makeups.</h4>
                <img src="{{ asset('img/hha/t001.png') }}" alt="hha cleanser" class="img-thumbnail"><br><br>
                <h4>After using just 1 sheet of {{ config('constants.brandName') }}.</h4>
                <img src="{{ asset('img/hha/t002.png') }}" alt="hha cleanser" class="img-thumbnail"><br><br>
                <h4>Take 1 sheet of {{ config('constants.brandName') }} and rinse with water</h4>
                <img src="{{ asset('img/hha/t003.png') }}" alt="hha cleanser" class="img-thumbnail"><br><br>
                <h4>Many bubbles are formed.</h4>
                <img src="{{ asset('img/hha/t004.png') }}" alt="hha cleanser" class="img-thumbnail"><br><br>
                <h4>As an acid-balanced cleanser it can will enable deep and soft cleansing of your skin.</h4>
                <img src="{{ asset('img/hha/t005.png') }}" alt="hha cleanser" class="img-thumbnail"><br><br>
                <h4>After wash the skin will feel moist and hydrated. It is good for sensitive skin and it has the antibacterial properties of Royal Jelly.</h4>
                <img src="{{ asset('img/hha/t006.png') }}" alt="hha cleanser" class="img-thumbnail"><br><br>


        <div class="row">
                <div class="col-md-12">
                    <p><h1>Customer's Reviews of {{ config('constants.brandName') }}</h1></p>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset('img/hha/sample001.png') }}" alt="users review photos" class="img-thumbnail"><br><br>
                        </div>
                        <div class="col-md-10">
                            <img src="{{ asset('img/stars.png') }}" alt="4 stars" class="img-thumbnail img-thumbnail-noborder">
                            <b>Satisfied with the Royal Jelly Paper</b><br>
                            Written by Jennif*** on 8 March 2017<br><br>
                            Useful in removing my make up. I keep it with me all the time.
                        </div>
                    </div>          
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset('img/hha/sample002.png') }}" alt="users review photos" class="img-thumbnail"><br><br>
                        </div>
                        <div class="col-md-10">
                            <img src="{{ asset('img/stars.png') }}" alt="4 stars" class="img-thumbnail img-thumbnail-noborder">
                            <b>Very happy with the cleanser</b><br>
                            Written by Wendy W*** on 23 Feb 2017<br><br>
                            Love this stuff! Removes everything and doesn't irritate my oily skin.
                            This will get eye make up and everything off your skin.
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset('img/hha/sample003.png') }}" alt="users review photos" class="img-thumbnail"><br><br>
                        </div>
                        <div class="col-md-10">
                            <img src="{{ asset('img/stars.png') }}" alt="4 stars" class="img-thumbnail img-thumbnail-noborder">
                            <b>it's very easy to use</b><br>
                            Written by Joey Li**  on 11 Feb 2017<br><br>
                            I don't use other cleanser after using hha jelly paper. My skin looks so much better for cutting out normal foaming cleansers. It's softer and healthier looking. After cleansing my skin would often feel tight or just look irritated. I also never realised how bad my usual cleansers were at removing makeup until I tried this royal jelly paper. 
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset('img/hha/sample004.png') }}" alt="users review photos" class="img-thumbnail"><br><br>
                        </div>
                        <div class="col-md-10">
                            <img src="{{ asset('img/stars.png') }}" alt="4 stars" class="img-thumbnail img-thumbnail-noborder">
                            <b>Bought as gift for my friend</b><br>
                            Written by Tan Wei Ti** on 5 Jan 2017<br><br>
                            Delivery was fast. will buy again.
                        </div>
                    </div>   
                </div><!-- end col-md-12 -->        

                <div class="col-md-12" style="font-size:25px;">
                        <form action="{{ url('/cart') }}" method="POST" class="side-by-side">
                             {!! csrf_field() !!}
                             <input type="hidden" name="id" value="9">
                             <input type="submit" class="btn btn-success btn-lg" value="Buy Now">
                        </form>  
                        SGD {{ $product->price }}
                        <br><br>
                        <img src="{{ asset('img/wepayshippingsmall.png') }}" alt="we pay shipping" class="img-thumbnail img-thumbnail-noborder">
                        <br><br>                    
                </div><!-- end col-md-12 -->

        </div> <!-- end row -->   
