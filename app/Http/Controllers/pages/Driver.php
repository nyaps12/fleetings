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
use App\Models\IncidentReport;


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
                    $user = Auth::user();

                    $fuelreport = FuelReport::all();
                    $drivers = Operator::where('user_id', $user->id)->get();
                    return view('content.driver.fuel-report', compact('fuelreport','drivers'));
                }

                public function FuelReport(Request $request)
                {
                    if (Auth::check()) {
                        // Validate the incoming request data
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

                    // Get the authenticated user's ID
                    $userId = Auth::id();
                    
                    // Retrieve the authenticated user's operator record
                    $operator = Operator::where('user_id', $userId)->first();
                    
                    if ($operator) {
                        // Retrieve the vehicle ID associated with the operator
                        $vehicleId = $operator->vehicle_id;

                      // Create a new instance of the model
                $fuelReport = new FuelReport();

                // Set attributes with validated data
                $fuelReport->user_id = $userId;
                $fuelReport->firstname = Auth::user()->firstname;
                $fuelReport->lastname = Auth::user()->lastname;
                $fuelReport->profile_photo_path = Auth::user()->profile_photo_path;
                $fuelReport->vehicle_id = $vehicleId;
                $fuelReport->date = $validatedData['date'];
                $fuelReport->price_per_liter = $validatedData['price_per_liter'];
                $fuelReport->liters = $validatedData['liters'];
                $fuelReport->total_cost = $validatedData['total_cost'];
                $fuelReport->vehicle_odometer = $validatedData['vehicle_odometer'];
                $fuelReport->fuel_type = $validatedData['fuel_type'];
                $fuelReport->fuel_brand = $validatedData['fuel_brand'];
                $fuelReport->fuel_receipt = $validatedData['fuel_receipt']?? null;

                $fuelReport->save();
            
                    
                    // Redirect the user after successful submission
                    return redirect()->route('fuel-report')->with('success', 'Fuel Report submitted successfully.');
                    } else {
                        // If operator record not found, inform the user to contact support
                        return redirect()->route('fuel-report')->with('error', 'Operator record not found. Please contact support.');
                    }
                    } else {
                    // If user is not authenticated, handle accordingly
                    return redirect()->route('login')->with('error', 'You must be logged in to submit a fuel report.');
                    }                                      
                }
                

                public function incident()
                {
                    $user = Auth::user();

                    $incidents = IncidentReport::paginate(10);
                    $drivers = Operator::where('user_id', $user->id)->get();
                    return view('content.driver.incident', compact('incidents', 'drivers'));
                }

                public function submitIncident(Request $request)
                {
                    if (Auth::check()) {
                    // Validate the incoming request data
                    $validatedData = $request->validate([
                        'name' => 'required|string',
                        'phone_number' => 'required|string',
                        'address' => 'required|string',
                        'vehicle' => 'required|string',
                        'vehicle_engine_no' => 'required|string',
                        'incident_date' => 'required|date',
                        'incident_time' => 'required|date_format:H:i',
                        'other_name' => 'required|string',
                        'number' => 'required|string',
                        'other_address' => 'required|string',
                        'incident_location' => 'required|string',
                        'incident_description' => 'required|string',
                        'incident_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);
                
                    // Get the authenticated user's ID
                    $userId = Auth::id();
                    
                    // Retrieve the authenticated user's operator record
                    $operator = Operator::where('user_id', $userId)->first();
                    
                    if ($operator) {
                        // Retrieve the vehicle ID associated with the operator
                        $vehicleId = $operator->vehicle_id;

                    // Create a new instance of the IncidentReport model
                    $incidents = new IncidentReport();
                
                    // Set attributes with validated data
                    $incidents->user_id = $userId;
                    $incidents->firstname = Auth::user()->firstname;
                    $incidents->lastname = Auth::user()->lastname;
                    $incidents->profile_photo_path = Auth::user()->profile_photo_path;
                    $incidents->vehicle_id = $vehicleId;
                    $incidents->name = $validatedData['name'];
                    $incidents->phone_number = $validatedData['phone_number'];
                    $incidents->address = $validatedData['address'];
                    $incidents->vehicle = $validatedData['vehicle'];
                    $incidents->vehicle_engine_no = $validatedData['vehicle_engine_no'];
                    $incidents->incident_date = $validatedData['incident_date'];
                    $incidents->incident_time = $validatedData['incident_time'];
                    $incidents->other_name = $validatedData['other_name'];
                    $incidents->number = $validatedData['number'];
                    $incidents->other_address = $validatedData['other_address'];
                    $incidents->incident_location = $validatedData['incident_location'];
                    $incidents->incident_description = $validatedData['incident_description'];
                    $incidents->incident_photo = $validatedData['incident_photo'];
                
                    // Save the incident report to the database
                    $incidents->save();
                    
                    // Redirect the user after successful submission
                    return redirect()->route('incident')->with('success', 'Incident Report submitted successfully.');
                    } else {
                        // If operator record not found, inform the user to contact support
                        return redirect()->route('incident')->with('error', 'Operator record not found. Please contact support.');
                    }
                    } else {
                    // If user is not authenticated, handle accordingly
                    return redirect()->route('login')->with('error', 'You must be logged in to submit a Incident report.');
                    }       
                
                    }

                    public function faq(){
                        return view('content.driver.pages-faq');
                    }

}