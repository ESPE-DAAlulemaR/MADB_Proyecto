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
        Schema::connection('mongodb')->create('routes', function (Blueprint $collection) {
            $collection->integer('distance');
            $collection->integer('estimated_duration');
            
            $collection->embedsOne('origin_airport');
            $collection->embedsOne('destination_airport');
            $collection->embedsOne('airline');

            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('routes');
    }
};
