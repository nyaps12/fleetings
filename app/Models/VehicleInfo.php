<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleInfo extends Model
{
    use HasFactory;

    protected $table = 'vehicle_info';

    protected $fillable = [
        'vehicle_id',
        'year_model',
        'vehicle_type',
        'plate_number',
        'load_capacity',
        'status', // Include the status field here
        'profile_photo_path',
        'engine_number',
        'chassis_number'
    ];
    
}
