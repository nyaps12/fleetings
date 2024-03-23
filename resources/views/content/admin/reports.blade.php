@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Reports ')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Daily Reports</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <a href="{{ url('/admin/driver-reports') }}">
                                <img src="{{ asset('assets/img/avatars/jp.jpg') }}" class="card-img-top" style="height: 400px"
                                    alt="Placeholder Image">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Name:</h5>
                                <p class="card-text">License Number:</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <a href="{{ url('/admin/driver-reports') }}">
                                <img src="{{ asset('assets/img/avatars/jp.jpg') }}" class="card-img-top"
                                    style="height: 400px" alt="Placeholder Image">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Name:</h5>
                                <p class="card-text">License Number:</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <a href="{{ url('/admin/driver-reports') }}">
                                <img src="{{ asset('assets/img/avatars/jonel.jpg') }}" class="card-img-top"
                                    style="height: 400px" alt="Placeholder Image">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Name:</h5>
                                <p class="card-text">License Number:</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <a href="{{ url('/admin/driver-reports') }}">
                                <img src="{{ asset('assets/img/avatars/driver.jpg') }}" class="card-img-top"
                                    style="height: 400px" alt="Placeholder Image">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Name:</h5>
                                <p class="card-text">License Number:</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
