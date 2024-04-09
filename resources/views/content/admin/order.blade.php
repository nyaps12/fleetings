@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Order')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2> Order List</h2>
                <div class="card">
                    <div class="card-header">
                        <div class="row">

                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive card-datatable">
                        <table class="table datatable-invoice border-top">
                            <thead>
                                <tr>
                                    <th><strong> # </strong> </th>
                                    <th><strong> Sender </strong> </th>
                                    <th><strong> Phone # </strong></th>
                                    {{-- <th><strong> Sender Address </strong></th> --}}
                                    <th><strong> Receiver </strong></th>
                                    <th><strong> Phone # </strong></th>
                                    <th><strong> Receiver Address </strong></th>
                                    <th><strong> Product </strong></th>
                                    <th><strong> Price </strong></th>
                                    <th><strong> Qty </strong></th>
                                    <th><strong> Status </strong></th>
                                    <th><strong> Warehouse </strong></th>
                                    <th><strong> Action </strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $orders)
                                    <tr>
                                        <td>{{ $orders->id }}</td>
                                        <td>{{ $orders->sender_name }}</td>
                                        <td>{{ $orders->sender_phone }}</td>
                                        {{-- <td>{{ $orders->sender_address }}</td> --}}
                                        <td>{{ $orders->receiver_name }}</td>
                                        <td>{{ $orders->receiver_phone }}</td>
                                        <td>{{ $orders->receiver_address }}</td>
                                        <td>{{ $orders->product }}</td>
                                        <td> {{ $orders->product_price }}</td>
                                        <td>{{ $orders->product_quantity }}</td>
                                        <td> {{ $orders->status }}</td>
                                        <td>{{ $orders->warehouse }}</td>
                                        <td class="btn btn-sm btn-primary mt-3"> Create Schedule </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $order->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
