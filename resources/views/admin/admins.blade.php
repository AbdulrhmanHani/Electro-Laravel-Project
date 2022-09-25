@extends('layouts.admin')
@section('title')
    Admins
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            @if (request()->session()->has('guro'))
                <div class="col-md-10 offset-md-1">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>All Admins</h3>
                        <a href="{{ url('mario/add-admin') }}" class="btn btn-success">
                            Add Admin
                        </a>
                    </div>
                    <form action="{{ url('/mario/admin/search', []) }}" method="GET">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <input value="{{ $key ?? null }}" type="search" class="form-control text-center"
                                placeholder="Search Admins..." name="key">
                        </div>
                    </form>
            @endif

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Added At</th>
                        @if (request()->session()->has('guro'))
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $index => $admin)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>0{{ $admin->phone_number }}</td>
                            <td>{{ $admin->created_at }}</td>
                            @if (request()->session()->has('guro'))
                                <td>{{ $admin->role }}</td>
                            @endif
                            <td>
                                @if (request()->session()->has('guro'))
                                    <a class="btn btn-sm btn-info"
                                        href="{{ url('/mario/edit-admin', [$admin->admin_id]) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif
                                @if (request()->session()->has('guro'))
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ url('/mario/delete-admin', [$admin->admin_id]) }}">
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
