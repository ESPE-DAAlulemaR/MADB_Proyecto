<?php

namespace Database\Seeders;

use App\Models\Flight;
use App\Models\Plane;
use App\Models\Route;
use Illuminate\Database\Seeder;

class FlightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = Route::all()->toArray();

        $statues = [
            'Scheduled',
            'In Progress',
            'Completed',
            'Cancelled'
        ];

        foreach ($routes as $route) {
            $airline = $route['airline'];
            $fleet = $airline['fleet'];

            $aircraft = $fleet[array_rand($fleet)];

            $flight = Flight::create([
                'departure_date' => now()->format('Y/m/d h:i:s'),
                'arrival_date' => now()->addHours($route['estimated_duration'])->format('Y/m/d h:i:s'),
                'price' => rand(100, 1000),
                'status' => $statues[rand(0, count($statues) - 1)]
            ]);

            $flight->route()->associate(Route::find($route['_id']));
            $flight->plane()->associate(Plane::find($aircraft['_id']));
            $flight->save();
        }
    }
}
