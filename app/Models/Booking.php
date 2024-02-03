<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'passenger_name',
        'seat_number',
        'status',
        
        'flight',
    ];
}
