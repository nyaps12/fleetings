@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
@endphp

@extends('layouts/blankLayout')

@section('title', 'Forgot Password')

@section('page-style')
<!-- Page -->
@vite('resources/assets/vendor/scss/pages/page-auth.scss')
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
          <!-- Login -->
          <div class="card">
              <div class="card-body">
                  <!-- Logo -->
                  <div class="app-brand justify-content-center mb-4 mt-2">
                      <a href="{{ url('/') }}" class="app-brand-link gap-2">
                          <span class="mt-4"><img src="{{ asset('assets\img\logo\bbox-express-logo.png') }}"
                                  alt="logo" width="45" height="45"
                                  style="margin-top: -25px; margin-left: -25px" /></span>
                          <span
                              class="app-brand-text demo text-body fw-bold ms-1">{{ config('variables.templateName') }}</span>
                      </a>
                  </div>
                  <!-- /Logo -->
                  <h3 class="mb-1 text-center">Forgot Password?</h3>
                  <p class="mb-4 text-center">Enter your email and we'll send you to reset your password</p>
                  @if (session('status'))
                  <div class="mb-1 text-success">
                    {{ session('status') }}
                  </div>
                  @endif
                  <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="john@example.com" autofocus>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <span class="fw-medium">{{ $message }}</span>
                      </span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary d-grid w-100">Send Reset Link</button>
                  </form>
                  <div class="text-center">
                    @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                      <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                      Back to login
                    </a>
                    @endif
                  </div>
              </div>
          </div>
          <!-- /Register -->
      </div>
  </div>
</div>

@endsection