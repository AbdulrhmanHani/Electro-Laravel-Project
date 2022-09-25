@extends('layouts.admin')
@section('title')
    Show Order | User {{ $order->id }}
@endsection
@section('main')
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Show Order : {{ $order->id }}</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="2" class="text-center">Customer</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>{{ $order->User->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>{{ $order->User->email }}</td>
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
                                    <th scope="row">Time</th>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td>{{ $order->order_status }}</td>
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
                                    <td>${{ $order->Cart->total }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Total</th>
                                    <th>Change Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>${{ $order->Cart->total }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ url('/mario/approve-order', [$order->order_id]) }}">Approve</a>
                                        <a class="btn btn-danger" href="{{ url('/mario/cancel-order', [$order->order_id]) }}">Cancel</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <a class="btn btn-dark" href="{{ url('/mario/orders', []) }}">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
