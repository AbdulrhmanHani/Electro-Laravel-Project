@extends('layouts.admin')
@section('title')
    Edit Category {{ $category->category_name }}
@endsection
@section('main')
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Category : {{ $category->category_name }}</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ url('/mario/edit-category', [$category->category_id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="newName" value="{{ $category->category_name }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="container d-flex justify-content-between">
                                    <p>Current Image</p>
                                    <img class="img" width="100px" height="100px"
                                        style="position: relative;"src="{{ asset($category->image) }}" alt="">
                                    <p onclick="">New Image</p>
                                    <img class="img" id="newImage" src="#" width="100px" height="100px">
                                </div>
                                <br>
                                <br>
                                <br>
                                <input accept="image/*" type="file" name="newImage" id="imgInp" class="form-control">
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
