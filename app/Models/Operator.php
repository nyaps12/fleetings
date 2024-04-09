<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $table = 'lms_g43_operators';

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'vehicle_id',
        'vehicles_id',
        'vehicle_brand',
        'plate_number',
        'vehicle_type',
        'profile_photo_path',
        'phone',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }    

    public function vehicle()
    {
        return $this->belongsTo(VehicleInfo::class, 'vehicle_id');
    }   
}
