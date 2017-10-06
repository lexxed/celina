@extends('master')

@section('title', $product->pagetitle)
@section('description', $product->pagedescription)

@section('content')


    <div class="container">

        <br>
        <a href="{{ url('/shop') }}">Shop</a> > 
        <a href="{{ url($category->subcatslug) }}">{{ $category->subcat }}</a> 

        <h1>{{ $product->name }}</h1>

        <hr>

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <img src="{{ asset('img/main/' . $product->image) }}" alt="product" class="img-responsive">
            </div>

            <div class="col-md-8 col-sm-8">
                <h3>SGD {{ $product->price }}</h3>
                <form action="{{ url('/cart') }}" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <p>
                    Quantity <input type="qty" name="qty" size="2" class="form-control" id="qty" placeholder="1" value="1">
                    </p>
                    <input type="submit" class="btn btn-success btn-lg" value="Add to Cart">
                </form>
                {{--
                <form action="{{ url('/wishlist') }}" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="submit" class="btn btn-primary btn-lg" value="Add to Wishlist">
                </form>
                --}}
            </div> <!-- end col-md-8 -->
        </div> <!-- end row -->
        
        <div class="row">
            <div class="col-md-8">
            <br>
            {{ $product->description }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8">

                @foreach ($product_images_array as $image)
                        <img src="{{ asset($image) }}" alt="product images" class="img-thumbnail"><br><br>
                @endforeach

            </div>    
        </div>
        <div class="row">
            <div class="col-md-8">       

                @include('partials.' . $product->slug)

            </div> <!-- end col-md-8 -->
        </div>                      
       <br>
        <div class="row">
            <div class="col-md-12">       
                <h4><b>You may also like..</b></h4>
            </div>
            @foreach ($interested as $product)

                  @php
                      $category = App\Category::where('id', $product->cat_id)->first();
                  @endphp 

                <div class="col-md-4 col-sm-4">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <a href="{{ url($category->subcatslug, [$product->slug]) }}"><img src="{{ asset('img/main/' . $product->image) }}" alt="product" class="img-responsive"></a>
                            <a href="{{ url($category->subcatslug, [$product->slug]) }}">
                                <b>{{ $product->name }}</b>
                                <p>Sgd {{ $product->price }}</p>
                            </a>                            
                        </div> <!-- end caption -->

                    </div> <!-- end thumbnail -->
                </div> <!-- end col-md-3 -->
            @endforeach

        </div> <!-- end row -->        

        <div class="spacer"></div>


    </div> <!-- end container -->

@endsection
