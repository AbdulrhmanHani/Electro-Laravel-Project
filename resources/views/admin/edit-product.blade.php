@extends('layouts.admin')
@section('title')
    Edit Product {{ $product->name }}
@endsection
@section('main')
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Product : {{ $product->name }}</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ url('/mario/edit-product', [$product->product_id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input name="productName" value="{{ $product->name }}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="productCategory" class="form-control">
                                    @foreach (DB::table('categories')->get() as $productCategory)
                                        @if ($product->category_id == $productCategory->id)
                                            <option value="{{ $product->category_id }}" selected>
                                                {{ $product->Category->category_name }}</option>
                                        @else
                                            <option value="{{ $productCategory->id }}">{{ $productCategory->category_name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="productPrice" value="{{ $product->price }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Price After Sale</label>
                                <input type="number" name="productPriceAfterSale" value="{{ $product->price_after_sale }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Pieces</label>
                                <input name="productQty" value="{{ $product->qty }}" type="number" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="productDescription" class="form-control" rows="3">{{ $product->description }}</textarea>
                            </div>
                            <div class="custom-file">

                                @foreach ($product->Images as $i => $prImg)
                                    <input accept="image/*" type="file" name="newImage{{ $i + 1 }}"
                                        id="imgInp{{ $i + 1 }}" class="form-control">
                                    <div class="container d-flex justify-content-between">
                                        <p>Current Product Image {{ $i + 1 }}</p>
                                        <img class="img" width="100px" height="100px" style="position: relative;"
                                            src="{{ asset($prImg->image_name) }}" alt="">
                                        <p onclick="">New Product Image {{ $i + 1 }}</p>
                                        <img class="img" id="newImage{{ $i + 1 }}" src="#" width="100px"
                                            height="100px" alt="">
                                        @if ($product->Images[$i]->image_name !== $product->Images->first()->image_name)
                                            <a href="{{ url('/mario/delete-image', [$product->Images[$i]]) }}"
                                                class="">Delete</a>
                                        @endif

                                    </div>
                                @endforeach
                                <br>
                                <br>
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a class="btn btn-dark" href="{{ url('/mario/products', []) }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/editCategory.js') }}"></script>
@endsection
