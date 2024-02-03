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
        Schema::connection('mongodb')->create('planes', function (Blueprint $collection) {
            $collection->string('model');
            $collection->string('manufacturer');
            $collection->integer('passenger_capacity');
            $collection->integer('cargo_capacity');
            
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('planes');
    }
};
