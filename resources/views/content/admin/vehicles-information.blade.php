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

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection


@section('content')


    <div class="row">
        <div class="col-sm-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h2> Vehicle Information</h2>
                    <div class="row">
                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="row">
                                    {{-- <div class="col-md-2">
                                        <label for="searchInput">Search</label>
                                        <input type="search" class="form-control" id="searchInput" name="searchInput"
                                            placeholder="Enter search term...">
                                    </div> --}}
                                    <div class="col-md-2">

                                        <select class="form-select" id="filterCategory" name="filterCategory">
                                            <option value="">Select Vehicle Brand</option>
                                            <option value="mercedez-benz">Mercedez-Benz</option>
                                            <option value="ford">Ford </option>
                                            <option value="bmw">BMW</option>
                                            <option value="jeep">Jeep</option>
                                            <option value="lexus">Lexus</option>
                                            <option value="volkswagen">Volkswagen</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">

                                        <select class="form-select" id="filterCategory" name="filterCategory">
                                            <option value="">Select Year Model</option>
                                            <option value="1990-2000">1990-2000</option>
                                            <option value="2001-2010">2001-2010</option>
                                            <option value="2011-2020">2011-2020</option>
                                            <option value="2021-203">2021-2030</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">

                                        <select class="form-select" id="filterCategory" name="filterCategory">
                                            <option value="">Select Vehicle Type</option>
                                            <option value="motorcycle">Motorcycle</option>
                                            <option value="suv">SUV</option>
                                            <option value="truck">Truck</option>
                                            <option value="sedan">Sedan</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">

                                        <select class="form-select" id="filterCategory" name="filterCategory">
                                            <option value="">Select Load Capacity</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">

                                        <select class="form-select" id="filterCategory" name="filterCategory">
                                            <option value="">Select Status</option>
                                            <option value="available"> Available</option>
                                            <option value="unvailable"> Unavailable</option>
                                        </select>
                                    </div>


                                    <div class="col-md-2">

                                        <button class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive card-datatable">
                            <table class="table datatable-invoice border-top">
                                <thead>
                                    <tr>
                                        <th><strong> # </strong> </th>
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
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#view-vehicle">
                                                    View
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-end">
                                {{ $vehicle->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Modal -->
        @include('content.modal.view-vehicle')


    @endsection
