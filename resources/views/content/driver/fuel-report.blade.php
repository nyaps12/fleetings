@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Fuel Report')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3> Fuel Report </h3>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="dateInput" class="form-label">Date</label>
                    <input type="date" class="form-control" id="dateInput">
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="pricePerLiterInput" class="form-label">Price per Liter</label>
                        <input type="number" class="form-control" id="pricePerLiterInput"
                            placeholder="Enter price per liter">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="literInput" class="form-label">Liters</label>
                        <input type="number" class="form-control" id="literInput" placeholder="Enter liters">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="totalInput" class="form-label">Total</label>
                    <input type="number" class="form-control" id="totalInput" placeholder="Enter total">
                </div>
                <div class="mb-3">
                    <label for="odometerInput" class="form-label">Odometer</label>
                    <input type="number" class="form-control" id="odometerInput" placeholder="Enter odometer">
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="fuelTypeInput" class="form-label">Fuel Type</label>
                        <select class="form-select" id="fuelTypeInput">
                            <option selected>Choose fuel type...</option>
                            <option value="1">Gasoline</option>
                            <option value="2">Diesel</option>
                            <option value="3">Electric</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="fuelBrandInput" class="form-label">Fuel Brand</label>
                        <input type="text" class="form-control" id="fuelBrandInput" placeholder="Enter fuel brand">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="receiptImgInput" class="form-label">Receipt Image</label>
                    <input type="file" class="form-control" id="receiptImgInput" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
