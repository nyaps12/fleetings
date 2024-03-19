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
                                    <th scope="col">Contact No.</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($drivers as $driver)
                                <tr>
                                    <th>{{ $driver->id }}</th>
                                    <td>{{ $driver->firstname }} {{ $driver->lastname }}</td>
                                    <td>{{ $driver->phone }}</td>
                                    <td>{{ $driver->address }}</td>
                                    <td>{{ $driver->email }}</td>
                                    <td>
                                        @if ($driver->status === 'active')
                                        <span class="badge bg-success">Active</span>
                                        @elseif ($driver->status === 'inactive')
                                        <span class="badge bg-danger">Not Active</span>
                                        @else
                                        <span class="badge bg-secondary">Unknown</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.assign', ['id' => $driver->id]) }}" class="btn btn-primary badge {{ $driver->status === 'inactive' ? 'disabled' : '' }}" id="assignButton">
                                            @if($driver->status === 'inactive')
                                                <span class="fas fa-lock" aria-hidden="true"></span>
                                            @endif
                                            &nbsp;Assign
                                        </a>                                                                                                                        
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

@endsection
