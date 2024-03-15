<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Driver extends Controller
{
    public function dashboard()
    {
        $user = Auth::user(); // Retrieve the authenticated user

        // Pass the user data to the view
        return view('content.driver.dashboard', compact('user'));
    }

}
