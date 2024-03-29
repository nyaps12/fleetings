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
                                        <th><strong> Vehicle ID </strong></th>
                                        <th><strong> Vehicle Name </strong></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <td> <a href="maintenance-overview"> 1 </a></td>
                                    <td> Raffy Limbo </td>
                                    <td>1</td>
                                    <td> Truck </td>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
