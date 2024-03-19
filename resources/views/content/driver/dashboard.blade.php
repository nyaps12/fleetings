@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('content')

    <!--/ Card Border Shadow -->
    <div class="row">
        <!-- Vehicles overview -->
        <div class="col-xxl-6 mb-4 order-5 order-xxl-0">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between mb-2">
                    <div class="card-title mb-0">
                        <h5 class="m-0 app-brand-text demo text-body fw-bold ms-1">Hello {{ $user->name }}! <span
                                    class="app-brand-text demo text-body fw-bold ms-1">Welcome to {{ config('variables.templateName') }}</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
