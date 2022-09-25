@extends('layouts.admin')
@section('title')
    Add Admin
@endsection
@section('main')
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Admin</h3>
                <div class="card">
                    <div class="card-body p-5">
                        @include('layouts.errors')
                        <form method="POST" action="{{ url('/mario/add-admin') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="adminName" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="adminEmail" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="adminPhone" class="form-control">
                            </div>

                            <label class="col-form-label" for="role">Role</label>
                            <select name="adminRole" id="role" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="super_admin">Super Admin</option>
                            </select>
                            <br>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Add Admin</button>
                                <a class="btn btn-dark" href="{{ url('/mario/admins') }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
