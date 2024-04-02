<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operator;
use App\Models\User;
use App\Models\VehicleInfo;

class DriverContoller extends Controller
{
    //DRIVER USERS
    public function vehicle()
    {
        $driver = VehicleInfo::all();

        if ($driver->isEmpty()) {
            // If no users are found, return a custom response
            $data = [
                'status' => 404,
                'message' => 'No vehicle found',
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

    //DRIVER USERS
    public function users()
    {
        $driver = User::all();

        if ($driver->isEmpty()) {
            // If no users are found, return a custom response
            $data = [
                'status' => 404,
                'message' => 'No Driver found',
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

    //DRIVER OPERATOR
    public function operator()
    {
        $driver = Operator::all();

        if ($driver->isEmpty()) {
            // If no users are found, return a custom response
            $data = [
                'status' => 404,
                'message' => 'No Driver found',
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

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validator->fails())
        {

            $data=[
                "status" => 422,
                "message"=>$validator->messages()
            ];

            return response()->json($data,422);
        }
        else
        {
            $user = new User;

            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;

            $user->save();
            
            $data=[
                'status'=>200,
                'message'=>'Data uploaded successfully'
            ];
            return response()->json($data,200);
        }
    
    }

    public function edit(Request $request, $id)
    {

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validator->fails())
        {
    
            $data=[
                "status" => 422,
                "message"=>$validator->messages()
            ];
    
            return response()->json($data,422);
        }
        else
        {
            $user =User::find($id);
    
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;
    
            $user->save();
                
            $data=[
                'status'=>200,
                'message'=>'Data updated successfully'
            ];
            return response()->json($data,200);
        }

    }

    public function delete($id)
    {
        $user = User::find($id);
        
        $user->delete();

        $data=[
            'status' => 200,
            'message' => "data deleted successfully"
        ];
        return response()->json($data, 200);        
    }

    public function patch(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            $data = [
                'status' => 404,
                'message' => 'User not found'
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'email' => 'email',
            'password' => 'string' // You might want to add more validation rules for password
        ]);

        if ($validator->fails()) {
            $data = [
                "status" => 422,
                "message" => $validator->messages()
            ];
            return response()->json($data, 422);
        }

        // Update only the provided fields
        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        if ($request->filled('email')) {
            $user->email = $request->email;
        }

        if ($request->filled('password')) {
            $user->password = $request->password;
        }

        $user->save();

        $data = [
            'status' => 200,
            'message' => 'Data updated successfully'
        ];
        return response()->json($data, 200);
    }
}
