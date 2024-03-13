@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')


<div class="container">
        <h2>Create Delivery Schedule</h2>

        <form method="" action="">
            @csrf

            <div class="form-group">
                <label for="customer_id">Customer Name:</label>
                <input type="text" name="customer_id" class="form-control" required style="width: 200px;">
            </div>

            <div class="form-group">
                <label for="outbound_shipment">Outbound Shipment:</label>
                <input type="date" name="outbound_shipment" class="form-control" required value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" style="width: 200px;"> 
            </div>

            <div class="form-group">
                <label for="route">Route:</label>
                <input type="text" name="route" class="form-control" required style="width: 200px;">
            </div>

            <div class="form-group">
                <label for="delivery_status">Delivery Status:</label>
                <select name="delivery_status" class="form-control" required style="width: 200px;">
                    <option value="Pending">Pending</option>
                    <option value="In Transit">In Transit</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
            function validateDate() {
                var currentDate = new Date();
                var selectedDate = new Date(document.getElementsByName("outbound_shipment")[0].value);

                if (selectedDate < currentDate) {
                    alert("Please select a future date.");
                    document.getElementsByName("outbound_shipment")[0].value = "{{ date('Y-m-d') }}";
                }
            }
        </script>
@endsection
