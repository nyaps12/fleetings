@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Request MRO ')

@section('content')

    <div class="container">
        {{-- <h1>Request Tools</h1> --}}
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form id="routeForm" action="/" method="POST" class="browser-default-validation">
                            @csrf
                            <div id="placeInfo">

                                <div class="mb-3">
                                    <label for="dateInput" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="dateInput" name="date"
                                        min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="product">Product</label>
                                    <input type="text" name="product" id="product" class="form-control"
                                        placeholder="Enter Product" required>
                                </div>



                                <div class="mb-3">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" class="form-control" placeholder="Set Quantity"
                                        id="quantity" required>
                                </div>

                                {{-- <div class="searchInput mb-3">
                                    <label for="loc2">Waypoints: (Required)</label>
                                    <input type="text" name="searchbox" class="form-control"
                                        placeholder="Enter some waypoints" id="loc2">
                                    <div>
                                        <ul id="waypointsInfo" class="list-group list-group-timeline"></ul>
                                    </div>
                                </div>

                                <div class="searchInput mb-3">
                                    <label for="loc3">End:</label>
                                    <input type="text" name="searchbox" class="form-control"
                                        placeholder="Set end location" id="loc3" required>
                                </div>

                                <input type="hidden" name="optimization_status" id="status" value="Unoptimized"> --}}

                            </div>
                            <!-- Submit Button -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-2" id="send-request">
                                    <span class="tf-icons ti-xs ti ti-device-floppy me-1"></span>Send Request
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card col-md-8">
                <div class="table-responsive card-datatable">
                    <table class="table datatable-invoice ">
                        <thead>
                            <tr>
                                <th><strong>ID</strong></th>
                                <th><strong>Product</strong></th>
                                <th><strong>Warehouse</strong></th>
                                <th><strong>Qty.</strong></th>
                                <th><strong>Status</strong></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>ss</td>
                                <td>ss</td>
                                <td>ss</td>
                                <td>ss</td>
                                <td>ss</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
