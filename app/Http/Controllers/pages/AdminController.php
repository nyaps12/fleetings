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
                // return redirect()->route('dashboard.index');
                $route = $this->redirectDash();
                return redirect($route);
            } elseif ($usertype == 'admin') {
                // Redirect to the appropriate admin dashboard
                // return redirect()->route('dashboard');
                $route = $this->redirectDash();
                return redirect($route);
            }
        }

        // If user is not authenticated or usertype is not set or not recognized, redirect to login
        return redirect()->route('login');
    }

    public function redirectDash()
    {
        $redirect = '';

        if(Auth::check()) { // Check if the user is authenticated
            if(Auth::user()->id == 1) { // Check if the user's role is super-admin
                $redirect = '/admin/dashboard'; // Redirect to the super-admin dashboard
            } elseif(Auth::user()->id == 2) { // Check if the user's role is admin
                $redirect = '/admin/dashboard'; // Redirect to the admin dashboard
            }
            else 
            {
                $redirect = '/dashboard'; // Default dashboard route for users with other roles
            }
        } else {
            $redirect = '/login'; // If the user is not authenticated, redirect to the login page
        }
        
        return $redirect;
    }
}