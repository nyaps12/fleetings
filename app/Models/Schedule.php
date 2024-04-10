<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'lms_g43_schedules';

    protected $fillable = [
        'schedule_id',
        'order_id',
        'driver_name',
        'shipping_date',
        'sender_name',
        'sender_phone',
        'sender_address',
        'receiver_name',
        'receiver_phone',
        'receiver_address',
        'product',
        'product_price',
        'product_quantity',
        'start_point',
        'end_point',
        'waypoints',
        ];
}
