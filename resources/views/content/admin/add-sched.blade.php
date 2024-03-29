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

    <style>
        #map {
            height: 433px;
            width: auto;
            overflow: hidden;
            position: relative;
            margin-right: 10px;
            padding-right: 15px;
            padding-left: 15px;
            margin-bottom: 10px;
        }

        .tooltip {
            display: inline;
            position: relative;
        }

        .tooltip:hover:after {
            background: #333;
            background: rgba(0, 0, 0, .8);
            border-radius: 5px;
            bottom: 26px;
            color: #fff;
            content: attr(title);
            left: 20%;
            padding: 5px 15px;
            position: absolute;
            z-index: 98;
            width: 220px;
        }

        .tooltip:hover:before {
            border: solid;
            border-color: #333 transparent;
            border-width: 6px 6px 0 6px;
            bottom: 20px;
            content: "";
            left: 50%;
            position: absolute;
            z-index: 99;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h4>Create Schedule</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Create Schedule</div>
                    <div class="card-body">
                        <form id="routeForm" action="{{ route('save.schedule') }}" method="POST" class="browser-default-validation">
                            @csrf
                            <div id="placeInfo">

                                <div class="searchInput mb-3">
                                    <label for="loc1">Start:</label>
                                    <input type="text" name="loc1" class="form-control"
                                        placeholder="Set start location" id="loc1" required>
                                </div>

                                <div class="searchInput mb-3">
                                    <label for="loc2">Waypoints: (Required)</label>
                                    <input type="text" name="loc2" class="form-control"
                                        placeholder="Enter some waypoints" id="loc2">
                                    <div>
                                        <ul id="waypointsInfo" class="list-group list-group-timeline"></ul>
                                    </div>
                                </div>

                                <div class="searchInput mb-3">
                                    <label for="loc3">End:</label>
                                    <input type="text" name="loc3" class="form-control"
                                        placeholder="Set end location" id="loc3" required>
                                </div>

                                <div class="searchInput mb-3">
                                    <label for="shipment-date">Shipment Date:</label>
                                    <input type="date" name="shipment-date" class="form-control" id="shipment-date"
                                        required required>
                                </div>

                            </div>
                            <!-- Submit Button -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-2" id="saveRouteButton">
                                    <span class="tf-icons ti-xs ti ti-device-floppy me-1"></span>Save Schedule
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Schedule List</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Shipments Date</th>
                                        <th>Start</th>
                                        <th>Waypoints</th>
                                        <th>End</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedules as $schedule)
                                    <tr>
                                        <th>{{ $schedule->id }}</th>
                                        <td>{{ $schedule->shipping_date }}</td>
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
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <a href="{{ url('/all-sched') }}">Show all schedule</a>
                        </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
