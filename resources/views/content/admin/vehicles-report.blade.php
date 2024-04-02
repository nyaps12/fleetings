@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Vehicle Report')

@section('content')

    <div class="row">
        <div class="col-sm-12 col-lg-12 mb-4">
            <h2> Vehicle Report</h2>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="card-body">

                        </div>
                        <div class="table-responsive card-datatable">
                            <table class="table datatable-invoice border-top">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Operator</th>
                                        <th>Vehicle Type</th>
                                        <th>Vehicle Engine No.</th>
                                        <th>Vehicle Condition</th>
                                        <th>Vehicle Odometer</th>
                                        <th>Vehicle Issues</th>
                                        <th>Maintenance Cost</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($reports as $report)
                                        <tr>

                                            <th> {{ $report->id }}</th>
                                            <td>
                                                <img src="{{ $report->profile_photo_path }}" alt="Profile Picture"
                                                    class="rounded-circle" style="width: 25px; height: 25px;">
                                                {{ $report->firstname }} {{ $report->lastname }}
                                            </td>
                                            <td> {{ $report->vehicle_type }}</td>
                                            <td> {{ $report->vehicle_engine_no }} </td>
                                            <td> {{ $report->vehicle_condition }}</td>
                                            <td> {{ $report->vehicle_odometer }} </td>
                                            <td> {{ $report->vehicle_issues }}</td>
                                            <td> {{ $report->maintenance_cost }}</td>
                                            <td> {{ $report->date }} </a></td>
                                            <td>
                                                <a href="{{ route('vehicle-maintenance') }}"
                                                    class="btn btn-primary">Maintenance</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                {{ $reports->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
