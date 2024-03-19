<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;
    protected $table = 'operators';
    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'vehicle_id',
        'vehicle_brand',
        'plate_number',
        'vehicle_type',
        'phone',
        'status',
    ];
}
