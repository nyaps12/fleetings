@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/contentNavbarLayout')

@include('layouts/notification')

@section('title', 'Report')

@section('content')
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

    @if (session('error'))
        <div id="errorNotification" class="notification show error">
            <span class="message">{{ session('error') }}</span>
            <button class="close-btn" onclick="hideErrorNotification()">X</button>
        </div>
        <script>
            // Set the duration (in milliseconds) for the error notification to be displayed
            var duration = 5000; // 5 seconds (adjust as needed)

            // Function to hide the error notification after the specified duration
            function hideErrorNotification() {
                var errorNotification = document.getElementById('errorNotification');
                errorNotification.style.display = 'none';
            }

            // Hide the error notification after the specified duration
            setTimeout(hideErrorNotification, duration);
        </script>
    @endif

    <div class="container">
        <form action="/submitIncident" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Information about person involved</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Driver Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name"
                                value="{{ $drivers->isNotEmpty() ? $drivers->first()->firstname . ' ' . $drivers->first()->lastname ?? 'No Driver Name found' : 'No Driver Name found' }}"
                                readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="phone_number" class="form-label">Cellphone Number</label>
                            <input type="tel" class="form-control" name="phone_number" placeholder="Phone Number">
                        </div>

                        <div class="col-md-4">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <label for="vehicle" class="form-label">Vehicle Type</label>
                            <input type="text" class="form-control" name="vehicle" placeholder="Vehicle" readonly
                                value="{{ $drivers->isNotEmpty() ? $drivers->first()->vehicle_brand ?? 'No Vehicle Brand found' : 'No Vehicle Brand found' }}">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="vehicle_engine_no" class="form-label">Vehicle Engine Number</label>
                            <input type="text" class="form-control" name="vehicle_engine_no"
                                placeholder="Vehicle Engine No.">
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="card">
                <div class="card-header">
                    <h3>Information about incident</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="incident_date" class="form-label">Date of Incident</label>
                            <input type="date" class="form-control" name="incident_date" max="{{ date('Y-m-d') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="incident_name" class="form-label">Time of Incedent</label>
                            <input type="time" class="form-control" name="incident_time" placeholder="Time of Incident">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <label for="otherName" class="form-label">Other Driver Name</label>
                            <input type="text" class="form-control" name="other_name" placeholder="Name">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label for="phone_number" class="form-label">Cellphone Number</label>
                            <input type="tel" class="form-control" name="number" placeholder="Phone Number">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label for="other_address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="other_address" placeholder="Address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="location" class="form-label">Location of Incident</label>
                        <input type="text" class="form-control" name="incident_location"
                            placeholder="Incident Location">
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <label for="incident_description" class="form-label">State what happen</label>
                            <textarea type="text" class="form-control form-control-lg" rows="3" name="incident_description"
                                placeholder="Description"></textarea>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="image" class="form-label">Upload Incident Photos</label>
                            <input type="file" class="form-control" id="image" name="incident_photo"
                                accept="image/*">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-2 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit Report</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
