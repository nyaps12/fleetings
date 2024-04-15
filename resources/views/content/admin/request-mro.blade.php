@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Request MRO ')

@section('content')

    <div class="position-fixed center-5 end-0 p-3" style="z-index: 10">
        <div class="col-md-8">
            @if (session('success'))
                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function() {
                        var successAlert = document.getElementById('success-alert');
                        successAlert.classList.remove('show');
                        setTimeout(function() {
                            successAlert.remove();
                        }, 5000);
                    }, 1500);
                </script>
            @endif
        </div>
    </div>



    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Request Tools & Materials</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('requestTools') }}" method="POST">
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


                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required readonly>
                                        <option value="Requested">Request</option>
                                    </select>
                                </div>



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
                                <th><strong>Date</strong></th>
                                <th><strong>Product</strong></th>
                                <th><strong>Qty.</strong></th>
                                <th><strong>Status</strong></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($requestMro as $request)
                                <tr>

                                    <td>{{ $request->id }}</td>
                                    <td>{{ $request->date }}</td>
                                    <td>{{ $request->product }}</td>
                                    <td>{{ $request->quantity }}</td>
                                    <td> {{ $request->status }} </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
