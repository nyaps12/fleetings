@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('content')

    <!--/ Card Border Shadow -->
    <div class="row">

        <div class="col-xl-4 mb-4 col-lg-5 col-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-5">
                        <div class="card-body text-nowrap">
                            <h5 class="card-title mb-0">Welcome, {{ $user->firstname }} {{ $user->lastname }}</h5>
                            <br>

                            @if ($drivers->isNotEmpty())
                                @foreach ($drivers as $driverItem)
                                    <p>Status: <span class="badge btn-sm bg-success">{{ $driverItem->status }}</span></p>
                                @endforeach
                            @else
                                <p>Status: <small class="text-muted">No Status</small></p>
                            @endif


                            <br>
                            {{-- <a href="{{ route('profile') }}" class="btn btn-primary">My Profile</a> --}}
                        </div>
                    </div>
                    <div class="col-7 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4 mb-2">
                            <img src="{{ $user->profile_photo_path }}" class="rounded-circle" height="140" width="auto"
                                alt="user profile">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 mb-4 col-lg-7 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">Driver shits </h5>
                        <small class="text-muted"></small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-4 col-8">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2"><i
                                        class="ti ti-truck-delivery ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">15</h5>
                                    <small>Delivered</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-8">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2"><i
                                        class="ti ti-truck-return ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">1</h5>
                                    <small>Return & Refund</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-8">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2"><i
                                        class="ti ti-currency-peso ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">500</h5>
                                    <small>Earnings</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-20">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Vehicle Information</h5>
                        {{-- <small class="text-muted">test</small> --}}
                    </div>
                </div>
                <div class="card-body pb-0">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-3">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Vehicle Brand :</h6>
                                </div>
                                <div class="user-progress d-flex align-items-start gap-3">

                                    @if ($drivers->isNotEmpty())
                                        @foreach ($drivers as $driverItem)
                                            @if ($driverItem->vehicle_brand)
                                                <p><span>{{ $driverItem->vehicle_brand }}</span></p>
                                            @endif
                                        @endforeach
                                    @else
                                        <small class="text-muted">No Vehicle Brand found</small>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-3">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Plate Number :</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-3">
                                    @if ($drivers->isNotEmpty())
                                        @foreach ($drivers as $driverItem)
                                            @if ($driverItem->plate_number)
                                                <p><span>{{ $driverItem->plate_number }}</span></p>
                                            @endif
                                        @endforeach
                                    @else
                                        <small class="text-muted">No Plate Number found</small>
                                    @endif

                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-3">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Vehicle Type :</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-3">
                                    @if ($drivers->isNotEmpty())
                                        @foreach ($drivers as $driverItem)
                                            @if ($driverItem->vehicle_type)
                                                <p><span>{{ $driverItem->vehicle_type }}</span></p>
                                            @endif
                                        @endforeach
                                    @else
                                        <small class="text-muted">No Vehicle Type found</small>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-8 mb-10 col-lg-10 col-md-10 col-sm-10 col-10">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">My History</h5>
                        <small class="text-muted"></small>
                        <div class="col-auto">
                            <a href="{{ url('/history') }}" class="btn btn-sm btn-outline-primary"><span
                                    class="text-end">Show
                                    all history</span></a>
                        </div>
                    </div>

                    <!-- Tab buttons -->
                    <ul class="nav nav-tabs" id="driverPerformanceTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="completed-tab" data-bs-toggle="tab"
                                data-bs-target="#completed" type="button" role="tab" aria-controls="completed"
                                aria-selected="true">Completed</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled"
                                type="button" role="tab" aria-controls="cancelled"
                                aria-selected="false">Cancelled</button>
                        </li>
                    </ul>

                </div>
                <div class="card-body">
                    <!-- Tab content -->
                    <div class="tab-content" id="driverPerformanceTabContent">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                            aria-labelledby="tab1-tab">
                            <!-- Content for Tab 1 -->
                        </div>
                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                            <!-- Content for Tab 2 -->

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-20">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Driver Performance</h5>
                        {{-- <small class="text-muted">test</small> --}}

                    </div>
                </div>
                <div class="container">
                    <h3>Rating :</h3>
                    <h3>Customer Feedback :</h3>

                </div>
            </div>
        </div>

    </div>




@endsection
