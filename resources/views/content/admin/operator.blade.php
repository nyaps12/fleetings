@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Operator')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive card-datatable">
                            <table class="table datatable-invoice border-top">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Vehicle ID</th>
                                        <th scope="col">Vehicle Brand</th>
                                        <th scope="col">Plate Number</th>
                                        <th scope="col">Vehicle Type</th>
                                        <th scope="col">Contact No.</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($driver as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->firstname }} {{ $row->lastname }}</td>
                                            <td>{{ $row->vehicle_id }}</td>
                                            <td>{{ $row->vehicle_brand }}</td>
                                            <td>{{ $row->plate_number }}</td>
                                            <td>{{ $row->vehicle_type }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>
                                                @if ($row->status === 'active')
                                                    <span class="badge bg-success">Active</span>
                                                @elseif ($row->status === 'inactive')
                                                    <span class="badge bg-danger">Not Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Unknown</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.assigncancel', ['id' => $row->id]) }}" class="btn btn-warning badge">Cancel</a>                                        
                                            </td>                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-end">
                                {{ $drivers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
