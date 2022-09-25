@extends('layouts.admin')
@section('title')
    Reviews
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Review</th>
                        <th scope="col">User</th>
                        <th scope="col">Stars</th>
                        <th scope="col">Product</th>
                        <th scope="col">Product Category</th>
                        <th scope="col">Added at</th>
                        @if (request()->session()->has('guro'))
                            <th scope="col">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $index => $review)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $review->content }}</td>
                            <td>{{ $review->User->name }}</td>
                            <td>{{ $review->stars }}</td>
                            <td><a
                                    href="{{ url('/mario/show-product', [$review->Product->product_id]) }}">{{ $review->Product->name }}</a>
                            </td>
                            <td>{{ $review->Product->Category->category_name }}</td>
                            <td>{{ $review->created_at }}</td>
                            <td>
                                @if (request()->session()->has('guro'))
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ url('/mario/delete-review', [$review->review_id]) }}">
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
