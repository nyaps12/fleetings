@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('content')

   <!-- Orders by Countries -->
   <div class="row">
   <div class="col-xxl-12 col-xxl-4 mb-4 order-0 order-xxl-4">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between pb-2">
        <div class="card-title mb-1">
          <h5 class="m-0 me-2">Assignments</h5>
          <small class="text-muted">62 Deliveries in Progress</small>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="salesByCountryTabs" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-new" aria-controls="navs-justified-new" aria-selected="true">On Going</button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link " role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-link-preparing" aria-controls="navs-justified-link-preparing" aria-selected="false">Completed</button>
            </li>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-link-shipping" aria-controls="navs-justified-link-shipping" aria-selected="false">Canceled</button>
            </li>
          </ul>
          <div class="tab-content px-2 mx-1 pb-0">
            <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">
              <ul class="timeline mb-0 pb-1">
                <li class="timeline-item ps-4 border-left-dashed pb-1">
                  <span class="timeline-indicator-advanced timeline-indicator-success">
                    <i class="ti ti-circle-check"></i>
                  </span>
                  <div class="timeline-event px-0 pb-0">
                    <div class="timeline-header">
                      <small class="text-success text-uppercase fw-medium">sender</small>
                    </div>
                    <h6 class="mb-1">Name</h6>
                    <p class="text-muted mb-0">Location</p>
                  </div>
                </li>
                <li class="timeline-item ps-4 border-transparent">
                  <span class="timeline-indicator-advanced timeline-indicator-primary">
                    <i class="ti ti-map-pin"></i>
                  </span>
                  <div class="timeline-event px-0 pb-0">
                    <div class="timeline-header">
                      <small class="text-primary text-uppercase fw-medium">Receiver</small>
                    </div>
                    <h6 class="mb-1">Name</h6>
                    <p class="text-muted mb-0">Location</p>
                  </div>
                </li>
                
              </ul>
              <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
              <ul class="timeline mb-0">
                <li class="timeline-item ps-4 border-left-dashed pb-1">
                  <span class="timeline-indicator-advanced timeline-indicator-success">
                    <i class="ti ti-circle-check"></i>
                  </span>
                  <div class="timeline-event px-0 pb-0">
                    <div class="timeline-header">
                      <small class="text-success text-uppercase fw-medium">sender</small>
                    </div>
                    <h6 class="mb-1">Name</h6>
                    <p class="text-muted mb-0">Location</p>
                  </div>
                </li>
                <li class="timeline-item ps-4 border-transparent">
                  <span class="timeline-indicator-advanced timeline-indicator-primary">
                    <i class="ti ti-map-pin"></i>
                  </span>
                  <div class="timeline-event px-0 pb-0">
                    <div class="timeline-header">
                      <small class="text-primary text-uppercase fw-medium">Receiver</small>
                    </div>
                    <h6 class="mb-1">Name</h6>
                    <p class="text-muted mb-0">Location</p>
                  </div>
                </li>
              </ul>
              <a href="{{ url('/order') }}"> Show all orders </a>
            </div>

            <div class="tab-pane fade" id="navs-justified-link-preparing" role="tabpanel">
              <ul class="timeline mb-0 pb-1">
                <li class="timeline-item ps-4 border-left-dashed pb-1">
                  <span class="timeline-indicator-advanced timeline-indicator-success">
                    <i class="ti ti-circle-check"></i>
                  </span>
                  <div class="timeline-event px-0 pb-0">
                    <div class="timeline-header">
                      <small class="text-success text-uppercase fw-medium">sender</small>
                    </div>
                    <h6 class="mb-1">Name</h6>
                    <p class="text-muted mb-0">Location</p>
                  </div>
                </li>
                <li class="timeline-item ps-4 border-transparent">
                  <span class="timeline-indicator-advanced timeline-indicator-primary">
                    <i class="ti ti-map-pin"></i>
                  </span>
                  <div class="timeline-event px-0 pb-0">
                    <div class="timeline-header">
                      <small class="text-primary text-uppercase fw-medium">Receiver</small>
                    </div>
                    <h6 class="mb-1">Name</h6>
                    <p class="text-muted mb-0">Location</p>
                  </div>
                </li>
              </ul>
              <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
              <ul class="timeline mb-0">
                <li class="timeline-item ps-4 border-left-dashed pb-1">
                  <span class="timeline-indicator-advanced timeline-indicator-success">
                    <i class="ti ti-circle-check"></i>
                  </span>
                  <div class="timeline-event px-0 pb-0">
                    <div class="timeline-header">
                      <small class="text-success text-uppercase fw-medium">sender</small>
                    </div>
                    <h6 class="mb-1">Name</h6>
                    <p class="text-muted mb-0">Location</p>
                  </div>
                </li>
                <li class="timeline-item ps-4 border-transparent">
                  <span class="timeline-indicator-advanced timeline-indicator-primary">
                    <i class="ti ti-map-pin"></i>
                  </span>
                  <div class="timeline-event px-0 pb-0">
                    <div class="timeline-header">
                      <small class="text-primary text-uppercase fw-medium">Receiver</small>
                    </div>
                    <h6 class="mb-1">Name</h6>
                    <p class="text-muted mb-0">Location</p>
                  </div>
                </li>
              </ul>
              <a href="{{ url('/order') }}"> Show all orders </a>
            </div>
            <div class="tab-pane fade" id="navs-justified-link-shipping" role="tabpanel">
              <ul class="timeline mb-0 pb-1">
                <li class="timeline-item ps-4 border-left-dashed pb-1">
                  <span class="timeline-indicator-advanced timeline-indicator-success">
                    <i class="ti ti-circle-check"></i>
                  </span>
                  <div class="timeline-event px-0 pb-0">
                    <div class="timeline-header">
                      <small class="text-success text-uppercase fw-medium">sender</small>
                    </div>
                    <h6 class="mb-1">Name</h6>
                    <p class="text-muted mb-0">Location</p>
                  </div>
                </li>
                <li class="timeline-item ps-4 border-transparent">
                  <span class="timeline-indicator-advanced timeline-indicator-primary">
                    <i class="ti ti-map-pin"></i>
                  </span>
                  <div class="timeline-event px-0 pb-0">
                    <div class="timeline-header">
                      <small class="text-primary text-uppercase fw-medium">Receiver</small>
                    </div>
                    <h6 class="mb-1">Name</h6>
                    <p class="text-muted mb-0">Location</p>
                  </div>
                </li>
              </ul>
              <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
              <ul class="timeline mb-0">
                <li class="timeline-item ps-4 border-left-dashed pb-1">
                  <span class="timeline-indicator-advanced timeline-indicator-success">
                    <i class="ti ti-circle-check"></i>
                  </span>
                  <div class="timeline-event px-0 pb-0">
                    <div class="timeline-header">
                      <small class="text-success text-uppercase fw-medium">sender</small>
                    </div>
                    <h6 class="mb-1">Name</h6>
                    <p class="text-muted mb-0">Location</p>
                  </div>
                </li>
                <li class="timeline-item ps-4 border-transparent">
                  <span class="timeline-indicator-advanced timeline-indicator-primary">
                    <i class="ti ti-map-pin"></i>
                  </span>
                  <div class="timeline-event px-0 pb-0">
                    <div class="timeline-header">
                      <small class="text-primary text-uppercase fw-medium">Receiver</small>
                    </div>
                    <h6 class="mb-1">Name</h6>
                    <p class="text-muted mb-0">Location</p>
                  </div>
                </li>
              </ul>
              <a href="{{ url('/order') }}"> Show all orders </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!--/ Orders by C
@endsection
