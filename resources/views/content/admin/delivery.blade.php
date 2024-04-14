@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Delivery')


@section('content')

    
<h2> Delivery List</h2>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
              <table class="dataTables table">
                <thead class="text-center">
                  <tr>
                    <th><strong> # </strong> </th>
                    <th><strong> Tracking ID </strong></th>
                    <th><strong> Name </strong> </th>
                    <th><strong> Phone </strong></th>
                    <th><strong> Address </strong></th>
                    <th><strong> Product </strong></th>
                    <th><strong> Qty </strong></th>
                    <th><strong> Price </strong></th>
                    <th><strong> Date Received </strong></th>
                    <th><strong> Date Shipped </strong></th>
                    <th><strong> Status </strong></th>
                    <th><strong> Action </strong></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($delivery as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->tracking_no }}</td>
                        <td>{{ $data->contact_person }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->shipping_address }}</td>
                        <td>{{ $data->product }}</td>
                        <td>{{ $data->product_quantity }}</td>
                        <td>{{ $data->product_price }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->date_received)->format('M j, Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->date_shipped)->format('M j, Y') }}</td>                                                                                        
                        <td>
                          @if ($data->status === 'Pending')
                              <span class="bg-secondary badge">Pending</span>
                          @elseif ($data->status === 'Payment')
                              <span class="bg-primary badge">Payment</span>
                          @elseif ($data->status === 'Procured')
                              <span class="bg-success badge">Procured</span>
                          @elseif ($data->status === 'Requested')
                              <span class="bg-warning badge">Requested</span>
                          @elseif ($data->status === 'Completed')
                              <span class="bg-success badge">Completed</span>
                          @else
                              <span class="bg-secondary badge">{{ $data->status }}</span>
                          @endif
                      </td>                      
                        <td><a class="btn btn-sm btn-primary badge" href="{{ route('add.schedule', $data->id) }}">Schedule</a></td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>

@endsection

