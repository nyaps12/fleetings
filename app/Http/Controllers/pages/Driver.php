<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Driver extends Controller
{
    public function dashboard()
    {
        return view('content.driver.dashboard');
    }

}
