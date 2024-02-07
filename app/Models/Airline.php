<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function fleet()
    {
        return $this->embedsMany(Flight::class, 'fleet');
    }
}
