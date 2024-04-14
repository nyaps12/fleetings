<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'lms_g42_orders'; 
    
    protected $fillable = [
        'supplier_id',
        'order_id',
        'warehouse_id',
        'shipment_type',
        'status',
        'date_received',
        'date_shipped',
    ];
}
