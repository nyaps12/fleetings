@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Order')

@section('content')

        <h2> Order List</h2>

                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th><strong> # </strong> </th>
                                <th><strong> Sender </strong> </th>
                                <th><strong> Phone # </strong></th>
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
                                    <td><span class="badge">{{ $orders->id }}</span></td>
                                    <td><span class="badge">{{ $orders->sender_name }}</span></td>
                                    <td><span class="badge">{{ $orders->sender_phone }}</span></td>
                                    <td><span class="badge">{{ $orders->receiver_name }}</span></td>
                                    <td><span class="badge">{{ $orders->receiver_phone }}</span></td>
                                    <td><span class="badge">{{ $orders->receiver_address }}</span></td>
                                    <td><span class="badge">{{ $orders->product }}</span></td>
                                    <td><span class="badge">{{ $orders->product_price }}</span></td>
                                    <td><span class="badge">{{ $orders->product_quantity }}</span></td>
                                    <td><span class="bg-warning badge">{{ $orders->status }}</span></td>
                                    <td><span class="badge">{{ $orders->warehouse }}</span></td>
                                    <td><span class="btn btn-sm btn-primary badge">Schedule</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
   
        </div>

@endsection
