@php
    $configData = Helper::appClasses();
    $status = 'unavailable';
@endphp

@extends('layouts.layoutMaster')
@section('title', 'Dashboard')

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID </th>
                    <th scope="col">Year Model</th>
                    <th scope="col">Vehicle Type</th>
                    <th scope="col">Plate Number</th>
                    <th scope="col">Load Capacity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <span class="ti ti-car"></span> 1 </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>
                        <span class="badge @if ($status == 'available') bg-success @else bg-danger @endif">
                            {{ ucfirst($status) }}
                        </span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#view-vehicle">
                            View
                        </button>
                    </td>
                </tr>
                <tr>
                    <td> <span class="ti ti-truck"></span> 2 </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>
                        <span class="badge @if ($status == 'available') bg-success @else bg-danger @endif">
                            {{ ucfirst($status) }}
                        </span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#view-vehicle">
                            View
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    @include('content.modal.view-vehicle')

@endsection
