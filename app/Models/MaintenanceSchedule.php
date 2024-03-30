<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceSchedule extends Model
{
    use HasFactory;

    protected $table = 'maintenance_schedule';

    protected $fillable = [
        'operator_id',
        'vehicle_type',
        'engine_no',
        'total_cost',
        'issues',
        'status',
        'date_issue',
        'vehicle_odometer',
        'start_date',
        'completion_date',
    ];
}
