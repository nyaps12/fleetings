@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Delivery Schedule')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/sweetalert2/sweetalert2.js'])
@endsection

@section('page-style')


@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h4>Schedule List </h4>
            </div>

            <div class="col-auto">
                <a href="{{ url('/admin/add-schedule') }}" class="btn btn-sm btn-outline-primary"><span class="text-end">Add
                        Schedule</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive card-datatable">
                            <table class="table datatable-invoice border-top">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Schedule ID</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Starting Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            #20210301
                                        </td>
                                        <td>
                                            Bagumbong Caloocan
                                        </td>
                                        <td>
                                            March 31, 2024
                                        </td>
                                        <td>
                                            April 25, 2024
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                        <td>
                                            <a href="#" class="badge bg-primary">assign</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
