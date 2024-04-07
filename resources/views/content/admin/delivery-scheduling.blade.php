@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Delivery Schedule')

@include('layouts/notification')

{{-- @section('vendor-style')
    @vite(['resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/sweetalert2/sweetalert2.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@endsection

@section('page-style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection --}}

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4>Schedule's List </h4>
            </div>

            <div class="col-auto">
                <a href="{{ url('/admin/add-schedule') }}" class="btn btn-sm btn-outline-primary"><span class="text-end">Add
                        Schedule</span></a>
            </div>

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
                                        <th scope="col">Operator</th>
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
                                                @if ($schedule->status == 'pending')
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
                                                @if ($schedule->user_id)
                                                    <img src="{{ asset('path/to/your/image.jpg') }}" alt="No Operator Image"
                                                        class="h-auto rounded-circle">
                                                @else
                                                    No operator found
                                                @endif

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary badge" data-bs-toggle="modal"
                                                    data-bs-target="#addNewCCModal"> Assign </button>
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


<!-- Add Schedule Modal -->
<div class="modal fade" id="addNewCCModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Assign Operator</h3>
                    <p class="text-muted">Please assign operator</p>
                </div>
                <form id="addNewCCForm" class="row g-3">
                    <div class="col-12">
                        <label class="col-sm-3 col-form-label" for="multicol-language">Operator</label>
                        <div class="col-sm-9">
                            <select id="operator" class="select2 form-select">
                                @if ($operators->isNotEmpty())
                                    @foreach ($operators as $operator)
                                        <option value="{{ $operator->id }}">{{ $operator->vehicle_type }} -
                                            {{ $operator->firstname }} {{ $operator->lastname }}</option>
                                    @endforeach
                                @else
                                    <option selected>No operator found</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary btn-md me-sm-3 me-1 badge">Submit</button>
                        <button type="reset" class="btn btn-label-secondary btn-md btn-reset badge"
                            data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--/ Add Schedule Card Modal -->

<script>
    $(document).ready(function() {
        $('#operator').select2();
    });
</script>
