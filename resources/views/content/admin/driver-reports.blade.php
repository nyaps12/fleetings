@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Reports ')

@section('content')
    <div class="row">
        <div class="col-xxl-12 col-xxl-4 mb-4 order-0 order-xxl-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between pb-2">
                    <div class="card-title mb-1">
                        <h5 class="m-0 me-2">Reports</h5>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="salesByCountryTabs" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountryTabs">
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="nav-align-top">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-new" aria-controls="navs-justified-new"
                                    aria-selected="true">Vehicle Report</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link " role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-link-preparing"
                                    aria-controls="navs-justified-link-preparing" aria-selected="false">Fuel Report</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-link-shipping"
                                    aria-controls="navs-justified-link-shipping" aria-selected="false">Fuck Report</button>
                            </li>
                        </ul>
                        <div class="tab-content px-2 mx-1 pb-0">
                            <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">

                                <h1> CONTENT HERE !</h1>

                            </div>

                            <div class="tab-pane fade" id="navs-justified-link-preparing" role="tabpanel">
                                <H1> CONTENT HERE !</H1>
                            </div>

                            <div class="tab-pane fade" id="navs-justified-link-shipping" role="tabpanel">
                                <H1>CONTENT HERE !</H1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
