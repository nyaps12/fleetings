@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Report')

@section('content')

    <!--/ Card Border Shadow -->
    <div class="row">
        <!-- Vehicles overview -->
        <div class="col-xxl-6 mb-4 order-5 order-xxl-0">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between mb-2">
                    <div class="card-title mb-0">
                        <h5 class="m-0"></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
