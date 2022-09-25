@extends('layouts.main')
@section('title')
    Your WishList
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
                        <li class="active">WishList</li>
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
                @foreach (auth()->user()->Wishs as $wish)
                    <!-- product -->
                    <div class="col-md-3 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img height="200px" src="{{ asset($wish->Product->Images->first()->image_name) }}">
                                <div class="product-label">
                                    <span class="sale">New</span>
                                </div>
                            </div>
                            <div class="product-body">
                                {{-- <p class="product-category">{{ $category->category_name }}</p> --}}
                                <h3 class="product-name"><a
                                        href="{{ url('/product', [$wish->Product->product_id]) }}">{{ $wish->Product->name }}</a>
                                </h3>
                                <h4 class="product-price">${{ $wish->Product->price_after_sale }} <del
                                        class="product-old-price">${{ $wish->Product->price }}</del></h4>
                                <div class="product-rating">
                                </div>
                                <div class="product-btns">

                                    <button class="quick-view"><a
                                            href="{{ url('/product', [$wish->Product->product_id]) }}"><i
                                                class="fa fa-eye"></i></a><span class="tooltipp">quick
                                            view</span></button>
                                    @if (DB::table('wishes')->where('user_id', '=', auth()->user()->id)->where('product_id', '=', $wish->Product->id)->first() !== null)
                                        <button class="add-to-wishlist"><a
                                                href="{{ url('/remove-from-wishlist', [$wish->Product->product_id]) }}"><i
                                                    class="fa fa-heart"></i></a><span class="tooltipp">remove from
                                                wishlist</span></button>
                                    @else
                                        <button class="add-to-wishlist"><a
                                                href="{{ url('/add-to-wishlist', [$wish->Product->product_id]) }}"><i
                                                    class="fa fa-heart-o"></i></a><span class="tooltipp">add
                                                to wishlist</span></button>
                                    @endif

                                    <button class="quick-view"><i class="fa fa-shopping-cart"></i><span class="tooltipp">add
                                            to cart</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->
                @endforeach

                @if (auth()->user()->Wishs->count() !== 0)
                    <div class="container" style="position: relative;margin-bottom: 30px">
                        <a class="primary-btn cta-btn" style="position: absolute;right:0"
                            href="{{ url('/add-wishs-to-cart', []) }}">Add {{ auth()->user()->Wishs->count() }} To Cart</a>
                    </div>
                    <div class="container" style="position: relative;margin-bottom: 30px">
                        <a class="primary-btn cta-btn" style="position: absolute;right:0"
                            href="{{ url('/') }}">Back</a>
                    </div>
                    @else
                    <div class="container" style="position: relative;margin-bottom: 30px">
                        <a class="primary-btn cta-btn" style="position: absolute;right:0"
                            href="{{ url('/') }}">Back</a>
                    </div>
                @endif
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
