<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'distance',
        'estimated_duration'
    ];

    public function origin()
    {
        return $this->embedsOne(Airport::class, 'origin_airport');
    }
    
    public function destination()
    {
        return $this->embedsOne(Airport::class, 'destination_airport');
    }
    
    public function airline()
    {
        return $this->embedsOne(Airline::class, 'airline');
    }
}
