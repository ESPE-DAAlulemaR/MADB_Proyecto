<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PlanesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::connection('mongodb')->collection('planes')->insert([
            [
                'model' => '737-800',
                'manufacturer' => 'Boeing',
                'passenger_capacity' => 189,
                'cargo_capacity' => 23000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'A320',
                'manufacturer' => 'Airbus',
                'passenger_capacity' => 150,
                'cargo_capacity' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => '747-8',
                'manufacturer' => 'Boeing',
                'passenger_capacity' => 467,
                'cargo_capacity' => 140000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'E195',
                'manufacturer' => 'Embraer',
                'passenger_capacity' => 146,
                'cargo_capacity' => 4800,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'Cessna 172',
                'manufacturer' => 'Cessna',
                'passenger_capacity' => 4,
                'cargo_capacity' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => '777-300ER',
                'manufacturer' => 'Boeing',
                'passenger_capacity' => 396,
                'cargo_capacity' => 185000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'A380',
                'manufacturer' => 'Airbus',
                'passenger_capacity' => 853,
                'cargo_capacity' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
