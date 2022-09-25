<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        {{-- <a class="navbar-brand active" href="{{ url('/mario', []) }}">Electro</a> --}}
        <!-- LOGO -->
        <div class="col-md-3">
            <div class="header-logo">
                <a href="{{ url('/mario') }}" class="logo">
                    <img src="{{ url('/img/logo.png') }}" height="55px" alt="">
                </a>
            </div>
        </div>
        <!-- /LOGO -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 container w-50 text-center">
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('/mario/categories', []) }}">Categories</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light" href="{{ url('/mario/products', []) }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('/mario/users', []) }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('/mario/admins', []) }}">Admins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('/mario/orders', []) }}">Orders</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('/mario/profits', []) }}">Profits</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('/mario/reviews', []) }}">Reviews</a>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ({{ str()->upper(DB::table('admins')->where('name','=',request()->session()->get('admin') ??(request()->session()->get('super_admin') ??request()->session()->get('guro')))->first()->role) }})
                        |
                        {{ request()->session()->get('admin') ??(request()->session()->get('super_admin') ??request()->session()->get('guro')) }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/mario/profile', []) }}">Profile</a>
                        <a class="dropdown-item" href="{{ url('/mlogout') }}">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    @yield('main')
    <script src="{{ asset('admin/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    @yield('js')
</body>

</html>
