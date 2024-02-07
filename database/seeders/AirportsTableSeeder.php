<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AirportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::connection('mongodb')->collection('airports')->insert([
            [
                'location' => ['type' => 'Point', 'coordinates' => [-78.3575, -0.1246]],
                'name' => 'Aeropuerto Mariscal Sucre',
                'city' => 'Quito',
                'country' => 'Ecuador',
                'code' => 'UIO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location' => ['type' => 'Point', 'coordinates' => [-79.8804, -2.1576]],
                'name' => 'Aeropuerto José Joaquín de Olmedo',
                'city' => 'Guayaquil',
                'country' => 'Ecuador',
                'code' => 'GYE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location' => ['type' => 'Point', 'coordinates' => [-78.9834, -2.8966]],
                'name' => 'Aeropuerto Mariscal Lamar',
                'city' => 'Cuenca',
                'country' => 'Ecuador',
                'code' => 'CUE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location' => ['type' => 'Point', 'coordinates' => [-74.1687, 40.6413]],
                'name' => 'John F. Kennedy International Airport',
                'city' => 'New York',
                'country' => 'United States',
                'code' => 'JFK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location' => ['type' => 'Point', 'coordinates' => [2.8656, 41.2969]],
                'name' => 'Barcelona–El Prat Airport',
                'city' => 'Barcelona',
                'country' => 'Spain',
                'code' => 'BCN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location' => ['type' => 'Point', 'coordinates' => [13.1469, 52.3826]],
                'name' => 'Berlin Brandenburg Airport',
                'city' => 'Berlin',
                'country' => 'Germany',
                'code' => 'BER',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location' => ['type' => 'Point', 'coordinates' => [139.6917, 35.6895]],
                'name' => 'Haneda Airport',
                'city' => 'Tokyo',
                'country' => 'Japan',
                'code' => 'HND',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location' => ['type' => 'Point', 'coordinates' => [2.2734, 48.8566]],
                'name' => 'Charles de Gaulle Airport',
                'city' => 'Paris',
                'country' => 'France',
                'code' => 'CDG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location' => ['type' => 'Point', 'coordinates' => [114.1577, 51.1242]],
                'name' => 'Beijing Capital International Airport',
                'city' => 'Beijing',
                'country' => 'China',
                'code' => 'PEK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location' => ['type' => 'Point', 'coordinates' => [37.6067, 55.9721]],
                'name' => 'Sheremetyevo International Airport',
                'city' => 'Moscow',
                'country' => 'Russia',
                'code' => 'SVO',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
