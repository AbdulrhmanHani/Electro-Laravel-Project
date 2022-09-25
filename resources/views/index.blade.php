@extends('layouts.main')
@section('title')
    Online Shop
@endsection
@section('home-active')
    active
@endsection
@section('main')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                @foreach (DB::table('categories')->get() as $category)
                    <!-- shop -->
                    <div class="col-md-4 col-xs-6 col-lg-3">
                        <div class="shop">
                            <div class="shop-img">
                                <img width="200px" height="350px" src="{{ asset($category->image) }}" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>{{ $category->category_name }}<br>Collection</h3>
                                <a href="{{ url('/category', [$category->category_id]) }}" class="cta-btn">Shop now <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /shop -->
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>

                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    @foreach ($products->where('qty', '>', 0) as $product)
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img height="200px"
                                                    src="{{ asset($product->Images->first()->image_name ?? 'images/categories/default.png') }}"
                                                    alt="">
                                                <div class="product-label">
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $product->Category->category_name }}</p>
                                                <h3 class="product-name"><a
                                                        href="{{ url('/product', [$product->product_id]) }}">{{ $product->name }}</a>
                                                </h3>
                                                <h4 class="product-price">${{ $product->price_after_sale }} <del
                                                        class="product-old-price">${{ $product->price }}</del>
                                                </h4>
                                                <div class="product-btns">
                                                    <button class="quick-view"><a
                                                            href="{{ url('/product', [$product->product_id]) }}"><i
                                                                class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                            view</span></button>
                                                    @if (DB::table('wishes')->where('user_id', '=', auth()->user()->id)->where('product_id', '=', $product->id)->first() !== null)
                                                        <button class="add-to-wishlist"><a
                                                                href="{{ url('/remove-from-wishlist', [$product->product_id]) }}"><i
                                                                    class="fa fa-heart"></i></a><span
                                                                class="tooltipp">remove from wishlist</span></button>
                                                    @else
                                                        <button class="add-to-wishlist">
                                                            <a
                                                                href="{{ url('/add-to-wishlist', [$product->product_id]) }}">
                                                                <i class="fa fa-heart-o"></i>
                                                            </a>
                                                            <span class="tooltipp">add to wishlist</span>
                                                        </button>
                                                    @endif
                                                    @if (DB::table('carts')->where('user_id', '=', auth()->user()->id)->where('cart_status', '=', 'pending')->where('product_id', '=', $product->id)->first() !== null)
                                                        <button class="add-to-compare">
                                                            <a
                                                                href="{{ url('/remove-from-cart', [$product->product_id]) }}">
                                                                <i class="fa fa-cart-arrow-down"></i>
                                                            </a>
                                                            <span class="tooltipp">remove from cart</span></button>
                                                    @else
                                                        <button class="add-to-wishlist">
                                                            <a href="{{ url('/add-to-cart', [$product->product_id]) }}">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </a>
                                                            <span class="tooltipp">add to cart</span>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    @endforeach
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top selling</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    @foreach ($ts as $t)
                                        @if ($t->Product->qty > 0)
                                            <!-- product -->
                                            <div class="product">
                                                <div class="product-img">
                                                    <img height="200px"
                                                        src="{{ $t->Product->Images->first()->image_name }}"
                                                        alt="">
                                                    <div class="product-label">
                                                        <span class="new">Top Selling </span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Category</p>
                                                    <h3 class="product-name"><a
                                                            href="{{ url('/product', [$t->Product->product_id]) }}">{{ $t->Product->name }}</a>
                                                    </h3>
                                                    <h4 class="product-price">${{ $t->Product->price_after_sale }} <del
                                                            class="product-old-price">{{ $t->Product->price }}</del>
                                                    </h4>
                                                    <div class="product-btns">
                                                        <button class="quick-view"><a
                                                                href="{{ url('/product', [$t->Product->product_id]) }}"><i
                                                                    class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                                view</span></button>
                                                        @if (DB::table('wishes')->where('user_id', '=', auth()->user()->id)->where('product_id', '=', $t->Product->id)->first() !== null)
                                                            <button class="add-to-wishlist"><a
                                                                    href="{{ url('/remove-from-wishlist', [$t->Product->product_id]) }}"><i
                                                                        class="fa fa-heart"></i></a><span
                                                                    class="tooltipp">remove from wishlist</span></button>
                                                        @else
                                                            <button class="add-to-wishlist"><a
                                                                    href="{{ url('/add-to-wishlist', [$t->Product->product_id]) }}"><i
                                                                        class="fa fa-heart-o"></i></a><span
                                                                    class="tooltipp">add
                                                                    to wishlist</span></button>
                                                        @endif
                                                        <button class="add-to-compare">
                                                            <a
                                                                href="{{ url('/add-to-cart', [$t->Product->product_id]) }}">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </a>
                                                            <span class="tooltipp">add to cart</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /product -->
                                        @endif
                                    @endforeach

                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
