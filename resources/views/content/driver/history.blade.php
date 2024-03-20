@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="nav-align-top">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-new" aria-controls="navs-justified-new"
                            aria-selected="true">Completed</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link " role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-link-preparing" aria-controls="navs-justified-link-preparing"
                            aria-selected="false">Canceled</button>
                    </li>
            </div>
        </div>
    </div>


@endsection
