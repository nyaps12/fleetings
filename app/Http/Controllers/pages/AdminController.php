<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                // Redirect to the appropriate route for regular users
                return redirect()->route('dashboard.index');
            } elseif ($usertype == 'admin') {
                // Redirect to the appropriate admin dashboard
                return redirect()->route('dashboard');
            }
        }

        // If user is not authenticated or usertype is not set or not recognized, redirect to login
        return redirect()->route('login');
    }
}