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
                                    @foreach ($schedules as $schedule)
                                    <tr>
                                        <th>{{ $schedule->id }}</th>
                                        <td>{{ $schedule->schedule_id }}</td>
                                        <td>{{ $schedule->start_point }}</td>
                                        <td>{{ $schedule->waypoints }}</td>
                                        <td>{{ $schedule->end_point }}</td>
                                        <td>
                                            @if($schedule->status == 'pending')
                                                <span class="badge bg-warning">{{ $schedule->status }}</span>
                                            @elseif($schedule->status == 'in_transit')
                                                <span class="badge bg-info">Transit</span>
                                            @elseif($schedule->status == 'delivered')
                                                <span class="badge bg-success">{{ $schedule->status }}</span>
                                            @elseif($schedule->status == 'cancelled')
                                                <span class="badge bg-danger">{{ $schedule->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm bg-primary badge">Assign</a>
                                        </td>
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
