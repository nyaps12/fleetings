<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\VehicleInfo;

class Admin extends Controller
{
    public function dashboard()
    {
        return view('content.admin.dashboard');
    }

    public function scheduling()
    {
        return view('content.admin.delivery-scheduling');
    }

    public function info()
    {
        $user = Auth::user();
        // Retrieve users except superadmin and admin
        $vehicles = VehicleInfo::all();
        return view('content.admin.vehicles-information', compact('user', 'vehicles'));
    }

    public function maintenance()
    {
        return view('content.admin.vehicle-maintenance');
    }


    public function report()
    {
        return view('content.admin.reporting-and-analytics');
    }

    public function performance()
    {
        return view('content.admin.driver-performance');
    }

    public function drivers()
    {
        $user = Auth::user();
        // Retrieve users except superadmin and admin
        $drivers = User::whereNotIn('id', [1, 2])->get();
        return view('content.admin.drivers', compact('user', 'drivers'));
    }

    public function order()
    {
        return view('content.admin.order');
    }

    public function view()
    {
        return view('content.admin.vehicle');
    }

    public function allsched()
    {
        return view('content.admin.all-sched');
    }
    public function onroute()
    {
        return view('content.admin.onroute');
    }

    public function profile()
    {
        return view('profile.show');
    }
}
