@extends('layouts.admin')
@section('title')
    Add Category
@endsection
@section('main')
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Category</h3>
                <div class="card">
                    <div class="card-body p-5">
                        @include('layouts.errors')
                        <form method="POST" action="{{ url('/add-category') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="catName" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="container d-flex justify-content-between">
                                    <p onclick="">Category Image</p>
                                    <img class="img" id="newImage" src="#" width="100px" height="100px">
                                </div>
                                <br>
                                <input accept="image/*" type="file" name="catImage" id="imgInp" class="form-control">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="{{ url('/mario/categories', []) }}">Back</a>
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
