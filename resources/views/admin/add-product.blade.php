@extends('layouts.admin')
@section('title')
    Add Product
@endsection
@section('main')
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Product</h3>
                <div class="card">
                    <div class="card-body p-5">
                        @include('layouts.errors')
                        <form method="POST" enctype="multipart/form-data" action="{{ url('/mario/add-product') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="productName" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select name="productCategory" class="form-control">
                                    @foreach (DB::table('categories')->get() as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="productPrice" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Price After Sale</label>
                                <input type="number" name="productPriceAfterSale" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Pieces</label>
                                <input type="number" name="productQty" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="descriptoin" rows="3"></textarea>
                            </div>






                            <div class="form-group">
                                <input accept="image/*" type="file" name="productImage1" id="imgInp1"
                                    class="form-control">
                                <div class="container d-flex justify-content-between">
                                    <p onclick="">Product Image 1</p>
                                    <img class="img" id="newImage1" src="#" width="100px" height="100px">
                                </div>
                                <br>


                                <input accept="image/*" type="file" name="productImage2" id="imgInp2"
                                    class="form-control">
                                <div class="container d-flex justify-content-between">
                                    <p onclick="">Product Image 2</p>
                                    <img class="img" id="newImage2" src="#" width="100px" height="100px">
                                </div>
                                <br>

                                <input accept="image/*" type="file" name="productImage3" id="imgInp3"
                                    class="form-control">
                                <div class="container d-flex justify-content-between">
                                    <p onclick="">Product Image 3</p>
                                    <img class="img" id="newImage3" src="#" width="100px" height="100px">
                                </div>
                                <br>

                                <input accept="image/*" type="file" name="productImage4" id="imgInp4"
                                    class="form-control">
                                <div class="container d-flex justify-content-between">
                                    <p onclick="">Product Image 4</p>
                                    <img class="img" id="newImage4" src="#" width="100px" height="100px">
                                </div>
                                <br>

                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
