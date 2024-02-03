<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'distance',
        'estimated_duration',
        
        'origin_airport',
        'destination_airport',
        'airline',
    ];
}
