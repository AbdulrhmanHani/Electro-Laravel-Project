<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Electro - Register</title>
</head>

<body>

    @include('layouts.errors')

    <form method="POST" action="{{ url('/register') }}">
        <div class="form container-fluid">
            @csrf

            <h3 class="text-center"><strong>Electro - register</strong></h3>
            <div class="container">
                <label class="" for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <br>
            <br>
            <div class="container">
                <label class="" for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>
            <br>
            <br>
            <div class="container">
                <label class="" for="phone">Phone</label>
                <input type="number" name="phone" placeholder="+20" class="form-control" id="phone">
            </div>
            <br>
            <br>
            <div class="container">
                <label class="" for="address">Address</label>
                <input type="text" name="address" class="form-control" id="address">
            </div>
            <br>
            <br>
            <div class="container">
                <label class="" for="pass">Password</label>
                <input type="password" name="password" class="form-control" id="pass">
            </div>
        </div>
        <div class="container">
            <label class="" for="cpass">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="cpass">
        </div>
        <div class="container">
            <br>
            <button type="submit" class="btn btn-success ml-4">Register</button>
        </div>
        <br>
        <h5 style="margin-left: 40px" class="">Already Have an email? login
            <a href="{{ url('/login') }}">here</a>
        </h5>
    </form>
</body>

</html>
