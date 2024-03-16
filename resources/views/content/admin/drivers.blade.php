@php
    $configData = Helper::appClasses();
    // $status = 'unavailable';
@endphp

@extends('layouts.layoutMaster')
@section('title', 'Driver List')

@section('content')
    <div class="row">


        <div class="col-sm-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive card-datatable">
                        <table class="table datatable-invoice border-top">
                            <thead>
                                <tr>
                                    <th scope="col">ID </th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone #</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($drivers as $driver)
                                    <tr>
                                        {{-- <span class="ti ti-user-circle"></span> --}}
                                        <td> {{ $driver->id }} </td>
                                        <td>{{ $driver->firstname }} {{ $driver->lastname }} </td>
                                        <td>{{ $driver->phone }}</td>
                                        <td>{{ $driver->address }}</td>
                                        <td>{{ $driver->email }}</td>
                                        <td>
                                            @if ($driver->status === 'active')
                                                <span class="badge bg-success">
                                                    Active
                                                </span>
                                            @elseif ($driver->status === 'inactive')
                                                <span class="badge bg-danger">
                                                    Not Active
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    Unknown
                                                </span>
                                            @endif
                                            {{-- <span class="badge @if ('available') bg-success @else bg-danger @endif">
                            </span> --}}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#view-vehicle">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    @include('content.modal.view-vehicle')

@endsection
