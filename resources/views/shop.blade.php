@extends('master')

@section('title', $category->subcattitle)
@section('description', $category->subcatdesc)

@section('content')

    <div class="container">
        <br>  
        <p>
        @if(!empty($category->subcat))
          <a href="{{ url('/shop') }}">Shop</a> > 
          {{ $category->subcat }}
        @endif     
        </p>

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif
        @foreach ($products->chunk(4) as $items)
            <div class="row">
                @foreach ($items as $product)

                      @php
                          $category = App\Category::where('id', $product->cat_id)
                                            ->first();
                      @endphp 

                    <div class="col-md-3 col-sm-3">
                        <div class="thumbnail">
                            <div class="caption text-center">
                                <a href="{{ url($category->subcatslug, [$product->slug]) }}"><img src="{{ asset('img/main/' . $product->image) }}" alt="product" class="img-responsive"></a>
                                <a href="{{ url($category->subcatslug, [$product->slug]) }}">
                                    <b>{{ $product->name }}</b>
                                    <p>${{ $product->price }}</p>
                                </a>
                            </div> <!-- end caption -->
                        </div> <!-- end thumbnail -->
                    </div> <!-- end col-md-3 -->
                @endforeach
            </div> <!-- end row -->
        @endforeach

    </div> <!-- end container -->

@endsection