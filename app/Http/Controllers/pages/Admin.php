<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Operator;
use App\Models\Restriction;
use App\Models\VehicleInfo;

class Admin extends Controller
{
    public function dashboard()
    {
        return view('content.admin.dashboard');
    }

    public function scheduling()
    {
        return view('content.admin.delivery-scheduling');
    }

    public function info()
    {
        $user = Auth::user();
        // Retrieve vehicle based on ID
        $vehicle = VehicleInfo::all();
        return view('content.admin.vehicles-information', compact('user', 'vehicle'));
    }

    public function infodisplay($id)
    {
        $user = Auth::user();
        // Retrieve vehicle based on ID
        $vehicle = VehicleInfo::findOrFail($id);
        return view('content.admin.vehicles-information', compact('user', 'vehicle'));
    }
    

    public function maintenance()
    {
        return view('content.admin.vehicle-maintenance');
    }


    public function report()
    {
        return view('content.admin.reporting-and-analytics');
    }

    public function performance()
    {
        return view('content.admin.driver-performance');
    }

    public function drivers()
    {
        $user = Auth::user();
        // Retrieve users except superadmin and admin
        $drivers = User::whereNotIn('id', [1, 2])->get();
    
        $vehicles = VehicleInfo::all();
        return view('content.admin.drivers', compact('user', 'drivers','vehicles'));
    }

    public function order()
    {
        return view('content.admin.order');
    }

    public function view()
    {
        return view('content.admin.vehicle');
    }

    public function allsched()
    {
        return view('content.admin.all-sched');
    }
    public function onroute()
    {
        return view('content.admin.onroute');
    }

    public function operator()
    {
        $drivers = User::whereNotIn('id', [1, 2])->get();
        $driver = Operator::all();
        return view('content.admin.operator', compact('drivers','driver'));
    }

    public function assign($id)
    {
        $driver = User::findOrFail($id);
        $dlCode = Restriction::findOrFail($driver->dlcodes); // Fetch the DL Code associated with the driver
        $vehicles = VehicleInfo::all();
        return view('content.admin.assign', compact('driver', 'vehicles', 'dlCode'));
    }    

    public function assignSuccess(Request $request)
    {
        // Retrieve the user ID from the request
        $userId = $request->input('user_id');
        
        // Retrieve the vehicle ID from the request
        $vehicleId = $request->input('vehicle_id');
    
        // Find the user and the vehicle
        $user = User::findOrFail($userId);
        $vehicle = VehicleInfo::findOrFail($vehicleId);
    
        // Create a new operator entry
        Operator::create([
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'vehicle_type' => $vehicle->vehicle_type,
            'phone' => $user->phone,
            'status' => 'active',
        ]);
    
        // Update the status of the user to 'inactive'
        $user->update(['status' => 'inactive']);
    
        // Update the status of the vehicle to 'unavailable'
        $vehicle->update(['status' => 'unavailable']);
    
        // Redirect back to the drivers page with a success message
        return redirect()->route('drivers')->with('success', 'Driver assigned successfully');
    }
    
    
    
    
    
    
    
    

    public function profile()
    {
        return view('profile.show');
    }
}
