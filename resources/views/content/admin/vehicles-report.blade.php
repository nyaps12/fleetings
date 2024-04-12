@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Vehicle Report')

<style>
    #test {
        white-space: nowrap;
    }
</style>
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
                                        <th><strong>ID</strong></th>
                                        <th><strong>Operator</strong></th>
                                        <th><strong>Vehicle Type</strong></th>
                                        <th><strong>Vehicle Engine No.</strong></th>
                                        <th><strong>Vehicle Condition</strong></th>
                                        <th><strong>Vehicle Odometer</strong></th>
                                        <th><strong>Vehicle Issues</strong></th>
                                        <th><strong>Maintenance Cost</strong></th>
                                        <th><strong>Maintenance Receipt</strong></th>
                                        <th><strong>Date</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($reports as $report)
                                        <tr>

                                            <th> {{ $report->id }}</th>
                                            <td id="test">
                                                <img src="{{ $report->profile_photo_path }}" alt="Profile Picture"
                                                    class="rounded-circle" style="width: 25px; height: 25px;">
                                                {{ $report->firstname }} {{ $report->lastname }}
                                            </td>
                                            <td> {{ $report->vehicle_type }}</td>
                                            <td> {{ $report->vehicle_engine_no }} </td>
                                            <td> {{ $report->vehicle_condition }}</td>
                                            <td> {{ $report->vehicle_odometer }} </td>
                                            <td> {{ $report->vehicle_issues }}</td>
                                            <td>
                                                @if ($report->maintenance_cost)
                                                    {{ $report->maintenance_cost }}
                                                @else
                                                    No Maintenance Cost
                                                @endif

                                            </td>
                                            <td>
                                                @if ($report->maintenance_receipt)
                                                    <img src="{{ $report->maintenance_receipt }}" alt="Profile Picture"
                                                        class="rounded-circle" style="width: 25px; height: 25px;">
                                                @else
                                                    No Maintenance Receipt
                                                @endif
                                            </td>

                                            <td id="test"> {{ $report->date }} </a></td>
                                            <td>
                                                <a href="{{ route('vehicle-maintenance') }}"
                                                    class="btn btn-primary badge">Maintenance</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                {{ $reports->links() }}
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="request-mro">
                                <h4 class="bg-danger badge mt-2"> Request Tools</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
