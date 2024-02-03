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
        Schema::connection('mongodb')->create('flights', function (Blueprint $collection) {
            $collection->datetime('departure_date');
            $collection->datetime('arrival_date');
            $collection->float('price');
            $collection->string('status');
            
            $collection->embedsOne('route');
            $collection->embedsOne('plane');
            
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('flights');
    }
};
