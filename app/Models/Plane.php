<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Plane extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'manufacturer',
        'passenger_capacity',
        'cargo_capacity'
    ];
}
