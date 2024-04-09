<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelReport extends Model
{
    use HasFactory;

    protected $table = 'lms_g43_fuel_report';

    protected $fillable = [
        'date',
        'price_per_liter',
        'liters',
        'total_cost',
        'vehicle_odometer',
        'fuel_type',
        'fuel_brand',
        'receipt_image',
    ];
}
