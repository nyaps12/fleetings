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
            <form method="post" action="{{ route('submitVehicleReport') }}" enctype="multipart/form-data">
                @csrf <!-- CSRF Protection -->
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p style="color:red;">{{ $error }}</p>
                    @endforeach
                @endif
                <div class="col-sm-2 mb-3">
                    <label for="dateInput" class="form-label">Date</label>
                    <input type="date" class="form-control" id="dateInput" name="date" min="{{ date('Y-m-d') }}"
                        max="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}">
                </div>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label for="vehicleType" class="form-label">Vehicle Type</label>
                        <textarea class="form-control" id="vehicleType" name="vehicle_type" rows="3" placeholder="Enter Vehicle Type"
                            required></textarea>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="vehicleEngineNo" class="form-label">Vehicle Engine No.</label>
                        <textarea class="form-control" id="vehicleEngineNo" name="engine_no" rows="3"
                            placeholder="Enter Vehicle Engine No." required></textarea>
                    </div>


                </div>

                <div class="mb-3 col-md-5">
                    <label for="vehicleCondition" class="form-label">Vehicle Condition</label>
                    <select class="form-select" id="vehicleCondition" name="vehicle_condition" required>
                        <option value="">Select vehicle condition</option>
                        <option value="Bad">Bad</option>
                        <option value="Good">Good</option>
                        <option value="Excellent">Excellent</option>
                    </select>
                </div>
                <div class="mb-3 col-md-5">
                    <label for="odometerInput" class="form-label">Odometer</label>
                    <input type="number" class="form-control" id="odometerInput" name="vehicle_odometer"
                        placeholder="Enter odometer" required>
                </div>
                <div class="mb-3">
                    <label for="vehicleIssues" class="form-label">Vehicle Issues</label>
                    <textarea class="form-control" id="vehicleIssues" name="vehicle_issues" rows="3"
                        placeholder="Enter vehicle issues" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="maintenance_cost" class="form-label">Maintenance Cost (not required)</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="maintenanceCost" name="maintenance_cost"
                            placeholder="Enter maintenance cost">
                        <input type="file" class="form-control" id="maintenanceReceipt" name="maintenance_receipt"
                            accept="image/*">
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


@endsection
