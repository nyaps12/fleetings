<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operator;

class DriverContoller extends Controller
{
    public function index()
    {
        $driver = Operator::all();

        if ($driver->isEmpty()) {
            // If no users are found, return a custom response
            $data = [
                'status' => 404,
                'message' => 'No Vehicle found',
            ];
        } else {
            // If users are found, return them in the response
            $data = [
                'status' => 200,
                'driver' => $driver
            ];
        }
        
        // Return JSON response
        return response()->json($data);        
    }
}
