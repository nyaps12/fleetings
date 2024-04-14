@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Vehicle Maintenance')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('schedMaintenance') }}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col">
                            <h2>Vehicle Maintenance Schedule</h2>
                        </div>

                        <div class="col-md-3 d-flex justify-content-end">
                            <a href="{{ route('vehicles-report') }}" class="btn btn-dark me-3"> Cancel </a>
                            <button type="submit" class="btn btn-primary me-4"> Save Work Order </button>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-center align-self-center d-flex align-items-center">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="issueDate" class="form-label">Issue Date</label>
                                <input type="date" class="form-control" id="issueDate" name="date_issue" required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-2 mb-3">
                                @error('vehicle_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <label for="vehicleType" class="form-label">Vehicle Type</label>
                                <input type="text" class="form-control" id="vehicleType" name="vehicle_type" required
                                    value="{{ $drivers->isNotEmpty() ? $drivers->first()->vehicle_type ?? 'No Vehicle Brand found' : 'No Vehicle Brand found' }}">
                            </div>
                            <div class="col-sm-2 mb-3">
                                <label for="vehicleEngineNo" class="form-label">Vehicle Engine No.</label>
                                <input type="text" class="form-control" id="vehicleEngineNo" name="engine_no" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="issueDescription" class="form-label">Vehicle Issue</label>
                            <textarea class="form-control" id="issueDescription" name="issues" rows="3" required></textarea>
                        </div>
                        <div class="mb-3 col-md-5">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="pending">Pending</option>
                                <option value="inProgress">In Progress</option>
                                <option value="completed">Waiting for parts</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>



                        <div class="mb-3 col-md-5">
                            <label for="startOdometer" class="form-label">Vehicle Odometer</label>
                            <input type="number" class="form-control" id="startOdometer" name="vehicle_odometer" required>
                        </div>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="startDate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="startDate" name="start_date" required>
                            </div>
                            <div class="mb-3 col-md-5">
                                <label for="completionDate" class="form-label">Completion Date</label>
                                <input type="date" class="form-control" id="completionDate" name="completion_date"
                                    required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
