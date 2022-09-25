@extends('layouts.admin')
@section('title')
    Show Product {{ $product->name }}
@endsection
@section('main')
    <div class="container-fluid py-5 position-relative">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Show Product</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <div class="form-group">
                            <label>Product Name: <h4 class="bg-dark-light1">{{ $product->name }}</h4></label>
                        </div>
                        <div class="form-group">
                            <label>Product Description: <h4 class="bg-dark-light1">{{ $product->description }}</h4></label>
                        </div>
                        <div class="form-group ">
                            <label>Product Price: <h4 class="bg-dark-light1 text-danger">{{ $product->price }}$</h4></label>
                        </div>
                        <div class="form-group">
                            <label>Product Price After Sale: <h4 class="bg-dark-light1 text-success">
                                    {{ $product->price_after_sale }}$
                                </h4></label>
                        </div>
                        <div class="form-group">
                            <label>Product Quantaty: <h4 class="bg-dark-light1">{{ $product->qty }}</h4></label>
                        </div>
                        <div class="form-group">
                            <label>Product Belongs To:
                                <h4 class="bg-dark-light1">{{ $product->Category->category_name }}</h4>
                            </label>
                        </div>
                    </div>


                    <div class="container-fluid d-flex" style="right: 0">
                        @foreach ($product->Images as $prImg)
                            <div class="mx-1">
                                <a href="{{ asset($prImg->image_name) }}">
                                    <img width="150px" height="150px" src="{{ asset($prImg->image_name) }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-5">
                        <a class="btn btn-dark" href="{{ url('/mario/products', []) }}">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
