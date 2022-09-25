@extends('layouts.main')
@section('title')
    Your Cart
@endsection
@section('main')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i> </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                @foreach ($carts as $cart)
                    <!-- product -->
                    <div class="col-md-3 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img height="200px" src="{{ asset($cart->Product->Images->first()->image_name) }}">
                                <div class="product-label">
                                    <span class="sale">New</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <h3 class="product-name"><a
                                        href="{{ url('/product', [$cart->Product->product_id]) }}">{{ $cart->Product->name }}</a>
                                </h3>
                                <h4 class="product-price">${{ $cart->Product->price_after_sale }} <del
                                        class="product-old-price">${{ $cart->Product->price }}</del></h4>
                                <div class="product-rating">
                                </div>
                                <div class="product-btns">

                                    <button class="quick-view">
                                        <a href="{{ url('/product', [$cart->Product->product_id]) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <span class="tooltipp">quick view</span>
                                    </button>

                                    <button class="quick-view">
                                        <a href="{{ url('/remove-from-cart', [$cart->Product->product_id]) }}">
                                            <i class="fa fa-cart-arrow-down"></i>
                                        </a>
                                        <span class="tooltipp">remove from cart</span>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->
                @endforeach

                @if (auth()->user()->Carts->count() !== 0)
                    <div class="container" style="position: relative;margin-bottom: 30px">
                        <a class="primary-btn cta-btn" style="position: absolute;right:0"
                            href="{{ url('/checkout', []) }}">Checkout
                            {{ auth()->user()->Carts->where('cart_status', '=', 'pending')->count() }} In Cart</a>
                    </div>
                @endif
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
