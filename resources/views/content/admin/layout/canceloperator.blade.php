@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Operator')

@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Operator Information:</h4>
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p style="color:red;">{{ $error }}</p>
                            @endforeach
                        @endif
                        <form action="{{ route('assignCancel') }}" method="POST">
                            @csrf
                            @method('DELETE')                        
                            <input type="hidden" name="id" value="{{ $driver->id }}">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="">ID <span class="badge">{{ $driver->id }}</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="">Name: <span class="badge">{{ $driver->firstname }} {{ $driver->lastname }}</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="">Number: <span class="badge">{{ $driver->phone }}</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="">Vehicle Brand: <span class="badge">{{ $driver->vehicle_brand }}</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="">Plate Number: <span class="badge">{{ $driver->plate_number }}</span></label>
                                </div>
                                <div class="mb-3">
                                    <label for="">Status: <span class="badge bg-success">{{ $driver->status }}</span></label>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                                <a href="{{ route('operator') }}" class="btn btn-warning">Cancel</a>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
