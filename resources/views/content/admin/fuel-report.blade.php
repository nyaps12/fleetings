@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Fuel Report')

@section('content')

    <div class="row">
        <div class="col-sm-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h2> Fuel Report</h2>
                    <div class="row">
                        <div class="card-body">

                        </div>
                        <div class="table-responsive card-datatable">
                            <table class="table datatable-invoice border-top">
                                <thead>
                                    <tr>
                                        <th><strong> Date </strong> </th>
                                        <th><strong> Price Per Liter </strong> </th>
                                        <th><strong> Liters </strong></th>
                                        <th><strong> Total Cost </strong></th>
                                        <th><strong> Odometer </strong></th>
                                        <th><strong> Fuel Type </strong></th>
                                        <th><strong> Fuel Brand </strong></th>
                                        <th><strong> Receipt </strong></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
