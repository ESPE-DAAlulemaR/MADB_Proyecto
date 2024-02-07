<?php

namespace Database\Seeders;

use App\Models\Airline;
use App\Models\Plane;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirlinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Obtén los aviones según el modelo
        $plane1 = Plane::where('model', '737-800')->first();
        $plane2 = Plane::where('model', 'A320')->first();
        $plane3 = Plane::where('model', '747-8')->first();
        $plane4 = Plane::where('model', 'E195')->first();
        $plane5 = Plane::where('model', 'Cessna 172')->first();
        $plane6 = Plane::where('model', '777-300ER')->first();
        $plane7 = Plane::where('model', 'A380')->first();

        // Crea aerolíneas y asocia aviones a su flota
        $airline1 = Airline::create([
            'name' => 'American Airlines',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $airline1->fleet()->associate($plane1);
        $airline1->fleet()->associate($plane2);
        $airline1->fleet()->associate($plane5);
        $airline1->save();

        $airline2 = Airline::create([
            'name' => 'Lufthansa',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $airline2->fleet()->associate($plane3);
        $airline2->fleet()->associate($plane7);
        $airline2->save();

        $airline3 = Airline::create([
            'name' => 'Emirates',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $airline3->fleet()->associate($plane5);
        $airline3->fleet()->associate($plane3);
        $airline3->fleet()->associate($plane7);
        $airline3->save();

        $airline4 = Airline::create([
            'name' => 'Qatar Airways',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $airline4->fleet()->associate($plane4);
        $airline4->fleet()->associate($plane7);
        $airline4->save();

        $airline5 = Airline::create([
            'name' => 'Singapore Airlines',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $airline5->fleet()->associate($plane4);
        $airline5->fleet()->associate($plane6);
        $airline5->fleet()->associate($plane7);
        $airline5->save();
    }
}
