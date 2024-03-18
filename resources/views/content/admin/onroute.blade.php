@php
    $configData = Helper::appClasses();
    // $status = 'unavailable';
@endphp

@extends('layouts.layoutMaster')
@section('title', 'Driver List')

@section('content')
    <div class="row">


        <div class="col-sm-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive card-datatable">
                        <table class="table datatable-invoice border-top">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tracking ID</th>
                                    <th scope="col">Driver</th>
                                    <th scope="col">Vehicle Type</th>
                                    <th scope="col">START</th>
                                    <th scope="col">WAYPOINT</th>
                                    <th scope="col">END</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
