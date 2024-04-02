@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Reports ')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="row">

                                <div class="d-flex">

                                    <img src="{{ asset('assets/img/vehicle/hannah.jpg') }}" alt=""
                                        style="height: 300px;">
                                </div>
                                <h1><a href="order"> Hannah Lactao </a></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h1> Raffy Limbo </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
