<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Electro - Dashboard Admin</title>
    <!-- loader
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script> -->
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Vector CSS -->
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="{{ asset('assets/css/sidebar-menu.css') }}" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">
    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
                <a href="{{ url('/mario', []) }}">
                    <img src="./img/logo.png" class="logo-icon" alt="logo icon">
                    <h5 class="logo-text">Dashboard Admin</h5>
                </a>
            </div>
            <ul class="sidebar-menu do-nicescrol">
                <li class="sidebar-header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{ url('/mario', []) }}">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/mario/categories', []) }}">
                        <i class="zmdi zmdi-invert-colors"></i> <span>Categories
                            ({{ DB::table('categories')->count() }})</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/mario/products', []) }}">
                        <i class="zmdi zmdi-format-list-bulleted"></i> <span>Products
                            ({{ DB::table('products')->count() }})</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/mario/users', []) }}">
                        <i class="zmdi zmdi-face"></i> <span>Users ({{ DB::table('users')->count() }})</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/mario/admins', []) }}">
                        <i class="zmdi zmdi-power"></i>
                        <span>Admins({{ DB::table('admins')->where('role', '!=', 'guro')->count() }})</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/mario/orders', []) }}">
                        <i class="zmdi zmdi-file-text"></i> <span>Orders ({{ DB::table('orders')->count() }})</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/mario/reviews', []) }}">
                        <i class="zmdi zmdi-star-circle"></i> <span>Reviews ({{ DB::table('reviews')->count() }})</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/mario/profits', []) }}">
                        <i class="zmdi zmdi-money"></i> <span>Profits ({{ DB::table('profits')->count() }})</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/mario/profile', []) }}">
                        <i class="zmdi zmdi-face"></i> <span>Profile</span>
                    </a>
                </li>

                <li class="sidebar-header">LABELS</li>
                <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a>
                </li>
                <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i>
                        <span>Warning</span></a></li>
                <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a>
                </li>

            </ul>

        </div>
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        <header class="topbar-nav">
            <nav class="navbar navbar-expand fixed-top">
                <ul class="navbar-nav mr-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link toggle-menu" href="javascript:void();">
                            <i class="icon-menu menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form class="search-bar">
                            <input type="text" class="form-control" placeholder="Enter keywords">
                            <a href="javascript:void();"><i class="icon-magnifier"></i></a>
                        </form>
                    </li>
                </ul>

                <ul class="navbar-nav align-items-center right-nav-link">
                    <li class="nav-item dropdown-lg">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown"
                            href="javascript:void();">
                            <i class="fa fa-envelope-open-o"></i></a>
                    </li>
                    <li class="nav-item dropdown-lg">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown"
                            href="javascript:void();">
                            <i class="fa fa-bell-o"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown"
                            href="#">
                            <span class="user-profile">
                                <h4>
                                    {{ request()->session()->get('admin') ??(request()->session()->get('super_admin') ??request()->session()->get('guro')) }}
                                </h4>
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">

                                        <div class="media-body">
                                            <a href="{{ url('/mario/profile', []) }}">
                                                <h6 class="mt-2 user-title">
                                                    {{ request()->session()->get('admin') ??(request()->session()->get('super_admin') ??request()->session()->get('guro')) }}
                                                </h6>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <a href="{{ url('/mlogout', []) }}">
                                <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
                            </a>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">

                <!--Start Dashboard Content-->

                <div class="card mt-3">
                    <div class="card-content">
                        <div class="row row-group m-0">
                            <div class="col-12 col-lg-6 col-xl-3 border-light">
                                <div class="card-body">
                                    <h5 class="text-white mb-0">
                                        {{ DB::table('orders')->where('order_status', '=', 'approved')->get()->count() }}
                                        <span class="float-right"><i class="fa fa-shopping-cart"></i></span>
                                    </h5>
                                    <div class="progress my-3" style="height:3px;">
                                        <div class="progress-bar"
                                            style="width:{{ DB::table('orders')->where('order_status', '=', 'approved')->get()->count() }}%">
                                        </div>
                                    </div>
                                    <p class="mb-0 text-white small-font">Total Orders</p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-xl-3 border-light">
                                <div class="card-body">
                                    <h5 class="text-white mb-0">{{ DB::table('profits')->sum('total') }} <span
                                            class="float-right"><i class="fa fa-usd"></i></span></h5>
                                    <div class="progress my-3" style="height:3px;">
                                        <div class="progress-bar" style="width:15%"></div>
                                    </div>
                                    <p class="mb-0 text-white small-font">Total Profits </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-danger-light2 text-center w-auto">
                    <h4 class="text-white">
                        {{ request()->session()->get('dont_message') }}
                    </h4>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fa fa-circle mr-2 text-white"></i>New
                                        Visitor
                                    </li>
                                    <li class="list-inline-item"><i class="fa fa-circle mr-2 text-light"></i>Old
                                        Visitor
                                    </li>
                                </ul>
                                <div class="chart-container-1">
                                    <canvas id="chart1"></canvas>
                                </div>
                            </div>
                            <div class="row m-0 row-group text-center border-top border-light-3">
                                <div class="col-12 col-lg-4">
                                    <div class="p-3">
                                        <h5 class="mb-0">45.87M</h5>
                                        <small class="mb-0">Overall Visitor <span> <i class="fa fa-arrow-up"></i>
                                                2.43%</span></small>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="p-3">
                                        <h5 class="mb-0">15:48</h5>
                                        <small class="mb-0">Visitor Duration <span> <i class="fa fa-arrow-up"></i>
                                                12.65%</span></small>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="p-3">
                                        <h5 class="mb-0">245.65</h5>
                                        <small class="mb-0">Pages/Visit <span> <i class="fa fa-arrow-up"></i>
                                                5.62%</span></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="card">
                            <div class="card-header">Week Activity

                            </div>
                            <div class="card-body">
                                <div class="chart-container-2">
                                    <input type="hidden" id="admins"
                                        value="{{ DB::table('admins')->get()->count() }}">
                                    <input type="hidden" id="users"
                                        value="{{ DB::table('users')->get()->count() }}">
                                    <input type="hidden" id="products"
                                        value="{{ DB::table('products')->get()->count() }}">
                                    <input type="hidden" id="carts"
                                        value="{{ DB::table('carts')->get()->count() }}">
                                    <input type="hidden" id="orders"
                                        value="{{ DB::table('orders')->get()->count() }}">
                                    <canvas id="chart2"></canvas>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center">
                                    <tbody>
                                        <tr>
                                            <td><i class="fa fa-circle text-white mr-2"></i>Admins</td>
                                            <td></td>
                                            <td>+{{ DB::table('admins')->get()->count() }}%</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-circle text-light-1 mr-2"></i>Users</td>
                                            <td></td>
                                            <td>+{{ DB::table('users')->get()->count() }}%</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-circle text-light-2 mr-2"></i>Products</td>
                                            <td></td>
                                            <td>+{{ DB::table('products')->get()->count() }}%</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fa fa-circle text-light-3 mr-2"></i>Orders</td>
                                            <td></td>
                                            <td>+{{ DB::table('orders')->get()->count() }}%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">Recent Order Tables
                                <div class="card-action">
                                    <div class="dropdown">
                                        <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                            data-toggle="dropdown">
                                            <i class="icon-options"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ url('/mario/orders', []) }}">All
                                                Orders</a>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Photo</th>
                                            <th>User ID</th>
                                            <th>Order ID</th>
                                            <th>Amount</th>
                                            <th>Address</th>
                                            <th>Date</th>
                                            <th>Shipping</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td> <a
                                                        href="{{ url('/mario/show-product', [$order->Cart->Product->product_id]) }}">{{ $order->Cart->Product->name }}</a>
                                                </td>
                                                <td><img src="{{ asset($order->Cart->Product->Images()->first()->image_name) }}"
                                                        class="product-img" alt="product img"></td>
                                                <td>#{{ $order->User->user_id }}</td>
                                                <td>#{{ $order->order_id }}</td>
                                                <td>$ {{ $order->total }}</td>
                                                <td>{{ $order->User->address }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>
                                                    <p class="text-center">{{ $x = rand(1, 100) }}%</p>
                                                    <div class="progress shadow" style="height: 3px;">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{ $x }}%">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->

                <!--End Dashboard Content-->

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->

            </div>
            <!-- End container-fluid-->

        </div>
        <!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        <footer class="footer">
            <div class="container">
                <div class="text-center">
                    Copyright © 2022 Abdulrhman Hani
                </div>
            </div>
        </footer>
        <!--End footer-->

        {{-- <!--start color switcher-->
        <div class="right-sidebar">
            <div class="switcher-icon">
                <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
            </div>
            <div class="right-sidebar-content">

                <p class="mb-0">Gaussion Texture</p>
                <hr>

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>

                <p class="mb-0">Gradient Background</p>
                <hr>

                <ul class="switcher">
                    <li id="theme7"></li>
                    <li id="theme8"></li>
                    <li id="theme9"></li>
                    <li id="theme10"></li>
                    <li id="theme11"></li>
                    <li id="theme12"></li>
                    <li id="theme13"></li>
                    <li id="theme14"></li>
                    <li id="theme15"></li>
                </ul>

            </div>
        </div>
        <!--end color switcher--> --}}

    </div>
    <!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- simplebar js -->
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
    <!-- sidebar-menu js -->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <!-- loader scripts -->
    <script src="{{ asset('assets/js/jquery.loading-indicator.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('assets/js/app-script.js') }}"></script>
    <!-- Chart js -->

    <script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}"></script>

    <!-- Index js -->
    <script src="{{ asset('assets/js/index.js') }}"></script>


</body>

</html>
