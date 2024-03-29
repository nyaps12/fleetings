@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Reports ')

@section('content')
    <h1 class="text-start">Report</h1>
    <div class="container">
        <div class="card" style="height: auto;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <h6>Vehicles</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <img src="{{ asset('assets/img/vehicle/Truck.jpg') }}" alt=""
                                            class="img-fluid" style="max-width: 90px;">
                                    </div>
                                    <div class="col-md-8">
                                        <h6>Vehicle's Report</h6>
                                        <p class="text-muted">List of all basic vehicle reports</p>
                                        <a href="vehicles-report">See Report <b>&rarr;</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <h6> s</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <img src="{{ asset('assets/img/vehicle/Truck.jpg') }}" alt=""
                                            class="img-fluid" style="max-width: 90px;">
                                    </div>
                                    <div class="col-md-8">
                                        <h6>Vehicle List</h6>
                                        <p class="text-muted">List of all basic vehicle information</p>
                                        <a href="#">See Report <b>&rarr;</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <h6>Service</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <img src="{{ asset('assets/img/vehicle/Truck.jpg') }}" alt=""
                                            class="img-fluid" style="max-width: 90px;">
                                    </div>
                                    <div class="col-md-8">
                                        <h6>Vehicle List</h6>
                                        <p class="text-muted">List of all basic vehicle information</p>
                                        <a href="#">See Report <b>&rarr;</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-4">
                        <h6> Fuel </h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">

                                        <img src="{{ asset('assets/img/vehicle/fuel-icon.jpg') }}" alt=""
                                            class="img-fluid" style="max-width: 90px;">
                                    </div>
                                    <div class="col-md-8">
                                        <h6>Fuel Report</h6>
                                        <p class="text-muted">Listing of all fuel reports</p>
                                        <a href="fuel-report">See Report <b>&rarr;</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <h6>Service</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <img src="{{ asset('assets/img/vehicle/Service.jpg') }}" alt=""
                                            class="img-fluid" style="max-width: 90px;">
                                    </div>
                                    <div class="col-md-8">
                                        <h6>Service Summary </h6>
                                        <p class="text-muted">Listing of all service information</p>
                                        <a href="service">See Report <b>&rarr;</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <h6>Service</h6>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <img src="{{ asset('assets/img/vehicle/Truck.jpg') }}" alt=""
                                            class="img-fluid" style="max-width: 90px;">
                                    </div>
                                    <div class="col-md-8">
                                        <h6>Vehicle List</h6>
                                        <p class="text-muted">List of all basic vehicle information</p>
                                        <a href="#">See Report <b>&rarr;</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <img src="{{ asset('assets/img/vehicle/Truck.jpg') }}" alt=""
                                            class="img-fluid" style="max-width: 90px;">
                                    </div>
                                    <div class="col-md-8">
                                        <h6>Vehicle List</h6>
                                        <p class="text-muted">List of all basic vehicle information</p>
                                        <a href="#">See Report <b>&rarr;</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <img src="{{ asset('assets/img/vehicle/Truck.jpg') }}" alt=""
                                            class="img-fluid" style="max-width: 90px;">
                                    </div>
                                    <div class="col-md-8">
                                        <h6>Vehicle List</h6>
                                        <p class="text-muted">List of all basic vehicle information</p>
                                        <a href="#">See Report <b>&rarr;</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <img src="{{ asset('assets/img/vehicle/Truck.jpg') }}" alt=""
                                            class="img-fluid" style="max-width: 90px;">
                                    </div>
                                    <div class="col-md-8">
                                        <h6>Vehicle List</h6>
                                        <p class="text-muted">List of all basic vehicle information</p>
                                        <a href="#">See Report <b>&rarr;</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
