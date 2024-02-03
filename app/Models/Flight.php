<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'departure_date',
        'arrival_date',
        'price',
        'status',
        
        'route',
        'plane',
    ];
}
