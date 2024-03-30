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

                                        <th><strong> Operator</strong></th>
                                        <th><strong> Vehicle Type </strong></th>
                                        <th><strong> Vehicle Engine No. </strong></th>
                                        <th><strong> Vehicle Condition </strong></th>
                                        <th><strong> Vehicle Odometer </strong></th>
                                        <th><strong> Vehicle Issues </strong></th>
                                        <th><strong> Maintenance Cost </strong> </th>
                                        <th><strong> Receipt </strong> </th>
                                        <th><strong> Date </strong> </th>
                                        <th><strong> Action </strong></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($reports as $report)
                                        <tr>

                                            <td></td>
                                            <td> {{ $report->vehicle_type }}</td>
                                            <td> {{ $report->vehicle_engine_no }} </td>
                                            <td> {{ $report->vehicle_condition }}</td>
                                            <td> {{ $report->vehicle_odometer }} </td>
                                            <td> {{ $report->vehicle_issues }}</td>
                                            <td> {{ $report->maintenance_cost }}</td>
                                            <td> </td>
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
