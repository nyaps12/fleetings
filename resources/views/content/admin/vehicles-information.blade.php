@php
    $configData = Helper::appClasses();
    // $status = 'unavailable';
@endphp

@section('title', 'Vehicles ')
@extends('layouts/layoutMaster')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection


@section('content')
    <div class="row">


        <div class="col-sm-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive card-datatable">
                        <table class="table datatable-invoice border-top">
                            <thead>
                                <tr>
                                    <th scope="col"># </th>
                                    <th scope="col">Vehicle ID </th>
                                    <th scope="col">Vehicle Brand</th>
                                    <th scope="col">Year Model</th>
                                    <th scope="col">Vehicle Type</th>
                                    <th scope="col">Plate Number</th>
                                    <th scope="col">Load Capacity</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $row)
                                    <tr>
                                        <td> {{ $row->id }} </td>
                                        <td> {{ $row->vehicle_id }} </td>
                                        <td> {{ $row->vehicle_brand }} </td>
                                        <td> {{ $row->year_model }} </td>
                                        <td> {{ $row->vehicle_type }} </td>
                                        <td> {{ $row->plate_number }} </td>
                                        <td> {{ $row->load_capacity }} </td>
                                        <td>
                                            @if ($row->status === 'available')
                                                <span class="badge bg-success">
                                                    Available
                                                </span>
                                            @elseif ($row->status === 'unavailable')
                                                <span class="badge bg-danger">
                                                    Unavailable
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    Unknown
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#view-vehicle">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Modal -->
    @include('content.modal.view-vehicle')

@endsection
