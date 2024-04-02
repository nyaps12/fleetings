@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Incident Report')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12 mb-4">
            <h2> </h2>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="card-body">

                            <div class="table-responsive card-datatable">
                                <table class="table datatable-invoice border-top">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Vehicle Type</th>
                                            <th>Vehicle Engine No.</th>

                                            <th>Incident Location</th>
                                            <th>Incident Description</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th></th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($incidents as $incident)
                                            <tr>
                                                <td>{{ $incident->id }}</td>
                                                <td>{{ $incident->name }}</td>
                                                <td>{{ $incident->phone_number }}</td>
                                                <td>{{ $incident->address }}</td>
                                                <td>{{ $incident->vehicle }}</td>
                                                <td>{{ $incident->vehicle_engine_no }}</td>
                                                <td>{{ $incident->incident_location }}</td>
                                                <td>{{ $incident->incident_description }}</td>
                                                <td>{{ $incident->incident_date }}</td>
                                                <td>{{ $incident->incident_time }}</td>

                                                <td> <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#view">View</button>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('content.modal.view')
@endsection
