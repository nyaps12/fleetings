@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dashboard')

@section('content')
<!-- Delivery Performance -->
<div class="col-lg-6 col-xxl-4 mb-4 order-2 order-xxl-2">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between mb-2">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Driver Performance</h5>
          <small class="text-muted"></small>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="deliveryPerformance" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="deliveryPerformance">
            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>

          </li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ Delivery Performance -->
  @endsection
