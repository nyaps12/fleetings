<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Driver extends Controller
{
    public function dashboard()
    {
        // $user = Auth::user(); // Retrieve the authenticated user
        // // dd($user);
        // // Pass the user data to the view
        // return view('content.driver.dashboard', compact('user'));

        // return dd();

                // Check if the user is authenticated
                if (Auth::check()) {
                    // Retrieve the authenticated user
                    $user = Auth::user();

                    // // Pass the user data to the view
                    return view('content.driver.dashboard', compact('user'));
                }
                
                // If the user is not authenticated, redirect them to the login page
                // return redirect()->route('login');
    }

    public function profile()
    {
        return view('profile.driverprofileshow');
    }

}
