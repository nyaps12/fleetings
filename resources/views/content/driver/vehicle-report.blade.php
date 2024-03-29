@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Report')

@section('content')


    <div class="card">
        <div class="card-header">
            <h2 class="">Vehicle Report Form</h2>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('submitReport') }}">
                @csrf <!-- CSRF Protection -->

                <div class="mb-3 col-md-5">
                    <label for="dateInput" class="form-label">Date</label>
                    <input type="date" class="form-control" id="dateInput" name="date">
                </div>

                <div class="mb-3">
                    <label for="maintenanceCost" class="form-label">Maintenance Cost (not required)</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="maintenanceCost" name="maintenanceCost"
                            placeholder="Enter maintenance cost">
                        <input type="file" class="form-control" id="maintenanceReceipt" name="maintenanceReceipt"
                            accept="image/*">
                    </div>
                </div>

                <div class="mb-3 col-md-5">
                    <label for="vehicleCondition" class="form-label">Vehicle Condition</label>
                    <select class="form-select" id="vehicleCondition" name="vehicleCondition" required>
                        <option value="">Select vehicle condition</option>
                        <option value="Bad">Bad</option>
                        <option value="Good">Good</option>
                        <option value="Excellent">Excellent</option>
                    </select>
                </div>
                <div class="mb-3 col-md-5">
                    <label for="odometerInput" class="form-label">Odometer</label>
                    <input type="number" class="form-control" id="odometerInput" placeholder="Enter odometer">
                </div>
                <div class="mb-3">
                    <label for="vehicleIssues" class="form-label">Vehicle Issues</label>
                    <textarea class="form-control" id="vehicleIssues" name="vehicleIssues" rows="3" placeholder="Enter vehicle issues"
                        required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
