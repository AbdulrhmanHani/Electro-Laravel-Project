@extends('layouts.admin')
@section('title')
    All Products
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Products</h3>
                    <a href="{{ url('/mario/add-product') }}" class="btn btn-success">
                        Add new
                    </a>
                </div>
                <form action="{{ url('/mario/product/search', []) }}" method="GET">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <input type="search" class="form-control text-center" placeholder="Search Products..."
                            name="key">
                    </div>
                </form>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Image</th>
                            <th scope="col">Pieces</th>
                            <th scope="col">Price</th>
                            <th scope="col">Added At</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ DB::table('categories')->where('id', '=', $product->category_id)->first()->category_name }}
                                </td>
                                <td>
                                    <a
                                        href="{{ asset(DB::table('images')->where('product_id', '=', $product->id)->first()->image_name) }}">
                                        <img width="100px" height="80px"
                                            src="{{ asset(DB::table('images')->where('product_id', '=', $product->id)->first()->image_name) }}">
                                    </a>
                                </td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ $product->price_after_sale }} $</td>
                                <td>{{ $product->created_at }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ url('/mario/show-product', [$product->product_id]) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if (request()->session()->has('super_admin') ||
                                        request()->session()->has('guro'))
                                        <a class="btn btn-sm btn-info"
                                            href="{{ url('/mario/edit-product', [$product->product_id]) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endif
                                    @if (request()->session()->has('guro'))
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ url('/mario/delete-product', [$product->product_id]) }}">
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
