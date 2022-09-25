<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    @yield('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>Electro - @yield('title')</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container" style="color: white">
                <ul class="header-links pull-left">
                    <li><i class="fa fa-user"></i> {{ auth()->user()->name }}</li>
                    <li><i class="fa fa-phone"></i> 0{{ auth()->user()->phone_number }}</li>
                    <li><i class="fa fa-envelope-o"></i> {{ auth()->user()->email }}</li>
                    <li><i class="fa fa-map-marker"></i> {{ auth()->user()->address }}</li>
                </ul>
                <ul class="header-links pull-right">
                    <li><a href="{{ url('/orders', []) }}"><i class="fa fa-first-order"></i>My Orders</a></li>
                    <li><a href="{{ url('/profile', []) }}"><i class="fa fa-user-o"></i> My Account</a></li>
                    <li><a href="{{ url('/logout', []) }}"><i class="fa fa-arrow-left"></i> Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="{{ url('/', []) }}" class="logo">
                                <img src="{{ asset('img/logo.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form method="GET" action="{{ url('/search', []) }}">
                                <select name="category" class="input-select">
                                    <option value="all">All Categories</option>
                                    @foreach (DB::table('categories')->get() as $categorii)
                                        @if ($categorii->category_id == request()->get('category'))
                                            <option selected value="{{ $categorii->category_id }}">
                                                {{ $categorii->category_name }}
                                            </option>
                                        @else
                                            <option value="{{ $categorii->category_id }}">
                                                {{ $categorii->category_name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @if (request()->has('key') and request()->has('category'))
                                    <input class="input" name="key" autofocus value="{{ $key }}"
                                        placeholder="Search here...">
                                @else
                                    <input class="input" name="key" placeholder="Search here...">
                                @endif

                                <button class="search-btn" type="submit">Search</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->
                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="{{ url('/wishlist', []) }}">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                    <div class="qty">
                                        {{ DB::table('wishes')->where('user_id', '=', auth()->user()->id)->count() }}
                                    </div>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                    <div class="qty">{{ $carts->count() }}</div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        @foreach ($carts as $cart)
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="{{ asset($cart->Product->Images->first()->image_name) }}"
                                                        alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a
                                                            href="{{ url('/product', [$cart->Product->product_id]) }}">{{ $cart->Product->name }}</a>
                                                    </h3>
                                                    <h4 class="product-price"><span
                                                            class="qty">{{ $cart->qty }}x</span>${{ $cart->Product->price_after_sale }}
                                                    </h4>
                                                </div>
                                                <button class="delete">
                                                    <a href="{{ url('/remove-from-cart', [$cart->Product->product_id]) }}"
                                                        style="color: white">
                                                        <i class="fa fa-close"></i>
                                                    </a>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="cart-summary">
                                        <small>{{ $carts->count() }} Item(s) selected</small>
                                        <h5>SUBTOTAL: ${{ $carts->sum('total') }}</h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="{{ url('/cart', []) }}">View Cart</a>
                                        <a href="{{ url('/checkout', []) }}">Checkout
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->
                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="@yield('home-active')"><a href="{{ url('/') }}">Home</a></li>
                    @foreach (DB::table('categories')->get() as $categorii)
                        <li class="">
                            <a
                                href="{{ url('/category', [$categorii->category_id]) }}">{{ $categorii->category_name }}</a>
                        </li>
                    @endforeach
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->
    @yield('main')
    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt
                                ut.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Categories</h3>
                            <ul class="footer-links">
                                <li><a href="#">Hot deals</a></li>
                                <li><a href="#">Laptops</a></li>
                                <li><a href="#">Smartphones</a></li>
                                <li><a href="#">Cameras</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Information</h3>
                            <ul class="footer-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Service</h3>
                            <ul class="footer-links">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">View Cart</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by Abdulrhman Hani
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('js')

</body>

</html>
