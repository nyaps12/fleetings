@php
    $configData = Helper::appClasses();

@endphp

@section('title', 'Vehicles ')
@extends('layouts/layoutMaster')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection


@section('content')


    <div class="row">
        <div class="col-sm-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h2> Service Report</h2>
                    <div class="row">
                        <div class="card-body">

                        </div>
                        <div class="table-responsive card-datatable">
                            <table class="table datatable-invoice border-top">
                                <thead>
                                    <tr>
                                        <th><strong> # </strong> </th>
                                        <th><strong> Operator </strong> </th>
                                        <th><strong> Vehicle Type </strong></th>
                                        <th><strong> Vehicle Engine No. </strong></th>
                                        <th><strong> Vehicle Issue </strong></th>
                                        <th><strong> Status </strong></th>
                                        <th><strong> Date Issued </strong></th>
                                        <th><strong> Odometer </strong></th>
                                        <th><strong> Start Date </strong></th>
                                        <th><strong> Completion Date </strong></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($service as $maintenance)
                                        <tr>
                                            <td> {{ $maintenance->report_id }} </td>
                                            <td> </td>
                                            <td> {{ $maintenance->vehicle_type }} </td>
                                            <td> {{ $maintenance->engine_no }} </td>
                                            <td> {{ $maintenance->issues }} </td>
                                            <td> {{ $maintenance->status }} </td>
                                            <td> {{ $maintenance->date_issue }} </td>
                                            <td> {{ $maintenance->vehicle_odometer }} </td>
                                            <td> {{ $maintenance->start_date }} </td>
                                            <td> {{ $maintenance->completion_date }} </td>
                                        </tr>
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
