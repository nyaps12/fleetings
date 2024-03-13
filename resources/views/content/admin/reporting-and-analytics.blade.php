@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-logistics-dashboard.css')}}" />

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-logistics-dashboard.js')}}"></script>
@endsection
@section('title', 'Reporting and Analytics')

@section('content')

<div class="col-lg-6 col-xxl-6 mb-4 order-3 order-xxl-1">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <div class="card-title mb-0">
        <h5 class="m-0 me-2">Shipment statistics</h5>
        <small class="text-muted">Total number of deliveries 23.8k</small>
      </div>
      <div class="dropdown">
        <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">January</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0);">January</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">February</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">March</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">April</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">May</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">June</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">July</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">August</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">September</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">October</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">November</a></li>
          <li><a class="dropdown-item" href="javascript:void(0);">December</a></li>
        </ul>
      </div>
    </div>
    <div class="card-body">
      <div id="shipmentStatisticsChart"></div>
    </div>
  </div>
</div>

@endsection
