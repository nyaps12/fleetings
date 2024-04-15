<?php

namespace App\Http\Controllers\pages;

use App\Models\Schedule;
use App\Models\LmsG44Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class LMSG44RouteController extends Controller
{
  public function showRoutes()
  {
    $routes = LmsG44Route::paginate(5);
    return view('content.pages.route-planner.pages-routes', ['routes' => $routes]);
  }

  public function saveRoute(Request $request)
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

    $route = new LmsG44Route();
    $route->route_name = $request->input('route-name');
    $route->start_point = $request->input('start-point');
    $route->end_point = $request->input('end-point');
    $route->duration = $request->input('duration');
    $route->distance = $request->input('distance');
    $startCoordinates = $this->getCoordinates($request->input('start-point'));
    $route->start_latitude = $startCoordinates['latitude'];
    $route->start_longitude = $startCoordinates['longitude'];

    $endCoordinates = $this->getCoordinates($request->input('end-point'));
    $route->end_latitude = $endCoordinates['latitude'];
    $route->end_longitude = $endCoordinates['longitude'];

    $waypoints = $request->input('waypoints');
    if ($waypoints) {
      $route->waypoints = json_encode($waypoints);

      $coordinateWaypoints = [];
      foreach ($waypoints as $waypoint) {
        $coordinates = $this->getCoordinates($waypoint);
        $coordinateWaypoints[] = "\"{$coordinates['latitude']}, {$coordinates['longitude']}\"";
      }
      $route->coordinate_waypoints = "[" . implode(', ', $coordinateWaypoints) . "]";
    }

    $route->status = 'Unoptimized';
    $route->save();

    return response()->json(['message' => 'Route saved successfully'], 200);
  }


  private function getCoordinates($address)
  {
    $apiKey = 'AIzaSyDQ7i1-nzWroLzQFBJlFvSypqXhXoc3kGU';
    $formattedAddress = urlencode($address);
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$formattedAddress}&key={$apiKey}";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    $coordinates = [
      'latitude' => $data['results'][0]['geometry']['location']['lat'],
      'longitude' => $data['results'][0]['geometry']['location']['lng']
    ];

    return $coordinates;
  }

  public function getRouteDetails($id)
  {
    $route = LmsG44Route::findOrFail($id);
    return response()->json($route);
  }
}
