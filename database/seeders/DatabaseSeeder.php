<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,

            AirportsTableSeeder::class,
            PlanesTableSeeder::class,
            AirlinesTableSeeder::class,
            RoutesTableSeeder::class,
            FlightTableSeeder::class,
            BookingTableSeeder::class
        ]);
    }
}
