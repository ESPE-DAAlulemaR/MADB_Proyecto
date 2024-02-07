<?php

namespace Database\Seeders;

use App\Models\Route;
use App\Models\Airport;
use App\Models\Airline;

use Illuminate\Database\Seeder;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtén aeropuertos y aerolíneas existentes
        $airportUIO = Airport::where('code', 'UIO')->first();
        $airportGYE = Airport::where('code', 'GYE')->first();
        $airportCUE = Airport::where('code', 'CUE')->first();
        $airportJFK = Airport::where('code', 'JFK')->first();
        $airportBCN = Airport::where('code', 'BCN')->first();
        $airportBER = Airport::where('code', 'BER')->first();
        $airportHND = Airport::where('code', 'HND')->first();
        $airportCDG = Airport::where('code', 'CDG')->first();
        $airportPEK = Airport::where('code', 'PEK')->first();
        $airportSVO = Airport::where('code', 'SVO')->first();

        $airlineAmerican = Airline::where('name', 'American Airlines')->first();
        $airlineLufthansa = Airline::where('name', 'Lufthansa')->first();
        $airlineEmirates = Airline::where('name', 'Emirates')->first();
        $airlineQatar = Airline::where('name', 'Qatar Airways')->first();
        $airlineSingapore = Airline::where('name', 'Singapore Airlines')->first();

        $route1 = Route::create([
            'distance' => 500,
            'estimated_duration' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $route1->origin()->associate($airportUIO);
        $route1->destination()->associate($airportGYE);
        $route1->airline()->associate($airlineAmerican);
        $route1->save();
        
        $route2 = Route::create([
            'distance' => 300,
            'estimated_duration' => 90,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $route2->origin()->associate($airportGYE);
        $route2->destination()->associate($airportCUE);
        $route2->airline()->associate($airlineLufthansa);
        $route2->save();
        
        $route3 = Route::create([
            'distance' => 700,
            'estimated_duration' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $route3->origin()->associate($airportUIO);
        $route3->destination()->associate($airportCUE);
        $route3->airline()->associate($airlineEmirates);
        $route3->save();
        
        $route4 = Route::create([
            'distance' => 400,
            'estimated_duration' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $route4->origin()->associate($airportCUE);
        $route4->destination()->associate($airportUIO);
        $route4->airline()->associate($airlineQatar);
        $route4->save();
        
        $route5 = Route::create([
            'distance' => 600,
            'estimated_duration' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $route5->origin()->associate($airportGYE);
        $route5->destination()->associate($airportCUE);
        $route5->airline()->associate($airlineSingapore);
        $route5->save();
        
        $route6 = Route::create([
            'distance' => 800,
            'estimated_duration' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $route6->origin()->associate($airportJFK);
        $route6->destination()->associate($airportCDG);
        $route6->airline()->associate($airlineAmerican);
        $route6->save();
        
        $route7 = Route::create([
            'distance' => 1000,
            'estimated_duration' => 20,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $route7->origin()->associate($airportCDG);
        $route7->destination()->associate($airportBER);
        $route7->airline()->associate($airlineLufthansa);
        $route7->save();
        
        $route8 = Route::create([
            'distance' => 1200,
            'estimated_duration' => 25,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $route8->origin()->associate($airportHND);
        $route8->destination()->associate($airportPEK);
        $route8->airline()->associate($airlineEmirates);
        $route8->save();
        
        $route9 = Route::create([
            'distance' => 900,
            'estimated_duration' => 17,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $route9->origin()->associate($airportCDG);
        $route9->destination()->associate($airportSVO);
        $route9->airline()->associate($airlineQatar);
        $route9->save();
        
        $route10 = Route::create([
            'distance' => 1100,
            'estimated_duration' => 22,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $route10->origin()->associate($airportPEK);
        $route10->destination()->associate($airportSVO);
        $route10->airline()->associate($airlineSingapore);
        $route10->save();
        
        $route11 = Route::create([
            'distance' => 900,
            'estimated_duration' => 21,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $route11->origin()->associate($airportBCN);
        $route11->destination()->associate($airportJFK);
        $route11->airline()->associate($airlineLufthansa);
        $route11->save();
    }
}