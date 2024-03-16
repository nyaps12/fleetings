@php
    $configData = Helper::appClasses();
    // $status = 'unavailable';
@endphp

@extends('layouts.layoutMaster')
@section('title', 'Driver List')

@section('content')
    <div class="table-responsive">
        <table class="table">
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
                        <td> <span class="ti ti-user-circle"></span> {{ $driver->id }} </td>
                        <td>{{ $driver->firstname }} {{ $driver->lastname }} </td>
                        <td>{{ $driver->phone }}</td>
                        <td>{{ $driver->address }}</td>
                        <td>{{ $driver->email }}</td>
                        <td>
                            @if ($driver->status === 'available')
                                <span class="badge bg-success">
                                    Available
                                </span>
                            @elseif ($driver->status === 'unavailable')
                                <span class="badge bg-danger">
                                    Unavailable
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

    <!-- Modal -->
    @include('content.modal.view-vehicle')

@endsection
