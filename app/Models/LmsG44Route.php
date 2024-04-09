<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LmsG44Route extends Model
{
  use HasFactory;

  protected $table = 'lms_g44_routes';

  protected $fillable = [
    'route_name',
    'start_point',
    'start_longitude',
    'start_latitude',
    'end_point',
    'end_longitude',
    'end_latitude',
    'waypoints',
    'coordinate_waypoints',
    'duration',
    'distance',
    'status',
    'alternative_route',
    'avoid_tolls',
    'avoid_highways',
    'avoid_ferries',
    'avoid_indoor',
  ];
}
