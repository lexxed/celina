@extends('master')

@section('content')

    <div class="container">
        <br>
        <p><a href="{{ url('shop') }}">Home</a> / Cart</p>
        <h1>Your Cart</h1> 

        <hr>

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

        @if (sizeof(Cart::content()) > 0)
            
            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image"></th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th class="column-spacer"></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Cart::content() as $item)
                    
                    <tr>
                        <td class="table-image">
                            <a href="{{ url('shop', [$item->model->slug]) }}">
                                <img src="{{ asset('img/main/' . $item->model->image) }}" alt="product" class="img-responsive cart-image">
                            </a>
                        </td>
                        <td>
                            @if(strpos($item->name, 'Singpost') !== false)
                                {{ $item->name }}
                            @else
                                <a href="{{ url('shop', [$item->model->slug]) }}">{{ $item->name }}</a>
                            @endif    
                        </td>
                        <td>
                            @if(strpos($item->name, 'Singpost') === false)
                                <select class="quantity" data-id="{{ $item->rowId }}">
                                    @for ($i = 1; $i < 51; $i++)
                                        <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor                                
                                </select>
                            @else
                                <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger btn-sm" value="X">
                                </form>                            
                            @endif
                        </td>
                        <td>${{ number_format($item->subtotal, 2, '.', ',') }}</td>
                        <td class=""></td>
                        <td>
                            @if(strpos($item->name, 'Singpost') === false)
                                <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger btn-sm" value="X">
                                </form>
                            @endif
                            {{--
                            <form action="{{ url('switchToWishlist', [$item->rowId]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="submit" class="btn btn-success btn-sm" value="To Wishlist">
                            </form>
                            --}}
                        </td>
                    </tr>


                    @endforeach
                    <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
                        <td>${{ Cart::instance('default')->subtotal() }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                  <tr>
                        <td class="table-image"></td>
                        <td>
                            <form method="POST" action="/cart/shipping">
                            {!! csrf_field() !!}
                            <select name="shipping" class="shipping" data-id="shipping" id="shipping">
                                <option {{ $item->name  == 'none' ? 'selected' : '' }} value="">Select Shipping</option>
                                <option {{ $item->name  == 'Singpost Normal Mail' ? 'selected' : '' }} value="8">Singpost Normal Mail</option>
                                <option {{ $item->name  == 'Singpost Registered Mail' ? 'selected' : '' }} value="7">Singpost Registered Mail</option>
                            </select> 
                        
                        </td>
                        <?php
                        /* $<span id="shiprate"></span> */
                        ?>
                        <td class="small-caps table-bg" style="text-align: right">Total SGD</td>                            
                        <td class="table-bg">${{ Cart::total() }}</td>
                        <td></td>
                        <td></td>
                    </tr>      



                </tbody>
            </table>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif              
            
            <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg">Shop</a> &nbsp;
            <button type="submit" class="btn btn-success btn-lg">Checkout</button>
            </form>

            <div style="float:right">
                <form action="{{ url('/emptyCart') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-lg" value="Empty Cart">
                </form>
            </div>            
        
        @else

            <h3>You have no items in your shopping cart</h3>
            <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg">Continue Shopping</a>

        @endif

        <div class="spacer"></div>

    </div> <!-- end container -->

@endsection

@section('extra-js')

    @if (sizeof(Cart::content()) > 0)
    <script>
        $(function() {
            $('.shipping').change(function() {

                var rowId = '000';

                @if ($item->id == 7 || $item->id == 8)
                    rowId = '{{ $item->rowId }}';
                @endif                
                
                $.get('{{ url("/shipping") }}' + '/' + $( this ).val() + '/' + rowId , function(data) {
                    window.location.href = '{{ url('/cart') }}';
                });
                return false;
            });
        });
    </script>

    <script>
        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function() {
                var id = $(this).attr('data-id')
                $.ajax({
                  type: "PATCH",
                  url: '{{ url("/cart") }}' + '/' + id,
                  data: {
                    'quantity': this.value,
                  },
                  success: function(data) {
                    window.location.href = '{{ url('/cart') }}';
                  }
                });

            });
         

        })();

    </script>
    @endif

@endsection
