@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('content')
    <ul class="nav nav-tabs" id="driverPerformanceTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button"
                role="tab" aria-controls="completed" aria-selected="true">Completed</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled" type="button"
                role="tab" aria-controls="cancelled" aria-selected="false">Cancelled</button>
        </li>
    </ul>

    <!-- Tab content -->
    <div class="tab-content" id="driverPerformanceTabContent">
        <div class="tab-pane fade show active" id="completed" role="tabpanel" aria-labelledby="completed-tab">
            <!-- Content for Completed tab -->
            <h3>Completed Items</h3>
            <p>List of completed items goes here...</p>
        </div>
        <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
            <!-- Content for Cancelled tab -->
            <h3>Cancelled Items</h3>
            <p>List of cancelled items goes here...</p>
        </div>
    </div>

@endsection
