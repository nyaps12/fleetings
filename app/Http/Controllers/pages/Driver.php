<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Operator;
use App\Models\Vehiclereport;


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
                    
                    // Retrieve the operators associated with the current user's ID
                    $drivers = Operator::where('user_id', $user->id)->get();
                    
                    // Pass the user data and drivers to the view
                    return view('content.driver.dashboard', compact('user', 'drivers'));
                }
                
                
                
                
                // If the user is not authenticated, redirect them to the login page
                // return redirect()->route('login');
    }
                public function profile()
                {
                    $user = Auth::user();
                    return view('profile.driverprofileshow', compact('user'));
                }

                public function map()
                {
                    return view('content.driver.map');
                }

                public function assignments()
                {
                    return view('content.driver.assignments');
                }

                public function report()
                {
                    return view('content.driver.driver-report');
                }

                public function history()
                {
                    return view('content.driver.history');
                }

                public function vreport()
                {
                    $reports = VehicleReport::all();
                  
                    return view('content.driver.vehicle-report', compact('reports'));
                }

                public function submitReport(Request $request)
                {

                    
                    // Validate the incoming request data
                $validatedData = $request->validate([
                    'date' => 'required|date',
                    'maintenance_cost' => 'nullable|numeric',
                    'maintenance_receipt' => 'nullable|string',
                    'vehicle_condition' => 'required|string',
                    'vehicle_odometer' => 'required|numeric',
                    'vehicle_issues' => 'required|string',

                   
                ]);

                // dd($request->all());
             

                return redirect()->route('content.driver.vehicle-report')->with('success', 'Vehicle report submitted successfully.');
                }

                public function freport()
                {
                    return view('content.driver.fuel-report');
                }

}
