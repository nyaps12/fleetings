@php
    $configData = Helper::appClasses();
@endphp

@section('title', 'Vehicles ')
@extends('layouts/layoutMaster')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endsection


@section('content')
    <div class="container-fluid">



        <div class="row">
            <div class="col-sm-12 col-lg-12 mb-4">
                <h2> Vehicle's Information</h2>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="card-body">
                                <form action="" method="GET">
                                    <div
                                        class="row d-flex align-content-center align-self-center justify-center align-items-center">
                                        {{-- <div class="col-md-2">
                                        <label for="searchInput">Search</label>
                                        <input type="search" class="form-control" id="searchInput" name="searchInput"
                                            placeholder="Enter search term...">
                                    </div> --}}
                                        <div class="col-md-2">

                                            <select class="form-select" name="filter-brand">
                                                <option value="">Select Vehicle Brand</option>
                                                <option value="mercedes-benz"
                                                    {{ request()->get('filter-brand') == 'mercedes-benz' ? 'selected' : '' }}>
                                                    Mercedes-Benz</option>
                                                <option value=" ford"
                                                    {{ request()->get('filter-brand') == 'ford' ? 'selected' : '' }}>Ford
                                                </option>
                                                <option
                                                    value=" bmw"{{ request()->get('filter-brand') == 'bmw' ? 'selected' : '' }}>
                                                    BMW</option>
                                                <option value=" jeep"
                                                    {{ request()->get('filter-brand') == 'jeep' ? 'selected' : '' }}>Jeep
                                                </option>
                                                <option value=" lexus"
                                                    {{ request()->get('filter-brand') == 'lexus' ? 'selected' : '' }}>Lexus
                                                </option>
                                                <option value=" volkswagen"
                                                    {{ request()->get('filter-brand') == 'volkswagen' ? 'selected' : '' }}>
                                                    Volkswagen</option>
                                            </select>
                                        </div>

                                        {{-- <div class=" col-md-2">

                                        <select class=" form-select" name=" filter-model">
                                            <option value=" ">Select Year Model</option>
                                            <option value="1990-2000" {{request()-?get('filter-model') == '1990-2000' ? 'selected' : ''}}>1990-2000</option>
                                            <option value="2001-2010" {{request()-?get('filter-model') == '2001-2010' ? 'selected' : ''}}>2001-2010</option>
                                            <option value="2011-2020" {{request()-?get('filter-model') == '2011-2020' ? 'selected' : ''}}>2011-2020</option>
                                            <option value="2021-2030" {{request()-?get('filter-model') == '2021-2030' ? 'selected' : ''}}>2021-2030</option>
                                        </select>
                                    </div> --}}

                                        <div class=" col-md-2">

                                            <select class=" form-select" name=" filter-type">
                                                <option value=" ">Select
                                                    Vehicle Type</option>
                                                <option
                                                    value="motorcycle"{{ request()->get('filter-type') == 'motorcycle' ? 'selected' : '' }}>
                                                    Motorcycle</option>
                                                <option
                                                    value="suv"{{ request()->get('filter-type') == 'suv' ? 'selected' : '' }}>
                                                    SUV</option>
                                                <option
                                                    value="truck"{{ request()->get('filter-type') == 'truck' ? 'selected' : '' }}>
                                                    Truck</option>
                                                <option
                                                    value="sedan"{{ request()->get('filter-type') == 'sedan' ? 'selected' : '' }}>
                                                    Sedan</option>
                                            </select>
                                        </div>

                                        {{-- <div class="col-md-2">

                                            <select class="form-select" name="filter-capacity">
                                                <option value="">Select Load Capacity</option>
                                            </select>
                                        </div> --}}

                                        <div class="col-md-2">

                                            <select class="form-select" name="filter-status">
                                                <option value="">Select All Status</option>
                                                <option value="available"
                                                    {{ request()->get('filter-status') == 'available' ? 'slected' : '' }}>
                                                    Available</option>
                                                <option value="unavailable"
                                                    {{ request()->get('filter-status') == 'unavailable' ? 'slected' : '' }}>
                                                    Unavailable</option>
                                            </select>
                                        </div>


                                        <div class="col-md-2">
                                            <button class="btn btn-primary btn-md badge">Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive card-datatable">
                                <table class="table datatable-invoice border-top">
                                    <thead>
                                        <tr>
                                            <th><strong> ID </strong> </th>
                                            <th><strong> Vehicle ID </strong> </th>
                                            <th><strong> Vehicle Brand </strong></th>
                                            <th><strong> Year Model </strong></th>
                                            <th><strong> Vehicle Type </strong></th>
                                            <th><strong> Plate Number </strong></th>
                                            <th><strong> Load Capacity </strong></th>
                                            <th><strong> Status </strong></th>
                                            <th><strong> Action </strong></th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($vehicle as $row)
                                            <tr>
                                                <td> {{ $row->id }} </td>
                                                <td> {{ $row->vehicle_id }} </td>
                                                <td> {{ $row->vehicle_brand }} </td>
                                                <td> {{ $row->year_model }} </td>
                                                <td> {{ $row->vehicle_type }} </td>
                                                <td> {{ $row->plate_number }} </td>
                                                <td> {{ $row->load_capacity }} KG </td>
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
                                                    <button type="button" class="btn btn-sm btn-primary view-vehicle-btn"
                                                        data-vehicle-id="{{ $row->id }}">
                                                        View
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end">
                                    <a href="">
                                        <h4 class="bg-danger badge mt-2"> Need vehicle? request now</h4>
                                    </a>
                                </div>

                                <div class="d-flex justify-content-end">
                                    {{ $vehicle->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Modal -->
    @include('content.modal.view-vehicle')
@endsection
