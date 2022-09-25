<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Electro - Register</title>
    {{-- <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script> --}}
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="loader-wrapper">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="card card-authentication1 mx-auto my-5">
            <div class="card-body">
                <div class="card-content p-2">
                    <div class="text-center">
                        <img src="./img/logo.png" alt="logo icon">
                    </div>
                    @include('layouts.errors')
                    <form method="POST" action="{{ url('/register') }}">
                        @csrf



                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Username</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" name="name" id="exampleInputUsername"
                                    class="form-control input-shadow" placeholder="Enter Username">
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Email</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" name="email" id="exampleInputUsername"
                                    class="form-control input-shadow" placeholder="Enter Email">
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Phone Number</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" name="phone" id="exampleInputUsername"
                                    class="form-control input-shadow" placeholder="Enter Phone Number">
                                <div class="form-control-position">
                                    <i class="fa fa-phone-square"></i>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Address</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" name="address" id="exampleInputUsername"
                                    class="form-control input-shadow" placeholder="Enter Address">
                                <div class="form-control-position">
                                    <i class="fa fa-location-arrow"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword" class="sr-only">Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" name="password" id="exampleInputPassword"
                                    class="form-control input-shadow" placeholder="Enter Password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Confirm Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" name="password_confirmation" id="exampleInputUsername"
                                    class="form-control input-shadow" placeholder="Confirm Password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>



                        <label>already have an account?, signin <a href="{{ url('/login', []) }}">Here</a></label>

                        <button type="submit" class="btn btn-light btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>

        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

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
    <!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- sidebar-menu js -->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

    <!-- Custom scripts -->
    <script src="{{ asset('assets/js/app-script.js') }}"></script>

</body>

</html>
