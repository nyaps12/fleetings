<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentReport extends Model
{
    use HasFactory;

    protected $table = 'incidents_report';

    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'vehicle',
        'vehicle_engine_no',
        'incident_date',
        'incident_time',
        'other_name',
        'number',
        'other_address',
        'incident_location',
        'incident_description',
        'incident_photo',
    ];
}