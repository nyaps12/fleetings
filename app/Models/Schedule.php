<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $fillable = [
        'order_id',
        'user_id',
        'driver_name',
        'shipping_date',
        'route_name',
        'start_point',
        'end_point',
        'waypoints',
        ];
}
