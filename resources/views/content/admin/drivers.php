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
    
    @if ($errors->any())
    <div id="errorNotification" class="notification show error">
        <span class="message">Error occurred:</span>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button class="close-btn" onclick="hideErrorNotification()">X</button>
    </div>
    <script>
        // Function to hide the error notification
        function hideErrorNotification() {
            var errorNotification = document.getElementById('errorNotification');
            errorNotification.style.display = 'none';
        }

        // Hide the error notification after the specified duration
        setTimeout(hideErrorNotification, duration);
        </script>
    @endif

    

        <div class="row">

            <div class="col-sm-12 col-lg-12 mb-4">
                <h2> Driver's Information</h2>
                <div class="card">
                    <div class="row">
                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="row d-flex">
                                    <div class="col-md-2">
                                        <br>
                                        <input type="search" class="form-control" id="searchInput" name="searchInput"
                                            placeholder="Enter name...">
                                    </div>

                                    <div class="col-md-2">
                                        <br>
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
                                        <br>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </form>

                            <br>
                            <div class="table-responsive card-datatable">
                                <table class="table datatable-invoice border-top">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID </th>
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
                                                    <a href="#" class="btn btn-primary badge {{ $driver->status === 'inactive' ? 'disabled' : '' }}" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#addNewCCModal"
                                                        onclick="updateModal({{ json_encode($driver) }})">
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

<!-- Add Schedule Modal -->
<div class="modal fade" id="addNewCCModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Assign Operator</h3>
                    <p class="text-muted">Please assign operator and vehicle</p>
                </div>
                <form action="{{ route('assignSuccess') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $driver->id }}">
                    <p>ID: <span id="driverId"></span></p>
                    <p>Name: <span id="driverName"></span></p>
                    <p>DL Code: <span id="dlCode"></span></p>

                    <label for="cars">Choose a vehicle:</label>
                    <select id="cars" name="vehicle" class="select2 form-select">
                        @if ($driver->dlcodes == 1)
                            @php $motorcycleExists = false; @endphp
                            @foreach ($vehicles as $vehicle)
                                @if ($vehicle->vehicle_type == 'Motorcycle' && $vehicle->status != 'unavailable')
                                    <option value="Motorcycle">{{ $vehicle->vehicle_brand }} - Motorcycle</option>
                                    @php $motorcycleExists = true; @endphp
                                @endif
                            @endforeach
                            @if (!$motorcycleExists)
                                <option value="">No motorcycle found</option>
                            @endif
                        @elseif ($driver->dlcodes == 2)
                            @php $sedanExists = false; @endphp
                            @foreach ($vehicles as $vehicle)
                                @if ($vehicle->vehicle_type == 'Sedan' && $vehicle->status != 'unavailable')
                                    <option value="Sedan">{{ $vehicle->vehicle_brand }} - Sedan</option>
                                    @php $sedanExists = true; @endphp
                                @endif
                            @endforeach
                            @if (!$sedanExists)
                                <option value="">No vehicle found</option>
                            @endif
                        @elseif ($driver->dlcodes == 3)
                            @php $sedanExists = false; @endphp
                            @foreach ($vehicles as $vehicle)
                                @if ($vehicle->vehicle_type == 'SUV' && $vehicle->status != 'unavailable')
                                    <option value="SUV">{{ $vehicle->vehicle_brand }} - SUV</option>
                                    @php $sedanExists = true; @endphp
                                @endif
                            @endforeach
                            @if (!$sedanExists)
                                <option value="">No vehicle found</option>
                            @endif
                        @elseif ($driver->dlcodes == 4)
                            @php $sedanExists = false; @endphp
                            @foreach ($vehicles as $vehicle)
                                @if ($vehicle->vehicle_type == 'Sedan' && $vehicle->status != 'unavailable')
                                    <option value="Sedan">{{ $vehicle->vehicle_brand }} - Sedan</option>
                                    @php $sedanExists = true; @endphp
                                @endif
                            @endforeach
                            @if (!$sedanExists)
                                <option value="">No vehicle found</option>
                            @endif
                        @elseif ($driver->dlcodes == 5)
                            @php $sedanExists = false; @endphp
                            @foreach ($vehicles as $vehicle)
                                @if ($vehicle->vehicle_type == 'SUV' && $vehicle->status != 'unavailable')
                                    <option value="SUV">{{ $vehicle->vehicle_brand }} - SUV</option>
                                    @php $sedanExists = true; @endphp
                                @endif
                            @endforeach
                            @if (!$sedanExists)
                                <option value="">No vehicle found</option>
                            @endif
                        @elseif ($driver->dlcodes == 6)
                            @php $sedanExists = false; @endphp
                            @foreach ($vehicles as $vehicle)
                                @if ($vehicle->vehicle_type == 'Truck' && $vehicle->status != 'unavailable')
                                    <option value="Truck">{{ $vehicle->vehicle_brand }} - Sedan</option>
                                    @php $sedanExists = true; @endphp
                                @endif
                            @endforeach
                            @if (!$sedanExists)
                                <option value="">No vehicle found</option>
                            @endif
                        @elseif ($driver->dlcodes == 7)
                            @php $sedanExists = false; @endphp
                            @foreach ($vehicles as $vehicle)
                                @if ($vehicle->vehicle_type == 'Sedan' && $vehicle->status != 'unavailable')
                                    <option value="Sedan">{{ $vehicle->vehicle_brand }} - Sedan</option>
                                    @php $sedanExists = true; @endphp
                                @endif
                            @endforeach
                            @if (!$sedanExists)
                                <option value="">No vehicle found</option>
                            @endif
                            <!-- Add similar logic for other vehicle types -->
                        @else
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->vehicle_type }}">{{ $vehicle->vehicle_brand }} -
                                    {{ $vehicle->vehicle_type }}</option>
                            @endforeach
                        @endif
                    </select>                    
                    <br>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // Function to update modal content with driver's details
    function updateModal(driver, vehicles) {
        if (driver && vehicles) {
            // Update modal content with driver's details
            document.getElementById('driverId').innerText = driver.id;
            document.getElementById('driverName').innerText = driver.firstname + ' ' + driver.lastname;
            document.getElementById('dlCode').innerText = driver.dlcodes;
            
            // Clear previous vehicle options
            var carsSelect = document.getElementById('cars');
            carsSelect.innerHTML = '';

            if (vehicles.length > 0) {
                // Loop through each vehicle and populate the select element
                vehicles.forEach(function(vehicle) {
                    // Create a new <option> element
                    var option = document.createElement('option');
                    // Set the value attribute of the <option> element to the vehicle's type
                    option.value = vehicle.vehicle_type;
                    // Set the inner text of the <option> element to display the vehicle's brand and type
                    option.innerText = vehicle.vehicle_brand + ' - ' + vehicle.vehicle_type;
                    // Append the <option> element to the <select> element with the ID 'cars'
                    carsSelect.appendChild(option);
                });
            } else {
                // If no vehicles found, create an option indicating so
                var option = document.createElement('option');
                option.value = ''; // Set value to empty string or any appropriate default value
                option.innerText = 'No vehicles found';
                carsSelect.appendChild(option);
            }
        } else {
            console.error("Driver or driver's vehicles are undefined.");
        }
    }
</script>





  
