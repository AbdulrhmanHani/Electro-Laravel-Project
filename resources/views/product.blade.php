@extends('layouts.main')
@section('title')
    Product {{ $product->name }}
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
                        <li><a
                                href="{{ url('/category', [$product->Category->category_id]) }}">{{ $product->Category->category_name }}</a>
                        </li>
                        <li class="active">{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
            <div style="background-color: rgba(105, 100, 116, 0.063);text-align: center;width: auto">
                <h4 style="color: green">
                    {{ request()->session()->get('review-success') }}
                </h4>
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
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        @foreach ($product->Images as $image)
                            <div class="product-preview">
                                <img src="{{ asset($image->image_name) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        @foreach ($product->Images as $image)
                            <div class="product-preview">
                                <img src="{{ asset($image->image_name) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /Product thumb imgs -->

                @if ($product->qty <= 0)
                    <!-- Product details -->
                    <div class="col-md-5">
                        <div class="product-details">
                            <h2 class="product-name">{{ $product->name }}</h2>
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <a class="review-link" href="#">{{ $product->Reviews->count() }} Review(s) | Add your
                                    review</a>
                            </div>
                            <div>
                                <br>
                                <h4 class="text-danger">Out Of Stock</h4>
                            </div>
                            <p>{{ $product->description }}</p>
                            <ul class="product-links">
                                <li>Category:</li>
                                <li><a
                                        href="{{ url('/category', [$product->Category->category_id]) }}">{{ $product->Category->category_name }}</a>
                                </li>
                            </ul>

                            <ul class="product-links">
                                <li>Share:</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    <!-- /Product details -->
                @else
                    <!-- Product details -->
                    <div class="col-md-5">
                        <div class="product-details">
                            <h2 class="product-name">{{ $product->name }}</h2>
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <a class="review-link" data-toggle="tab" href="#tab3">{{ $product->Reviews->count() }}
                                    Review(s) | Add your
                                    review</a>
                            </div>
                            <div>
                                <h3 class="product-price" style="color: green">${{ $product->price_after_sale }} <del
                                        class="product-old-price" style="color: red">${{ $product->price }}</del></h3>
                                <span class="product-available" style="color: grey"> In Stock</span>
                                @if ($product->qty <= 3)
                                    <h4 class="text-danger">Only {{ $product->qty }} left buy now</h4>
                                @endif
                            </div>
                            <p>{{ $product->description }}</p>
                            <form action="{{ url('/add-single-to-cart', []) }}" method="POST">
                                @csrf
                                <input type="hidden" name="productId" value="{{ $product->product_id }}">
                                <div class="add-to-cart">
                                    <div class="qty-label">
                                        Qty
                                        <div class="input-number selector">
                                            <select name="productQty" class="form-control text-center">
                                                @for ($i = 0; $i < $product->qty; $i++)
                                                    <option value="{{ $i + 1 }}">{{ $i + 1 }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                </div>
                            </form>

                            <ul class="product-btns">
                                @if (DB::table('wishes')->where('user_id', '=', auth()->user()->id)->where('product_id', '=', $product->id)->first() !== null)
                                    <li><a href="{{ url('remove-from-wishlist', [$product->product_id]) }}"><i
                                                class="fa fa-heart"></i> remove from wishlist</a></li>
                                @else
                                    <li><a href="{{ url('/add-to-wishlist', [$product->product_id]) }}"><i
                                                class="fa fa-heart-o"></i> add to wishlist</a></li>
                                @endif
                            </ul>
                            <ul class="product-links">
                                <li>Category:</li>
                                <li><a
                                        href="{{ url('/category', [$product->Category->category_id]) }}">{{ $product->Category->category_name }}</a>
                                </li>
                            </ul>

                            <ul class="product-links">
                                <li>Share:</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    <!-- /Product details -->
                @endif

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab3">Reviews ({{ $product->Reviews->count() }})</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        @include('layouts.errors')
                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->

                            <!-- tab3  -->
                            <div id="tab3" class="tab-pane fade in">
                                <div class="row">
                                    <!-- Rating -->
                                    <div class="col-md-3">
                                        <div id="rating">
                                            <div class="rating-avg">
                                                <span>{{ $product->Reviews->sum('stars') * 0.01 }}%</span>
                                                <div class="rating-stars">

                                                    <i class="fa fa-star"></i>

                                                    <i class="fa fa-star-o"></i>

                                                </div>
                                            </div>
                                            <ul class="rating">
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div
                                                            style="width: {{ $product->Reviews->where('stars', '=', 5)->count() }}%;">
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="sum">{{ $product->Reviews->where('stars', '=', 5)->count() }}</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div
                                                            style="width: {{ $product->Reviews->where('stars', '=', 4)->count() }}%;">
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="sum">{{ $product->Reviews->where('stars', '=', 4)->count() }}</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div
                                                            style="width: {{ $product->Reviews->where('stars', '=', 3)->count() }}%;">
                                                        </div>

                                                    </div>
                                                    <span
                                                        class="sum">{{ $product->Reviews->where('stars', '=', 3)->count() }}</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div
                                                            style="width: {{ $product->Reviews->where('stars', '=', 2)->count() }}%">
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="sum">{{ $product->Reviews->where('stars', '=', 2)->count() }}</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div
                                                            style="width: {{ $product->Reviews->where('stars', '=', 1)->count() }}%">
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="sum">{{ $product->Reviews->where('stars', '=', 1)->count() }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Rating -->

                                    <!-- Reviews -->
                                    <div class="col-md-6">
                                        <div id="reviews">
                                            <ul class="reviews">
                                                @foreach ($product->Reviews as $review)
                                                    <li>
                                                        <div class="review-heading">
                                                            <h5 class="name">{{ $review->User->name }}</h5>
                                                            <p class="date">{{ $review->created_at }}</p>
                                                            <div class="review-rating">
                                                                @for ($i = 1; $i <= $review->stars; $i++)
                                                                    <i class="fa fa-star"></i>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>{{ $review->content }}</p>
                                                            @if ($review->user_id == auth()->user()->id)
                                                                <a href="{{ url('/delrev', [$review->review_id]) }}">
                                                                    <i style="background-color: red;color: white"
                                                                        class="btn fa fa-trash" aria-hidden="true"></i>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </li>
                                                    <hr>
                                                @endforeach
                                            </ul>
                                            {{-- <ul class="reviews-pagination">
                                                <li class="active">1</li>
                                                <li><a href="#section2">2</a></li>
                                                <li><a href="#section3">3</a></li>
                                                <li><a href="#section4">4</a></li>
                                                <li><a href="#section"><i class="fa fa-angle-right"></i></a></li>
                                            </ul> --}}
                                        </div>
                                    </div>
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <div class="col-md-3">
                                        <div id="review-form">
                                            <form class="review-form" method="POST"
                                                action="{{ url('/add-review', [$product->product_id]) }}">
                                                @csrf
                                                <textarea class="input" name="content" placeholder="Your Review"></textarea>
                                                <div class="input-rating">
                                                    <span>Your Rating: </span>
                                                    <div class="stars">
                                                        <input name="star" id="star5" name="rating"
                                                            value="5" type="radio"><label for="star5"></label>
                                                        <input name="star" id="star4" name="rating"
                                                            value="4" type="radio"><label for="star4"></label>
                                                        <input name="star" id="star3" name="rating"
                                                            value="3" type="radio"><label for="star3"></label>
                                                        <input name="star" id="star2" name="rating"
                                                            value="2" type="radio"><label for="star2"></label>
                                                        <input name="star" id="star1" name="rating"
                                                            value="1" type="radio"><label for="star1"></label>
                                                    </div>
                                                </div>
                                                <button class="primary-btn">Add your review</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /Review Form -->
                                </div>
                            </div>
                            <!-- /tab3  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>

                @foreach ($rprds as $p)
                    <!-- product -->
                    <div class="col-md-3 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src={{ asset($p->images->first()->image_name) }} alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $p->Category->category_name }}</p>
                                <h3 class="product-name"><a href="#">{{ $p->name }}</a></h3>
                                <h4 class="product-price">${{ $p->price_after_sale }} <del
                                        class="product-old-price">${{ $p->price }}</del></h4>
                                <div class="product-rating">
                                </div>
                                <div class="product-btns">
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
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
                                    <button class="add-to-compare">
                                        <a href="{{ url('/add-to-cart', [$product->product_id]) }}">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                        <span class="tooltipp">add to cart</span></button>
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
    <!-- /Section -->
@endsection
