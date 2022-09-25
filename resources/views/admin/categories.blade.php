@extends('layouts.admin')
@section('title')
    Categories
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Categories</h3>
                    <a href="{{ url('add-category', []) }}" class="btn btn-success">
                        Add new
                    </a>
                </div>

                <form action="{{ url('/mario/category/search', []) }}" method="GET">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <input type="search" class="form-control text-center" placeholder="Search Categories..."
                            name="key">
                    </div>
                </form>

                <table class="table table-hover">
                    <thead class="text-center">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col" class="text-left">Products</th>
                            <th scope="col">Added At</th>
                            @if (request()->session()->has('super_admin') ||
                                request()->session()->has('guro'))
                                <th scope="col">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($categories as $index => $category)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="{{ asset($category->image) }}">
                                        <img src="{{ asset($category->image) }}" width="100px" height="100px"
                                            alt="">
                                    </a>
                                </td>
                                <td class="text-left">
                                    @foreach ($category->Products as $i => $product)
                                        <br>
                                        {{ $i + 1 }}- <a
                                            href="{{ url('/mario/show-product', [$product->product_id]) }}">{{ $product->name }}</a>
                                    @endforeach
                                </td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    @if (request()->session()->has('super_admin') ||
                                        request()->session()->has('guro'))
                                        <a class="btn btn-sm btn-info"
                                            href="{{ url('/mario/edit-category', [$category->category_id]) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endif
                                    @if (request()->session()->has('guro'))
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ url('/mario/deleteCategory', [$category->category_id]) }}">
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
