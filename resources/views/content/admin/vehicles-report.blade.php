@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Vehicle Report')

@section('content')

    <div class="row">
        <div class="col-sm-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h2> Vehicle Report</h2>
                    <div class="row">
                        <div class="card-body">

                        </div>
                        <div class="table-responsive card-datatable">
                            <table class="table datatable-invoice border-top">
                                <thead>
                                    <tr>
                                        <th><strong> Date </strong> </th>
                                        <th><strong> Maintenance Cost </strong> </th>
                                        <th><strong> Maintenance Receipt </strong> </th>
                                        <th><strong> Vehicle Condition </strong></th>
                                        <th><strong> Vehicle Odometer </strong></th>
                                        <th><strong> Vehicle Issues </strong></th>
                                        <th><strong> Action </strong></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($reports as $report)
                                        <td> {{ $report->date }} </a></td>
                                        <td> {{ $report->maintenance_cost }}</td>
                                        <td> </td>
                                        <td> {{ $report->vehicle_condition }}</td>
                                        <td> {{ $report->vehicle_odometer }} </td>
                                        <td> {{ $report->vehicle_issues }}</td>
                                        <td>
                                            <a href="{{ route('vehicle-maintenance') }}"
                                                class="btn btn-primary">Maintenance</a>
                                        </td>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
