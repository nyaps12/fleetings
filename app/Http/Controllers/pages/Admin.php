<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Operator;
use App\Models\Restriction;
use App\Models\VehicleInfo;
use App\Models\Vehiclereport;
use App\Models\FuelReport;
use App\Models\MaintenanceSchedule;
use App\Models\IncidentReport;
use Carbon\Carbon;
use App\Models\Delivery;
use App\Models\Driver;
use App\Models\LMSG43RequestMro;
use Illuminate\Support\Facades\Log;
use Hash;




class Admin extends Controller
{
    public function dashboard()
    {
        // Count of vehicle reports in the current week
        $currentWeekReports = Vehiclereport::whereBetween('created_at', [
            Carbon::now()->startOfWeek(), // Start of the current week
            Carbon::now()->endOfWeek()    // End of the current week
        ])->count();
    
        // Count of vehicle reports in the previous week
        $previousWeekReports = Vehiclereport::whereBetween('created_at', [
            Carbon::now()->startOfWeek()->subWeek(), // Start of the previous week
            Carbon::now()->endOfWeek()->subWeek()    // End of the previous week
        ])->count();
    
        // Calculate the percentage change
        if ($previousWeekReports != 0) {
            $percentageChange = (($currentWeekReports - $previousWeekReports) / $previousWeekReports) * 100;
        } else {
            // Handle division by zero (no reports in the previous week)
            $percentageChange = 0;
        }
    
        // Return the counts and percentage change to the view
        return view('content.admin.dashboard', compact('currentWeekReports', 'previousWeekReports', 'percentageChange'));
    }

    public function scheduling()
    {
        $schedules = Schedule::all();
        $operators = Operator::all();
        return view('content.admin.delivery-scheduling', compact('schedules','operators'));
    }

    public function addsched()
    {
        return view('content.admin.add-sched');
    }

    public function vehicleInfo(Request $request)
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
    
        return view('content.admin.vehicles-information', compact('user', 'vehicle',));
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
        $user = Auth::user();
        
        $drivers = Operator::where('user_id', $user->id)->get();
        $service = MaintenanceSchedule::paginate(10);

        return view('content.admin.vehicle-maintenance', compact('service', 'drivers'));
    }

    public function report()
    {

        return view('content.admin.reports');
    }

    public function performance()
    {
        return view('content.admin.driver-performance');
    }
    
    public function drivers(Request $request)
    {
        $user = Auth::user();
        $query = User::whereNotNull('dlcodes')
        ->whereNotIn('id', [1, 2]);
    
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

    public function delivery()
    {
        $delivery = Delivery::paginate(5);
        return view('content.admin.delivery', compact('delivery'));
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
        return view('content.admin.layout.assign', compact('driver', 'vehicles', 'dlCode'));
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
    
            // Create the operator entry
            $operator = Operator::create([
                'user_id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'vehicle_id' => $vehicle->id,
                'vehicles_id' => $vehicle->vehicle_id,
                'vehicle_brand' => $vehicle->vehicle_brand,
                'plate_number' => $vehicle->plate_number,
                'vehicle_type' => $vehicle->vehicle_type,
                'profile_photo_path' => $user->profile_photo_path,
                'phone' => $user->phone,
                'status' => 'active',
            ]);
    
            // Get the ID of the created operator
            $operatorId = $operator->id;
    
            // Create the driver entry with the operator ID
            Driver::create([
                'driver_id' => $operatorId,
                'fullname' => $user->firstname . ' ' . $user->lastname,
                'email' => $user->email,
                'password' => $user->password, // Assuming you are storing hashed passwords
                'plate_no' => $vehicle->plate_number,
            ]);
    
            // Redirect back to the drivers page with a success message
            return redirect()->route('drivers')->with('success', 'Driver assigned successfully');
            
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }
    
    
    public function cancel($id)
    {
        $driver = Operator::findOrFail($id); // Fetch the DL Code associated with the driver
        return view('content.admin.layout.canceloperator', compact('driver'));
    }  

    public function cancelSuccess(Request $request)
    {
        try {
            // Retrieve the ID from the request payload or query string
            $id = $request->input('id');
        
            // Find the operator by ID
            $operator = Operator::findOrFail($id);
        
            // Log operator information
            Log::info('Operator information: ' . $operator);
        
            // Retrieve the associated driver using the driver_id from the operator
            $driverId = $operator->id;
            $driver = $driverId ? Driver::find($driverId) : null;
            
            // Check if the driver exists
            if (!$driver) {
                throw new \Exception("Driver not found for this operator");
            }
        
            // Retrieve the user associated with the operator
            $user = $operator->user;
        
            // Check if the user exists
            if (!$user) {
                throw new \Exception("User not found for this operator");
            }
        
            // Update the status of the user to 'active'
            $user->update(['status' => 'active']);
        
            // Retrieve the associated vehicle
            $vehicle = $operator->vehicle;
            
            // Check if a vehicle is associated with the operator
            if (!$vehicle) {
                throw new \Exception("Vehicle not found for this operator");
            }
        
            // Update the status of the vehicle to 'available'
            $vehicle->update(['status' => 'available']);
                
            // Delete the operator record
            $operator->delete();
        
            // Delete the driver record
            $driver->delete();
        
            // Redirect back to the desired route with a success message
            return redirect()->route('operator')->with('success', 'Operator and associated driver canceled successfully');
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            Log::error('Error occurred: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }
    
    
    
    
    
    public function profile()
    {
        return view('profile.show');
    }

    public function reported()
    {
        return view('content.admin.driver-reports');
    }

    public function issues()
    {
        return view('content.admin.vehicle-issues');
    }

    public function service()
    {

        $service = MaintenanceSchedule::paginate(10);
        return view('content.admin.service',compact('service'));
    }

    public function schedMaintenance(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'vehicle_type' => 'required|string',
            'engine_no' => 'required|string',
            'issues' => 'required|string',
            'status' => 'required|string', // Include status in validation
            'date_issue' => 'required|date',
            'vehicle_odometer' => 'required|numeric',
            'start_date' => 'nullable|date',
            'completion_date' => 'nullable|date',
        ]);
        
        // Create a new instance of the model
        $service = new MaintenanceSchedule();

        // Set attributes with validated data
        $service->vehicle_type = $validatedData['vehicle_type'];
        $service->engine_no = $validatedData['engine_no'];
        $service->issues = $validatedData['issues'];
        $service->status = $validatedData['status']; // Set status
        $service->date_issue = $validatedData['date_issue'];
        $service->vehicle_odometer = $validatedData['vehicle_odometer'];
        $service->start_date = $validatedData['start_date'] ?? now();
        $service->completion_date = $validatedData['completion_date'];

        // Save the service to the database
        $service->save();
            
        return redirect()->route('service')->with('success', 'Vehicle Maintenance submitted successfully.');
    }
    
    public function maintenanceOverview()
    {
        return view('content.admin.maintenance-overview');
    }

    public function vehicleReport()
    {
        $reports = VehicleReport::paginate(10);
        
        return view('content.admin.vehicles-report', compact('reports'));
    }

    public function fuelReport()
    {
        $fuelreport = FuelReport::paginate(10);
        return view('content.admin.fuels-report', compact('fuelreport'));
    }

    public function incidents()
    {
        $incidents = IncidentReport::paginate(10);
        return view('content.admin.incident-report', compact('incidents'));
    }

    // Assuming you're passing the order ID as a parameter in your route
    public function newSchedule() {
        // Retrieve the order based on the provided ID
        $schedules = Schedule::all();
        
        return view('content.admin.new-sched', compact('schedules'));
    }

    // Assuming you're passing the order ID as a parameter in your route
    public function addSchedule($id) {
        // Retrieve the order based on the provided ID
        $delivery = Delivery::find($id);
        $schedules = Schedule::all();
    
        return view('content.admin.add-sched', compact('schedules', 'delivery'));
    }

    // public function saveSchedule(Request $request)
    // {
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'loc1' => 'required',
    //         'loc2' => 'nullable',
    //         'loc3' => 'required',
    //         'shipment-date' => 'required|date',
    //     ]);

    //     // Create a new Schedule instance
    //     $schedule = new Schedule();
    //     $schedule->start_point = $request->input('loc1');
    //     $schedule->end_point = $request->input('loc3');
    //     $schedule->waypoints = $request->input('loc2');
    //     $schedule->shipping_date = $request->input('shipment-date');
    //     $schedule->status = 'pending'; // Set default status
    //     // Add other fields as necessary
        
    //     // Save the schedule to the database
    //     $schedule->save();

    //     // Optionally, you can return a response to the client
    //     // return response()->json(['message' => 'Schedule added successfully']);
    //     return redirect()->route('add.schedule')->with('success', 'Schedule Created successfully');
    // }

    // public function deliveryList()
    // {
    //     return view('content.admin.deliverylist');
    // }
        

    public function mro()
    {
        
        $requestMro = LMSG43RequestMro::paginate(5);
        return view('content.admin.request-mro', compact('requestMro'));
    }
    public function requestTools(Request $request)
{
    // Validate the incoming request data
    $validated = $request->validate([
        'date' => 'required|date',
        'product' => 'required|string|max:255',
        'quantity' => 'required|numeric',
        'status' => 'required|in:Ongoing,Requested,Completed', 
    ]); 
    
 
    $requestMro = new LMSG43RequestMro([
        'date' => $validated['date'],
        'product' => $validated['product'],
        'quantity' => $validated['quantity'],
        'status' => $validated['status'],
    ]);

    
    $requestMro->save();
    return redirect()->route('request-mro')->with('success', 'MRO request submitted successfully.');
}
    public function sort()
    {
        
       
        return view('content.admin.sorted-out');
    }
}
    
