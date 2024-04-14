<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'driver'; // Specifies the name of the database table
    
    protected $fillable = ['driver_id', 'fullname', 'email', 'password', 'plate_no']; // Specifies the mass assignable attributes
    
    protected $primaryKey = 'driver_id'; // Specifies the primary key column
    
}
