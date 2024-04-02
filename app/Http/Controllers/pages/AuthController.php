<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function index()
    {
        // if (Auth::check()) {
        //     $usertype = Auth()->user()->usertype;

        //     if ($usertype == 'user') {
        //         // Redirect to the appropriate route for regular users
        //         // return redirect()->route('dashboard.index');
        //         $route = $this->redirectDash();
        //         return redirect($route);
        //     } elseif ($usertype == 'admin') {
        //         // Redirect to the appropriate admin dashboard
        //         // return redirect()->route('dashboard');
        //         $route = $this->redirectDash();
        //         return redirect($route);
        //     }
        // }

        // // If user is not authenticated or usertype is not set or not recognized, redirect to login
        // return redirect()->route('login');
        // test2
        // Authenticate the user
        // if (Auth::check()) {
        //     // Generate a token for the authenticated user
        //     $accessToken = Auth::user()->createToken('MyAppToken')->accessToken;
            
        //     // Get the user's usertype
        //     $usertype = Auth::user()->usertype;

        //     // Redirect based on the user's usertype
        //     if ($usertype == 'user') {
        //         // Redirect to the appropriate route for regular users
        //         return redirect()->route('user.dashboard')->with('access_token', $accessToken);
        //     } elseif ($usertype == 'admin') {
        //         // Redirect to the appropriate admin dashboard
        //         return redirect()->route('admin.dashboard')->with('access_token', $accessToken);
        //     }
        // }
        
        // // If user is not authenticated or usertype is not recognized, redirect to login
        // return redirect()->route('login');

        //test3
        // Check if the user submitted the login form
        // $email = $request->input('email');
        // $password = $request->input('password');
        // $remember = $request->has('remember');

        // if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
        //     // Authentication successful
        //     // Generate a token for the authenticated user
        //     $accessToken = Auth::user()->createToken('MyAppToken')->accessToken;
            
        //     // Get the user's usertype
        //     $usertype = Auth::user()->usertype;

        //     // Redirect based on the user's usertype
        //     if ($usertype == 'user') {
        //         // Redirect to the appropriate route for regular users
        //         return redirect()->route('user.dashboard')->with('access_token', $accessToken);
        //     } elseif ($usertype == 'admin') {
        //         // Redirect to the appropriate admin dashboard
        //         return redirect()->route('admin.dashboard')->with('access_token', $accessToken);
        //     }
        // } else {
        //     // Authentication failed
        //     // Handle invalid credentials or other login failure scenarios
        //     // For example, redirect back to the login page with an error message
        //     return redirect()->route('login')->with('error', 'Invalid email or password');
        // }
        // test4

        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();
            
            // Generate a token for the authenticated user
            $accessToken = $user->createToken('MyAppToken')->accessToken;
            
            // Get the user's roles
            $roles = $user->getRoleNames();
            
            // Redirect based on the user's roles
            if ($roles->contains('Admin') || $roles->contains('Super Admin')) {
                // Redirect to the appropriate admin dashboard with access token and welcome message
                return redirect()->route('admin.dashboard')->with(['access_token' => $accessToken, 'welcome_message' => "Welcome, {$user->name}!"]);
            } elseif ($roles->contains('Driver')) {
                // Redirect to the appropriate dashboard for drivers with access token and welcome message
                return redirect()->route('user.dashboard')->with(['access_token' => $accessToken, 'welcome_message' => "Welcome, {$user->name}!"]);
            } else {
                // Redirect to the login page if user role is not recognized
                return redirect()->route('login');
            }
        }
        
        
        // If user is not authenticated, redirect to login
        return redirect()->route('login');
    }

    public function logout()
    {
        // Revoke the user's access token
        Auth::user()->tokens->each(function ($token) {
            $token->delete();
        });

        // Perform the logout action
        Auth::logout();

        // Redirect to the login page or any other page as needed
        return redirect()->route('login');
    }

    public function redirectDash()
    {
        $redirect = '';
    
        if(Auth::check()) { // Check if the user is authenticated
            if(Auth::user()->hasRole('Super Admin')) { // Check if the user's role is super-admin
                $redirect = 'admin/dashboard'; // Redirect to the super-admin dashboard
            } elseif(Auth::user()->hasRole('Admin')) { // Check if the user's role is admin
                $redirect = 'admin/dashboard'; // Redirect to the admin dashboard
            } elseif(Auth::user()->hasRole('Driver')) { // Check if the user's role is driver
                $redirect = 'dashboard'; // Redirect to the driver dashboard
            } else {
                $redirect = 'dashboard'; // Default dashboard route for users with other roles
            }
        } else {
            $redirect = '/login'; // If the user is not authenticated, redirect to the login page
        }
        
        return $redirect;
    }    
}