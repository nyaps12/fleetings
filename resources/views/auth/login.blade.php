@php
    $customizerHidden = 'customizer-hide';
    $configData = Helper::appClasses();
@endphp

@extends('layouts/blankLayout')

@section('title', 'Login')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/pages-auth.js'])
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
                        <h4 class="mb-1 pt-2 text-center">Driver Login</h4>
                        <p class="mb-4 text-center">Please sign-in to your account</p>
                        @if (session('status'))
                            <div class="alert alert-success mb-1 rounded-0" role="alert">
                                <div class="alert-body">
                                    {{ session('status') }}
                                </div>
                            </div>
                        @endif

                        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="login-email" class="form-label">Email</label>
                                <input value="admin43@gmail.com"type="text"
                                    class="form-control @error('email') is-invalid @enderror" id="login-email"
                                    name="email" placeholder="Enter your email or username" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <span class="fw-medium">{{ $message }}</span>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                {{-- <div class="d-flex justify-content-between">
                                    <label class="form-label" for="login-password">Password</label>
                                    <a href="{{ route('password.request') }}">
                                        <small>Forgot Password?</small>
                                    </a>
                                </div> --}}
                                <div class="input-group input-group-merge @error('password') is-invalid @enderror">
                                    <input value="admin123" type="password" id="login-password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <span class="fw-medium">{{ $message }}</span>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember-me">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>


                        {{-- <p class="text-center">
                        <div class="divider my-4">
                            <div class="divider-text">or</div>
                        </div> --}}

                        {{-- <div class="d-flex justify-content-center">
                            <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                                        <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
                                    </a>

                            <div class="text-center">
                                <a href="{{ url('auth/google') }}"><img src="{{ url('assets/img/logo/google.png') }}"
                                        class="img-fluid" width="25px" height="25px" alt="Google Logo"></a>
                            </div>
                            
                                    <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                                        <i class="tf-icons fa-brands fa-twitter fs-5"></i>
                                    </a>
                        </div> --}}
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
@endsection
