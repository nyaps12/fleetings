<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('content.admin.vehicles-information');
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
        return view('content.admin.drivers');
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

    public function profile()
    {
        return view('profile.show');
    }
}
