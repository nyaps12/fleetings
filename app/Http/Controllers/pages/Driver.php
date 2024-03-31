<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Operator;
use App\Models\Vehiclereport;
use App\Models\FuelReport;
use App\Models\MaintenanceSchedule;


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
                    $user = Auth::user();


                    $reports = VehicleReport::all();
                    $drivers = Operator::where('user_id', $user->id)->get();
                    return view('content.driver.vehicle-report', compact('reports','drivers'));
                }

                public function submitReport(Request $request)
                {    
                    if (Auth::check()) {
                        // Validate the incoming request data
                        $validatedData = $request->validate([
                            'date' => 'required|date',
                            'maintenance_cost' => 'nullable|numeric',
                            'maintenance_receipt' => 'nullable|string',
                            'engine_no' => 'required|string',
                            'vehicle_type' => 'required|string',
                            'vehicle_condition' => 'required|string',
                            'vehicle_odometer' => 'required|numeric',
                            'vehicle_issues' => 'required|string',
                        ]);
                    
                        // Get the authenticated user's ID
                        $userId = Auth::id();
                    
                        // Retrieve the authenticated user's operator record
                        $operator = Operator::where('user_id', $userId)->first();
                    
                        if ($operator) {
                            // Retrieve the vehicle ID associated with the operator
                            $vehicleId = $operator->vehicle_id;
                    
                            // Create a new instance of the model
                            $report = new Vehiclereport();
                    
                            // Set attributes with validated data
                            $report->date = $validatedData['date'];
                            $report->user_id = $userId;
                            $report->firstname = Auth::user()->firstname;
                            $report->lastname = Auth::user()->lastname;
                            $report->profile_photo_path = Auth::user()->profile_photo_path;
                            $report->vehicle_id = $vehicleId;
                            $report->maintenance_cost = $validatedData['maintenance_cost'] ?? null;
                            $report->maintenance_receipt = $validatedData['maintenance_receipt'] ?? null;
                            $report->vehicle_type = $validatedData['vehicle_type'];
                            $report->vehicle_engine_no = $validatedData['engine_no'];
                            $report->vehicle_condition = $validatedData['vehicle_condition'];
                            $report->vehicle_odometer = $validatedData['vehicle_odometer'];
                            $report->vehicle_issues = $validatedData['vehicle_issues'];
                    
                            // Save the report to the database
                            $report->save();
                    
                            // Redirect the user after successful submission
                            return redirect()->route('vehicle-report')->with('success', 'Vehicle report submitted successfully.');
                        } else {
                            // If operator record not found, inform the user to contact support
                            return redirect()->route('vehicle-report')->with('error', 'Operator record not found. Please contact support.');
                        }
                    } else {
                        // If user is not authenticated, handle accordingly
                        return redirect()->route('login')->with('error', 'You must be logged in to submit a vehicle report.');
                    }                                      
                    
                }

                public function freport()
                {

                    $fuelreport = FuelReport::all();
                    return view('content.driver.fuel-report', compact('fuelreport'));
                }

                public function FuelReport(Request $request)
                {
                    $validatedData = $request->validate([
                        'date' => 'required|date',
                        'price_per_liter' => 'required|numeric',
                        'liters' => 'required|numeric',
                        'total_cost' => 'required|numeric',
                        'vehicle_odometer' => 'required|numeric',
                        'fuel_type' => 'required|string',
                        'fuel_brand' => 'required|string',
                        'fuel_receipt' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image upload
                    ]);

                    // dd($validatedData);

                      // Create a new instance of the model
                $fuelReport = new FuelReport();

                // Set attributes with validated data
                $fuelReport->date = $validatedData['date'];
                $fuelReport->price_per_liter = $validatedData['price_per_liter'];
                $fuelReport->liters = $validatedData['liters'];
                $fuelReport->total_cost = $validatedData['total_cost'];
                $fuelReport->vehicle_odometer = $validatedData['vehicle_odometer'];
                $fuelReport->fuel_type = $validatedData['fuel_type'];
                $fuelReport->fuel_brand = $validatedData['fuel_brand'];
                $fuelReport->fuel_receipt = $validatedData['fuel_receipt']?? null;

                $fuelReport->save();
            
                    


                    return redirect()->route('fuel-report')->with('success', 'Vehicle report submitted successfully.');
                }

}
