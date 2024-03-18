@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Assign')

@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Driver Information:</h4>
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p style="color:red;">{{ $error }}</p>
                            @endforeach
                        @endif
                        <form action="{{ route('assignSuccess') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $driver->id }}">
                            <p>ID: {{ $driver->id }}</p>
                            <p>Name: {{ $driver->firstname }} {{ $driver->lastname }}</p>
                            <p>DL Code:
                                @if (in_array($driver->dlcodes, [1, 2, 3, 4, 5, 6, 7]))
                                    {{ $dlCode->codes }} - {{ $dlCode->name }}
                                @endif
                            </p>
                            <label for="cars">Choose a vehicle:</label>
                            <select id="cars" name="vehicle_type">
                                @if ($driver->dlcodes == 1)
                                    @php $motorcycleExists = false; @endphp
                                    @foreach ($vehicles as $vehicle)
                                        @if ($vehicle->vehicle_type == 'Motorcycle' && $vehicle->vehicle_brand)
                                            <option value="Motorcycle">{{ $vehicle->vehicle_brand }} - Motorcycle</option>
                                            @php $motorcycleExists = true; @endphp
                                        @break
                                    @endif
                                @endforeach
                                @if (!$motorcycleExists)
                                    <option value="">No vehicle found</option>
                                @endif
                            @elseif ($driver->dlcodes == 2)
                                @php $sedanExists = false; @endphp
                                @foreach ($vehicles as $vehicle)
                                    @if ($vehicle->vehicle_type == 'Sedan' && $vehicle->vehicle_brand)
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
                                    @if ($vehicle->vehicle_type == 'SUV' && $vehicle->vehicle_brand)
                                        <option value="SUV">{{ $vehicle->vehicle_brand }} - Sedan</option>
                                        @php $sedanExists = true; @endphp
                                    @endif
                                @endforeach
                                @if (!$sedanExists)
                                    <option value="">No vehicle found</option>
                                @endif
                            @elseif ($driver->dlcodes == 4)
                                @php $sedanExists = false; @endphp
                                @foreach ($vehicles as $vehicle)
                                    @if ($vehicle->vehicle_type == 'Sedan' && $vehicle->vehicle_brand)
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
                                    @if ($vehicle->vehicle_type == 'SUV' && $vehicle->vehicle_brand)
                                        <option value="SUV">{{ $vehicle->vehicle_brand }} - Sedan</option>
                                        @php $sedanExists = true; @endphp
                                    @endif
                                @endforeach
                                @if (!$sedanExists)
                                    <option value="">No vehicle found</option>
                                @endif
                            @elseif ($driver->dlcodes == 6)
                                @php $sedanExists = false; @endphp
                                @foreach ($vehicles as $vehicle)
                                    @if ($vehicle->vehicle_type == 'Truck' && $vehicle->vehicle_brand)
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
                                    @if ($vehicle->vehicle_type == 'Sedan' && $vehicle->vehicle_brand)
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
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                            <a href="{{ route('drivers') }}" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
