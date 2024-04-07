@php
    $configData = Helper::appClasses();
    // $status = 'unavailable';
@endphp

@extends('layouts.layoutMaster')

@section('title', 'Driver List')

@include('layouts/notification')

@section('content')
<div class="container-fluid">

    @if (session('success'))
    <div id="notification" class="notification show">
        <span class="message">{{ session('success') }}</span>
        <button class="close-btn" onclick="hideNotification()">X</button>
    </div>
    <script>
        // Set the duration (in milliseconds) for the notification to be displayed
        var duration = 5000; // 5 seconds (adjust as needed)

        // Function to hide the notification after the specified duration
        function hideNotification() {
            var notification = document.getElementById('notification');
            notification.style.display = 'none';
        }

        // Hide the notification after the specified duration
        setTimeout(hideNotification, duration);
            </script>
        @endif

    <div class="row">

        <div class="col-sm-12 col-lg-12 mb-4">
            <h2> Driver's Information</h2>
            <div class="card">
                <div class="card-header">
                <div class="row">
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="row d-flex align-content-center align-self-center justify-center align-items-center">
                                <div class="col-md-2">
                                    <input type="search" class="form-control" id="searchInput" name="searchInput"
                                        placeholder="Enter name...">
                                </div>
    
                                <div class="col-md-2">
                                    <select class="form-select" name="filter-status">
                                        <option value="">Select All Status</option>
                                        <option value="active"
                                            {{ request()->get('filter-status') == 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="inactive"
                                            {{ request()->get('filter-status') == 'inactive' ? 'selected' : '' }}>
                                            Not Active
                                        </option>
                                    </select>
                                </div>
    
    
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-md badge">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive card-datatable">
                        <table class="table datatable-invoice border-top">
                            <thead>
                                <tr>
                                    <th scope="col">ID </th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Contact No.</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($drivers as $driver)
                                    <tr>
                                        <th>{{ $driver->id }}</th>
                                        <td colspan="1" class="text-center"><img src="{{ $driver->profile_photo_path }}" alt="driver profile" width="35px" height="35px" class="rounded-circle"></td>
                                        <td>{{ $driver->firstname }} {{ $driver->lastname }}</td>
                                        <td>{{ $driver->phone }}</td>
                                        <td>{{ $driver->address }}</td>
                                        <td>{{ $driver->email }}</td>
                                        <td>
                                            @if ($driver->status === 'active')
                                                <span class="badge bg-success">Active</span>
                                            @elseif ($driver->status === 'inactive')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Unknown</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.assign', ['id' => $driver->id]) }}"
                                                class="btn btn-primary badge {{ $driver->status === 'inactive' ? 'disabled' : '' }}"
                                                id="assignButton">
                                                @if ($driver->status === 'inactive')
                                                    <span class="fas fa-lock" aria-hidden="true"></span>
                                                @endif
                                                &nbsp;Assign
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end">
                            {{ $drivers->links() }}
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

</div>
@endsection
