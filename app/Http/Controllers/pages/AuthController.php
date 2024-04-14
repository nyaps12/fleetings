<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    //
    public function loadRegister()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('register');
    }

    public function loadLogin()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('login');
    }

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
    
            if ($user->hasRole('Super Admin') || $user->hasRole('Admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('Driver')) {
                return redirect()->route('user.dashboard');
            } else {
                // Redirect to the default dashboard route for users with other roles
                return redirect()->route('user.dashboard');
            }
        } else {
            // If user is not authenticated, redirect to login
            return redirect()->route('login');
        }
    }
    

    public function loadDashboard()
    {
        return view('user.dashboard');
    }


    public function redirectDash()
    {
        $redirect = '';

        if(Auth::user() && Auth::user()->role == 1){
            $redirect = 'admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role == 2){
            $redirect = 'admin/dashboard';
        }
        // else if(Auth::user() && Auth::user()->role == 3){
        //     $redirect = 'admin/dashboard';
        // }
        else{
            $redirect = 'driver/dashboard';
        }

        return $redirect;
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}