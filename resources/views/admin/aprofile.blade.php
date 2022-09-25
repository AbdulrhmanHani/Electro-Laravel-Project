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
                    <img src="/img/logo.png" class="logo-icon" alt="logo icon">
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
                        <i class="zmdi zmdi-power"></i> <span>Admins
                            ({{ DB::table('admins')->where('role', '!=', 'guro')->count() }})</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/mario/orders', []) }}">
                        <i class="zmdi zmdi-file-text"></i> <span>Orders ({{ DB::table('orders')->count() }})</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/mario/profits', []) }}">
                        <i class="zmdi zmdi-money"></i> <span>Profits ({{ DB::table('profits')->count() }})</span>
                    </a>
                </li>
                {{-- <small class="badge float-right badge-light">New</small> --}}
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
                                        <div class="avatar"><img class="align-self-start mr-3"
                                                src="https://via.placeholder.com/110x110" alt="user avatar"></div>
                                        <div class="media-body">
                                            <h6 class="mt-2 user-title">
                                                {{ request()->session()->get('admin') ??(request()->session()->get('super_admin') ??request()->session()->get('guro')) }}
                                            </h6>
                                            <p class="user-subtitle">
                                                {{ DB::table('admins')->where('name','=',request()->session()->get('admin') ??(request()->session()->get('super_admin') ??request()->session()->get('guro')))->first()->email }}
                                            </p>
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
                <div class="col-lg-8">
                    <div class="card">
                        @include('layouts.errors')
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#edit" data-toggle="pill"
                                        class="nav-link"><i class="icon-note"></i> <span
                                            class="hidden-xs">Edit</span></a>
                                </li>
                            </ul>
                            <div class="tab-content p-3">
                                <div class="tab-pane" id="edit">

                                    <form action="{{ url('/mario/edit-profile', []) }}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" type="text" name="name"
                                                    value="{{ $admin->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" type="email" name="email"
                                                    value="{{ $admin->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Phone
                                                Number</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" type="number" name="phone"
                                                    value="{{ $admin->phone_number }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" type="password" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Confirm
                                                password</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" type="password"
                                                    name="password_confirmation">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label"></label>
                                            <div class="col-lg-9">
                                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                                <input type="submit" class="btn btn-primary" value="Save Changes">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

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
