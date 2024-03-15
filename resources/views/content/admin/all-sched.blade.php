@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Schedules</title>
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Schedule List</h2>

        <div class="container">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Delivery ID</th>
                    <th>Driver Name</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Shipment Date</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example table row, repeat as needed -->
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>Customer A</td>
                    <td>Location A</td>
                    <td>2024-03-15</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
        </div>
    </div>
</div>

</html>

@endsection