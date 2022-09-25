@extends('layouts.admin')
@section('title')
    All Orders
@endsection
@section('main')
    <div class="container-fluid py-5 text-center">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Orders</h3>
                    @if (request()->session()->has('guro'))
                        <a href="{{ url('/mario/delete-all-canceled', []) }}"><button class="btn btn-danger">Delete All
                                Canceled</button></a>
                    @endif
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Product</th>
                            <th scope="col">Total</th>
                            <th scope="col">Address</th>
                            <th scope="col">Time</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $i => $order)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $order->User->name }}</td>
                                <td>0{{ $order->User->phone_number }}</td>
                                <td>{{ $order->Cart->Product->name }}</td>
                                <td>${{ $order->total }}</td>
                                <td>{{ $order->User->address }}</td>
                                <td>{{ $order->created_at }}</td>
                                @if ($order->order_status == 'canceled')
                                    <td style="color: red">{{ $order->order_status }}</td>
                                @elseif ($order->order_status == 'approved')
                                    <td style="color: green">{{ $order->order_status }}</td>
                                @else
                                    <td>{{ $order->order_status }}</td>
                                @endif
                                @if ($order->order_status == 'pending')
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ url('/mario/order', [$order->order_id]) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                @endif
                                @if (request()->session()->has('guro') and
                                    $order->order_status == 'canceled')
                                    <td>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ url('/mario/delete-order', [$order->order_id]) }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
