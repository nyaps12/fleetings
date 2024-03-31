@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Reports ')

@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="row">

                    <img src="{{ asset('assets/img/vehicle/Truck.jpg') }}" alt="" class="img-fluid"
                        style="max-width: 250px;">

                    <div class="col-6"> <!-- Adjusted to col-6 -->
                        <h3 class="d-flex text-start">2011 Truck</h3>
                        <p class="text-muted"> Truck. 2011 ZZZ</p>
                    </div>
                </div>
                <br>
                <div class="card-body">
                    <div class="nav-align-top">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-new" aria-controls="navs-justified-new"
                                    aria-selected="true">Overview</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link " role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-link-preparing"
                                    aria-controls="navs-justified-link-preparing"
                                    aria-selected="false">Specification</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-link-shipping"
                                    aria-controls="navs-justified-link-shipping" aria-selected="false">Service
                                    History</button>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
