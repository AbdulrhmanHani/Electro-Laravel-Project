@extends('layouts.main')
@section('title')
    Edit Profile
@endsection
@section('main')
    <div class="container-fluid py-5">
        <br>
        <div class="row" style="margin-left: 35%">
            <div class="col-md-6 offset-md-3">
                @include('layouts.errors')
                <h3 class="mb-3">Edit Profile</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form action="{{ url('/edit-profile', []) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ auth()->user()->name }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" name="phone" value="0{{ auth()->user()->phone_number }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="{{ auth()->user()->address }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Confrim Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a class="btn btn-dark" href="{{ url('/', []) }}">Back</a>
                            </div>
                        </form>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@endsection
