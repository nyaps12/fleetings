@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Order')


@section('content')

    
<h2> Order List</h2>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
              <table class="dataTables table">
                <thead>
                  <tr>
                    <th><strong> # </strong> </th>
                    <th><strong> Sender </strong> </th>
                    <th><strong> S.Phone # </strong></th>
                    <th><strong> Receiver </strong></th>
                    <th><strong> R.Phone # </strong></th>
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
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->sender_name }}</td>
                        <td>{{ $order->sender_phone }}</td>
                        <td>{{ $order->receiver_name }}</td>
                        <td>{{ $order->receiver_phone }}</td>
                        <td>{{ $order->receiver_address }}</td>
                        <td>{{ $order->product }}</td>
                        <td>{{ $order->product_price }}</td>
                        <td>{{ $order->product_quantity }}</td>
                        <td><span class="bg-warning badge">{{ $order->status }}</span></td>
                        <td>{{ $order->warehouse }}</td>
                        <td><a class="btn btn-sm btn-primary badge" href="{{ route('add.schedule', $order->id) }}">Schedule</a></td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>

@endsection

