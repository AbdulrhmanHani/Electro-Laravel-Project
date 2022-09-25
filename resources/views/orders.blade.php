@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('title')
    My Orders
@endsection
@section('main')
    <div class="container py-5">
        <div class="row">
            @foreach ($orders as $i => $order)
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body p-5">
                            <table class="table table-bordered">
                                <thead>
                                    <th colspan="2" class="text-center">Order : {{ $i + 1 }}</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Name</th>
                                        <td>{{ $order->User->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone</th>
                                        <td>0{{ $order->User->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>{{ $order->User->address }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Submited At</th>
                                        <td>{{ $order->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $order->Cart->Product->name }}</td>
                                        <td>{{ $order->Cart->qty }}</td>
                                        <td>${{ $order->Cart->Product->price_after_sale }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered container w-auto">
                                <thead>
                                    <tr>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>${{ $order->Cart->total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="container" style="position: relative;margin-bottom: 30px">
                <a class="primary-btn cta-btn" style="position: absolute;right:0" href="{{ url('/') }}">Back</a>
            </div>
        </div>
    </div>
@endsection
