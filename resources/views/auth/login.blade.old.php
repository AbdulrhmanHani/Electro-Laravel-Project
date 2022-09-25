<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Electro - Login</title>
</head>

<body>

    <form method="POST" action="{{ url('/login') }}">
        <div class="form container-fluid">
            @csrf
            <h3 class="text-center"><strong>Electro - login</strong></h3>
            <div class="container">
                <label class="" for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>
            <br>
            <br>
            <div class="container">
                <label class="" for="pass">Password</label>
                <input type="password" name="password" class="form-control" id="pass">
            </div>
        </div>

        <div class="container">
            <br>
            <button type="submit" class="btn btn-success ml-4">Login</button>
        </div>

        <br>
        <h5 style="margin-left: 40px" class="">Don't Have an email? register
            <a href="{{ url('/register') }}">here</a>
        </h5>

    </form>

</body>

</html>
