@extends('layouts.main')
@section('title')
    Category {{ $category->category_name }}
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
                        <li><a href="{{ url('/', []) }}">Home</a></li>
                        <li class="active">{{ $category->category_name }}</li>
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
                @foreach ($category->Products->where('qty', '>', 0) as $product)
                    <!-- product -->
                    <div class="col-md-3 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{ asset($product->Images->first()->image_name) }}" alt="">
                                <div class="product-label">
                                    <span class="new">New</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $category->category_name }}</p>
                                <h3 class="product-name"><a
                                        href="{{ url('/product', [$product->product_id]) }}">{{ $product->name }}</a></h3>
                                <h4 class="product-price">${{ $product->price_after_sale }} <del
                                        class="product-old-price">${{ $product->price }}</del></h4>
                                <div class="product-rating">
                                </div>
                                <div class="product-btns">

                                    <button class="quick-view"><a href="{{ url('/product', [$product->product_id]) }}"><i
                                                class="fa fa-eye"></i></a><span class="tooltipp">quick
                                            view</span></button>
                                    @if (DB::table('wishes')->where('user_id', '=', auth()->user()->id)->where('product_id', '=', $product->id)->first() !== null)
                                        <button class="add-to-wishlist"><a
                                                href="{{ url('/remove-from-wishlist', [$product->product_id]) }}"><i
                                                    class="fa fa-heart"></i></a><span class="tooltipp">remove from
                                                wishlist</span></button>
                                    @else
                                        <button class="add-to-wishlist"><a
                                                href="{{ url('/add-to-wishlist', [$product->product_id]) }}"><i
                                                    class="fa fa-heart-o"></i></a><span class="tooltipp">add
                                                to wishlist</span></button>
                                    @endif

                                    @if (DB::table('carts')->where('user_id', '=', auth()->user()->id)->where('cart_status', '=', 'pending')->where('product_id', '=', $product->id)->first() !== null)
                                        <button class="add-to-compare">
                                            <a href="{{ url('/remove-from-cart', [$product->product_id]) }}">
                                                <i class="fa fa-cart-arrow-down"></i>
                                            </a>
                                            <span class="tooltipp">remove from cart</span></button>
                                    @else
                                        <button class="add-to-wishlist"><a
                                                href="{{ url('/add-to-cart', [$product->product_id]) }}"><i
                                                    class="fa fa-shopping-cart"></i></a><span class="tooltipp">add
                                                to cart</span></button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
