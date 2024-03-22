@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('content')

    <!--/ Card Border Shadow -->
    <div class="row">

        <div class="col-xl-4 mb-4 col-lg-5 col-md-6 col-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-5">
                        <div class="card-body text-nowrap">
                            <h5 class="card-title mb-0">Welcome, {{ $user->firstname }} {{ $user->lastname }}</h5>
                            <br>
                            @if ($user)
                                @if ($user->status === 'active')
                                    <p>Status: <span class="badge bg-success">Active</span></p>
                                @elseif ($user->status === 'inactive')
                                    <p>Status: <span class="badge bg-success">Active</span></p>
                                @else
                                    <p>Status: <span class="badge bg-secondary">No Status</span></p>
                                @endif
                            @endif
                            <br>
                        </div>
                    </div>
                    <div class="col-7 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4 mb-2">
                            <img src="{{ $user->profile_photo_path }}" class="rounded-circle" height="140" width="auto"
                                alt="user profile">
                        </div>
                    </div>
                    <div class="col-12">
                        <ul>
                            <li class="d-flex">
                                <div class="d-flex">
                                    <h6 class="card-title mb-0 mr-2">Vehicle Brand:  &nbsp;</h6>
                                    <h6>
                                        @if ($drivers->isNotEmpty())
                                            @foreach ($drivers as $driverItem)
                                                @if ($driverItem->vehicle_brand)
                                                    <p><span>{{ $driverItem->vehicle_brand }}</span></p>
                                                @endif
                                            @endforeach
                                        @else
                                            <small class="text-muted">No Vehicle Brand found</small>
                                        @endif
                                    </h6>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="d-flex">
                                        <h6 class="mb-0">Plate Number:  &nbsp;</h6>
                                    <h6>
                                        @if ($drivers->isNotEmpty())
                                            @foreach ($drivers as $driverItem)
                                                @if ($driverItem->plate_number)
                                                    <p><span>{{ $driverItem->plate_number }}</span></p>
                                                @endif
                                            @endforeach
                                        @else
                                            <small class="text-muted">No Plate Number found</small>
                                        @endif

                                    </div>
                            </li>
                            <li class="d-flex">
                                <div class="d-flex">
                                        <h6 class="mb-0">Vehicle Type:  &nbsp;</h6>
                                    <h6>
                                        @if ($drivers->isNotEmpty())
                                            @foreach ($drivers as $driverItem)
                                                @if ($driverItem->vehicle_type)
                                                    <p><span>{{ $driverItem->vehicle_type }}</span></p>
                                                @endif
                                            @endforeach
                                        @else
                                            <small class="text-muted">No Vehicle Type found</small>
                                        @endif
                                    </h6>
                                </div>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 mb-4 col-lg-7 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div>
                        <small id="current-date">Loading...</small>
                        <small>|</small>
                        <small id="current-time">Loading...</small> <!-- Added -->
                        <h5 class="card-title">Weather in Manila, PH</h5>
                        <div class="d-flex justify-content align-items-center align-self-center align-content-center mb-3">
                            <img class="card-title mb-0" id="weather-icon" src="" alt="Weather Icon" />
                            <span class="display-6" id="temperature">Loading...</span>
                        </div>
                        <h5 class="mb-0">Weather Condition</h5>
                        <small id="weather-condition">Loading...</small>
                        <br>
                        <br>
                        <h5 class="mb-0">Wind Speed</h5>
                        <small id="wind-speed">Loading...</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 mb-4 col-lg-12 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">Driver shits </h5>
                        <small class="text-muted"></small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-4 col-8">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2"><i
                                        class="ti ti-truck-delivery ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">15</h5>
                                    <small>Delivered</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-8">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2"><i
                                        class="ti ti-truck-return ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">1</h5>
                                    <small>Return & Refund</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-8">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2"><i
                                        class="ti ti-currency-peso ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">500</h5>
                                    <small>Earnings</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 mb-10 col-lg-12 col-md-10 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">My History</h5>
                        <small class="text-muted"></small>
                        <div class="col-auto">
                            <a href="{{ url('/history') }}" class="btn btn-sm btn-outline-primary"><span
                                    class="text-end">Show
                                    all history</span></a>
                        </div>
                    </div>

                    <!-- Tab buttons -->
                    <div class="card-body">
                        <div class="nav-align-top">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-justified-new" aria-controls="navs-justified-new"
                                        aria-selected="true">Completed</button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link " role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-justified-link-preparing"
                                        aria-controls="navs-justified-link-preparing"
                                        aria-selected="false">Canceled</button>
                                </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 mb-4 col-lg-12 col-12">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Driver Performance</h5>
                        {{-- <small class="text-muted">test</small> --}}

                    </div>
                </div>
                <div class="container">
                    <h3>Rating :</h3>
                    <h3>Customer Feedback :</h3>

                </div>
            </div>
        </div>

    </div>

    <script>
        // Function to update current date and time
        function updateDateTime() {
            const currentDate = new Date();
    
            // Update current date
            const dateString = currentDate.toDateString();
            document.getElementById('current-date').innerText = dateString;
    
            // Update current time
            const timeString = currentDate.toLocaleTimeString();
            document.getElementById('current-time').innerText = timeString;
        }
    
        // Call updateDateTime initially to avoid initial delay
        updateDateTime();
    
        // Set interval to update date and time every second
        setInterval(updateDateTime, 1000);
    
        // Function to update current weather
        function updateWeatherData() {
            navigator.geolocation.getCurrentPosition(position => {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
    
                fetch(`http://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=ca7c6d4f1b2096b6279840b062ca8d9d&units=metric`)
                    .then(response => response.json())
                    .then(data => {
                        // Round temperature value to remove decimal part
                        const temperature = Math.floor(data.main.temp);
                        document.getElementById('temperature').innerText = `${temperature}°C`;
    
                        // Update weather condition
                        document.getElementById('weather-condition').innerText = data.weather[0].description;
    
                        // Update wind speed
                        document.getElementById('wind-speed').innerText = `${data.wind.speed.toFixed(1)} m/s`;
    
                        // Update weather icon
                        const iconCode = data.weather[0].icon;
                        const iconUrl = `http://openweathermap.org/img/wn/${iconCode}.png`;
                        document.getElementById('weather-icon').src = iconUrl;
                    })
                    .catch(error => console.error('Error fetching weather data:', error));
            }, error => {
                console.error('Error getting current position:', error);
            });
        }
    
        // Function to update weather data initially and set interval for real-time updates
        function initWeatherUpdate() {
            // Call updateWeatherData initially to avoid initial delay
            updateWeatherData();
    
            // Set interval to update weather data every minute (adjust as needed)
            setInterval(updateWeatherData, 60000); // Update every minute
        }
    
        // Call initWeatherUpdate to start real-time weather updates
        initWeatherUpdate();
    </script>
    
    






@endsection
