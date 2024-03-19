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
                        <h5 class="card-title mb-0">Statistics</h5>
                        <small class="text-muted">Updated 1 month ago</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2"><i
                                        class="ti ti-chart-pie-2 ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">230k</h5>
                                    <small>Sales</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2"><i class="ti ti-users ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">8.549k</h5>
                                    <small>Customers</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2"><i
                                        class="ti ti-shopping-cart ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">1.423k</h5>
                                    <small>Products</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2"><i
                                        class="ti ti-currency-dollar ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">$9745</h5>
                                    <small>Revenue</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Vehicle Information</h5>
                        {{-- <small class="text-muted">test</small> --}}
                    </div>
                </div>
                <div class="card-body pb-0">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-3">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class='ti ti-chart-pie-2 ti-sm'></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Vehicle Brand</h6>
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
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success"><i
                                        class='ti ti-currency-dollar ti-sm'></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Plate Number</h6>
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
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-secondary"><i
                                        class='ti ti-credit-card ti-sm'></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Vehicle Type</h6>
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

    </div>

@endsection
