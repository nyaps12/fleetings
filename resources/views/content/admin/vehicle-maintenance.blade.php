@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Vehicle Maintenance')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h2>Vehicle Maintenance Schedule</h2>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <a href="{{ route('vehicles-report') }}" class="btn btn-label-dark me-3"> Cancel </a>
                        <button class="btn btn-primary me-4"> Save Work Order </button>
                    </div>
                </div>
                <br>
                <div class="card">
                    <form>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="vehicle" class="form-label">Vehicle</label>
                                <input type="text" class="form-control" id="vehicle" name="vehicle">
                            </div>
                            <div class="mb-3">
                                <label for="issueDescription" class="form-label">Issue Description</label>
                                <textarea class="form-control" id="issueDescription" name="issueDescription" rows="3"></textarea>
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
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="issueDate" class="form-label">Issue Date</label>
                                    <input type="date" class="form-control" id="issueDate" name="issueDate">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="startDate" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="startDate" name="startDate">
                                </div>
                            </div>
                            <div class="mb-3 col-md-5">
                                <label for="startOdometer" class="form-label">Start Odometer</label>
                                <input type="number" class="form-control" id="startOdometer" name="startOdometer">
                            </div>
                            <div class="mb-3 col-md-5">
                                <label for="completionDate" class="form-label">Completion Date</label>
                                <input type="date" class="form-control" id="completionDate" name="completionDate">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
