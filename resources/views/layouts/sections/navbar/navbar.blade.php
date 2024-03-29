@php
    $containerNav = $configData['contentLayout'] === 'compact' ? 'container-xxl' : 'container-fluid';
    $navbarDetached = $navbarDetached ?? '';
@endphp

<!-- Navbar -->
@if (isset($navbarDetached) && $navbarDetached == 'navbar-detached')
    <nav class="layout-navbar {{ $containerNav }} navbar navbar-expand-xl {{ $navbarDetached }} align-items-center bg-navbar-theme"
        id="layout-navbar">
@endif
@if (isset($navbarDetached) && $navbarDetached == '')
    <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="{{ $containerNav }}">
@endif

<!--  Brand demo (display only for navbar-full and hide on below xl) -->
@if (isset($navbarFull))
    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="{{ url('/admin/dashboard') }}" class="app-brand-link gap-2">
            <img src="{{ asset('assets\img\logo\bbox-express-logo.png') }}" alt="logo" width="45" height="45"
                style="margin-top: 2px; margin-left: 15px" /></span>
            <span class="app-brand-text demo menu-text fw-bold">{{ config('variables.templateName') }}</span>
        </a>
    </div>
@endif

<!-- ! Not required for layout-without-menu -->
@if (!isset($navbarHideToggle))
    <div
        class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ? ' d-xl-none ' : '' }}">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>
@endif

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

    @if ($configData['hasCustomizer'] == true)
        <!-- Style Switcher -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class='ti ti-md'></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-start dropdown-styles">
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                            <span class="align-middle"><i class='ti ti-sun me-2'></i>Light</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                            <span class="align-middle"><i class="ti ti-moon me-2"></i>Dark</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                            <span class="align-middle"><i class="ti ti-device-desktop me-2"></i>System</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--/ Style Switcher -->
    @endif

    <ul class="navbar-nav flex-row align-items-center ms-auto">


        @if (Auth::check() && (Auth::user()->id != 1 && Auth::user()->id != 2))
            <!-- Notification -->
            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-expanded="false">
                    <i class="ti ti-bell ti-md"></i>
                    {{-- <span class="badge bg-danger rounded-pill badge-notifications">5</span> --}}
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h5 class="text-body mb-0 me-auto">Notification</h5>
                            <a href="javascript:void(0)" class="dropdown-notifications-all text-body"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i
                                    class="ti ti-mail-opened fs-4"></i></a>
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container">

                    </li>
                    <li class="dropdown-menu-footer border-top">
                        <a href="javascript:void(0);"
                            class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                            View all notifications
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ Notification -->
        @endif




        <!-- User -->

        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="{{ Auth::user() ? Auth::user()->profile_photo_path : asset('../assets/img/avatars/admin.png') }}"
                        alt class="h-auto rounded-circle border">
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item"
                        href="{{ Route::has('profile.show') ? route('profile.show') : 'javascript:void(0);' }}">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="{{ Auth::user() ? Auth::user()->profile_photo_path : asset('../assets/img/avatars/admin.png') }}"
                                         alt=""
                                         class="h-auto rounded-circle">
                                </div>                                
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-medium d-block">
                                    @if (Auth::check())
                                    @if (Auth::user()->firstname && Auth::user()->lastname)
                                        {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                                    @else
                                        {{ Auth::user()->name ?? 'NULL' }}
                                    @endif
                                @else
                                    <span class="text-muted">NULL</span>
                                @endif                                
                                </span>
                                @if (Auth::check())
                                    @if (Auth::user()->id == 1)
                                        <small class="text-muted">Superadmin</small>
                                    @elseif (Auth::user()->id == 2)
                                        <small class="text-muted">Admin</small>
                                    @else
                                        <small class="text-muted">Driver</small>
                                    @endif
                                @else
                                    <!-- Handle the case where the user is not authenticated -->
                                @endif


                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    @if (auth()->user() && in_array(auth()->user()->id, [1, 2]))
                        <a class="dropdown-item"
                            href="{{ Route::has('profile.show') ? route('profile.show') : 'javascript:void(0);' }}">
                            <i class="ti ti-user-circle me-2 ti-sm"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    @else
                        <a class="dropdown-item"
                            href="{{ Route::has('profile') ? route('profile') : 'javascript:void(0);' }}">
                            <i class="ti ti-user-circle me-2 ti-sm"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    @endif

                </li>
                <li>
                    @if (Auth::check())
                        @if (Auth::user()->id == 1)
                            <a class="dropdown-item"
                                href="{{ Route::has('users.index') ? route('users.index') : 'javascript:void(0);' }}">
                                <i class="ti ti-users-group me-2 ti-sm"></i>
                                <span class="align-middle">Roles</span>
                            </a>
                        @elseif (Auth::user()->id == 2)
                            <a class="dropdown-item"
                                href="{{ Route::has('users.index') ? route('users.index') : 'javascript:void(0);' }}">
                                <i class="ti ti-users-group me-2 ti-sm"></i>
                                <span class="align-middle">Roles</span>
                            </a>
                        @endif
                    @endif

                </li>
                @if (Auth::check() && Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <li>
                        <a class="dropdown-item" href="{{ route('api-tokens.index') }}">
                            <i class='ti ti-key me-2 ti-sm'></i>
                            <span class="align-middle">API Tokens</span>
                        </a>
                    </li>
                @endif
                @if (Auth::User() && Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <h6 class="dropdown-header">Manage Team</h6>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item"
                            href="{{ Auth::user() ? route('teams.show', Auth::user()->currentTeam->id) : 'javascript:void(0)' }}">
                            <i class='ti ti-settings me-2'></i>
                            <span class="align-middle">Team Settings</span>
                        </a>
                    </li>
                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <li>
                            <a class="dropdown-item" href="{{ route('teams.create') }}">
                                <i class='ti ti-user me-2'></i>
                                <span class="align-middle">Create New Team</span>
                            </a>
                        </li>
                    @endcan
                    @if (Auth::user()->allTeams()->count() > 1)
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <h6 class="dropdown-header">Switch Teams</h6>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                    @endif
                    @if (Auth::user())
                        @foreach (Auth::user()->allTeams() as $team)
                            {{-- Below commented code read by artisan command while installing jetstream. !! Do not remove if you want to use jetstream. --}}

                            <x-switchable-team :team="$team" />
                        @endforeach
                    @endif
                @endif
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                @if (Auth::check())
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class='ti ti-logout me-2'></i>
                        <span class="align-middle">Logout</span>
                    </a>
                </li>
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                </form>
            @else            
                    <li>
                        <a class="dropdown-item"
                            href="{{ Route::has('login') ? route('login') : url('auth/login-basic') }}">
                            <i class='ti ti-login me-2'></i>
                            <span class="align-middle">Login</span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
        <!--/ User -->
    </ul>
</div>

@if (!isset($navbarDetached))
    </div>
@endif
</nav>
<!-- / Navbar -->
