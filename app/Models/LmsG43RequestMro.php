<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LmsG43RequestMro extends Model
{
    use HasFactory;

    protected $table = 'lms_g43_request_mro'; // Explicitly defining the table name

    protected $fillable = [
        'date',
        'product',
        'quantity',
        'status',
    ];
}
