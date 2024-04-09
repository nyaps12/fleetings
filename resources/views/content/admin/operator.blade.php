@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Operator')

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
            <div class="col-md-12">
                <h2> Operator's List</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive card-datatable">
                            <table class="table datatable-invoice border-top">
                                <thead class="text-center">
                                    <tr>
                                        <th><strong>ID</strong></th>
                                        <th><strong>Picture</strong></th>
                                        <th><strong>Name</strong></th>
                                        <th><strong>Vehicle ID</strong></th>
                                        <th><strong>Vehicle Brand</strong></th>
                                        <th><strong>Plate Number</strong></th>
                                        <th><strong>Vehicle Type</strong></th>
                                        <th><strong>Contact No.</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($driver as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td><img src="{{ $row->profile_photo_path}}" alt="" class="rounded-circle" width="35px" height="35px"></td>
                                            <td>{{ $row->firstname }} {{ $row->lastname }}</td>
                                            <td>{{ $row->vehicles_id }}</td>
                                            <td>{{ $row->vehicle_brand }}</td>
                                            <td>{{ $row->plate_number }}</td>
                                            <td>{{ $row->vehicle_type }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>
                                                @if ($row->status === 'active')
                                                    <span class="badge bg-success">Active</span>
                                                @elseif ($row->status === 'inactive')
                                                    <span class="badge bg-danger">Not Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Unknown</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.assigncancel', ['id' => $row->id]) }}" class="btn btn-warning badge">Cancel</a>                                        
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

@endsection
