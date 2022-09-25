@extends('layouts.admin')
@section('title')
    Users
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Admins</h3>
                </div>
                <form action="{{ url('/mario/user/search', []) }}" method="GET">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <input type="search" class="form-control text-center" placeholder="Search Users..."
                            name="key">
                    </div>
                </form>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Address</th>
                            @if (request()->session()->has('guro'))
                                <th scope="col">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>0{{ $user->phone_number }}</td>
                                <td>{{ $user->address }}</td>
                                <td>
                                    @if (request()->session()->has('guro'))
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ url('/mario/delete-user', [$user->user_id]) }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
