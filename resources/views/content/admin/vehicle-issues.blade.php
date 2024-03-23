@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Vehicle Issues')

@section('content')



    <!-- Project table -->
    <div class="card mb-4">
        <h5 class="card-header">Vehicle Issues</h5>
        <div class="table-responsive mb-3">
            <table class="table datatable-project border-top">
                <thead>
                    <tr>
                        <th class="text-center">Vehicle</th>
                        <th class="text-center">Issue</th>
                        <th class="text-center">Operator</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"> <b> Van</b></td>
                        <td class="text-center">
                            <h6 class=mb-1> <b> Tire Puncture </b> </h6>
                            <p class="text-muted mb-0"> Reported by me </p>
                        </td>
                        <td class="text-center"> <b> Raffy Limbo</b> </td>
                        <td>
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
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /Project table -->


@endsection
