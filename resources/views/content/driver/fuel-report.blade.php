@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/contentNavbarLayout')

@include('layouts/notification')


@section('title', 'Fuel Report')

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

    <div class="card">
        <div class="card-header">
            <h3>Fuel Report</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('submitFuelReport') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="dateInput" class="form-label">Date</label>
                    <input type="date" class="form-control" id="dateInput" name="date" min="{{ date('Y-m-d') }}"
                        max="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}">
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="pricePerLiterInput" class="form-label">Price per Liter</label>
                        <input type="number" class="form-control" id="pricePerLiterInput" name="price_per_liter"
                            placeholder="Enter price per liter">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="literInput" class="form-label">Liters</label>
                        <input type="number" class="form-control" id="literInput" name="liters"
                            placeholder="Enter liters">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="totalInput" class="form-label">Total</label>
                    <input type="number" class="form-control" id="totalInput" name="total_cost" placeholder="Enter total">
                </div>
                <div class="mb-3">
                    <label for="odometerInput" class="form-label">Odometer</label>
                    <input type="number" class="form-control" id="odometerInput" name="vehicle_odometer"
                        placeholder="Enter odometer">
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="fuelTypeInput" class="form-label">Fuel Type</label>
                        <select class="form-select" id="fuelTypeInput" name="fuel_type">
                            <option selected disabled>Choose fuel type...</option>
                            <option value="Gasoline">Gasoline</option>
                            <option value="Diesel">Diesel</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="fuelBrandInput" class="form-label">Fuel Brand</label>
                        <input type="text" class="form-control" id="fuelBrandInput" name="fuel_brand"
                            placeholder="Enter fuel brand">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="receiptImageInput" class="form-label">Receipt Image</label>
                    <input type="file" class="form-control" id="receiptImageInput" name="fuel_receipt" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
