@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Vehicle Report')

@section('content')

    <div class="container">
        <div class="card-header">
            <h4>Daily Reports</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <a href="{{ url('/driver/vehicle-report') }}">
                            <img src="{{ asset('assets/img/vehicle/veh-report.jpg') }}" class="card-img-top"
                                style="height: 400px" alt="Placeholder Image">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Vehicle Report</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <a href="{{ url('/driver/fuel-report') }}">
                            <img src="{{ asset('assets/img/vehicle/fuel.jpg') }}" class="card-img-top" style="height: 400px"
                                alt="Placeholder Image">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-center">Fuel Report</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <a href="{{ url('/driver/incident') }}">
                            <img src="{{ asset('assets/img/vehicle/incident.jpg') }}" class="card-img-top"
                                style="height: 400px" alt="Placeholder Image">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-center">Incident Report</h5>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
