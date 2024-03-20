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

    public function addsched()
    {
        return view('content.admin.add-sched');
    }

    public function info(Request $request)
    {
        $user = Auth::user();
        $query = VehicleInfo::query();
    
        // Filter by vehicle brand
        if ($request->filled('filter-brand')) {
            $brand = $request->input('filter-brand');
            $query->where('vehicle_brand', $brand);
        }
        
        if ($request->filled('filter-type')) {
            $type = $request->input('filter-type');
            $query->where('vehicle_type', $type);
        }
    
        if ($request->filled('filter-status')) {
            $status = $request->input('filter-status');
            $query->where('status', $status);
        }

        if ($request->filled('filter-model')) {
            $model = $request->input('filter-model');
            $query->where('year_model', $type);
        }


        // Execute the query and retrieve the filtered data
        $vehicle = $query->paginate(8);
    
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
    
    public function drivers(Request $request)
    {
        $user = Auth::user();
        $query = User::whereNotIn('id', [1, 2]);
    
        // Filter by name
        if ($request->has('searchInput')) {
            $searchTerm = trim($request->searchInput); // Trim the search input
            $query->where(function ($query) use ($searchTerm) {
                $query->where('firstname', 'like', '%' . $searchTerm . '%')
                      ->orWhere('lastname', 'like', '%' . $searchTerm . '%');
            });
        }
    
        // Filter by status
        if ($request->filled('filter-status')) {
            $status = $request->input('filter-status');
            $query->where('status', $status);
        }
    
        // Continue adding more filters if needed...
    
        // Execute the query and retrieve the filtered data with pagination
        $drivers = $query->paginate(10);
        $vehicles = VehicleInfo::all();
        
        return view('content.admin.drivers', compact('user', 'drivers', 'vehicles'));
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
        $drivers = User::whereNotIn('id', [1, 2])->paginate(10);
        $driver = Operator::paginate(10);
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
        try {
            $id = $request->input('id'); // Assuming 'id' is sent via form or query string
            // Retrieve the selected vehicle_type from the form
            $vehicleType = $request->input('vehicle_type');
    
            // Find the user and the vehicle
            $user = User::findOrFail($id);
            // $vehicle = VehicleInfo::findOrFail($id);   
            $vehicle = VehicleInfo::where('vehicle_type', $vehicleType)->firstOrFail();          
    
            // Update the status of the user to 'inactive'
            $user->update(['status' => 'inactive']);
            
            // Find the vehicle with the corresponding type
            $vehicle->update(['status' => 'unavailable']);

            
            // Create a new operator entry
            Operator::create([
                'id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'vehicle_id' => $vehicle->vehicle_id,
                'vehicle_brand' => $vehicle->vehicle_brand,
                'plate_number' => $vehicle->plate_number,
                'vehicle_type' => $vehicle->vehicle_type,
                'phone' => $user->phone,
                'status' => 'active',
            ]);
    
            // Redirect back to the drivers page with a success message
            return redirect()->route('drivers')->with('success', 'Driver assigned successfully');
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
        /// NEED PA AYUSIN TO HAHAH
    }
    
    
    
    public function profile()
    {
        return view('profile.show');
    }
}
