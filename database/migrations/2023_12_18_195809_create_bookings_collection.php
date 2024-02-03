<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

use MongoDB\Laravel\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mongodb')->create('bookings', function (Blueprint $collection) {
            $collection->string('passenger_name');
            $collection->string('seat_number');
            $collection->string('status');
            
            $collection->embedsOne('flight');
            
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('bookings');
    }
};
