@extends('layouts.admin')
@section('title')
    Profits
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Profits</h3>
                </div>

                <form action="{{ url('/mario/profits/search', []) }}" method="GET">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <input type="search" class="form-control text-center" placeholder="Search Profits..." name="key">
                    </div>
                </form>

                <table class="table table-hover">
                    <thead class="text-center">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Phone</th>
                            <th scope="col" class="text-left">Order ID</th>
                            <th scope="col" class="text-left">Product ID</th>
                            <th scope="col" class="text-left">Profit Income</th>
                            <th scope="col">Added At</th>
                            @if (request()->session()->has('super_admin') ||
                                request()->session()->has('guro'))
                                {{-- <th scope="col">Actions</th> --}}
                            @endif
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($profits as $index => $profit)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $profit->Order->User->name }}</td>
                                <td>0{{ $profit->Order->User->phone_number }}</td>
                                <td class="text-left">#{{ $profit->Order->order_id }}</td>
                                <td class="text-left">#{{ $profit->Order->Cart->Product->product_id }}</td>
                                <td class="text-left text-success">${{ $profit->total }}</td>
                                <td>{{ $profit->created_at }}</td>
                                {{-- <td>
                                    @if (request()->session()->has('guro'))
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ url('/mario/delete-profit', [$profit->profit_id]) }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endif
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
