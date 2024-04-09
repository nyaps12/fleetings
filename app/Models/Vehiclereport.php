<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiclereport extends Model
{
    use HasFactory;

    
    protected $table = 'lms_g43_vehicle_report';

    protected $fillable = [
        'date',
        'maintenance_cost',
        'maintenance_receipt',
        'vehicle_type',
        'vehicle_engine_no'.
        'vehicle_condition',
        'vehicle_odometer',
        'vehicle_issues',
        'action',
    ];
}
