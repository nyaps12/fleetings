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

                                        <th><strong> Operator </strong> </th>
                                        <th><strong> Price Per Liter </strong> </th>
                                        <th><strong> Liters </strong></th>
                                        <th><strong> Total Cost </strong></th>
                                        <th><strong> Odometer </strong></th>
                                        <th><strong> Fuel Type </strong></th>
                                        <th><strong> Fuel Brand </strong></th>
                                        <th><strong> Date </strong> </th>
                                        <th><strong> Receipt </strong></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($fuelreport as $fuel)
                                        <tr>

                                            <td></td>
                                            <td>{{ $fuel->price_per_liter }} </td>
                                            <td>{{ $fuel->liters }} </td>
                                            <td>{{ $fuel->total_cost }} </td>
                                            <td>{{ $fuel->vehicle_odometer }} </td>
                                            <td>{{ $fuel->fuel_type }} </td>
                                            <td>{{ $fuel->fuel_brand }} </td>
                                            <td>{{ $fuel->date }} </td>
                                            <td> <button class="btn btn-sm btn-primary"> View
                                                </button>{{ $fuel->fuel_receipt }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <div class="d-flex justify-content-end">
                                    {{ $fuelreport->links() }}
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
