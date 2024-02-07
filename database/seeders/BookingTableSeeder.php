<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Flight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $flights = Flight::all();

        $statues = [
            'Confirmed',
            'Pending',
            'Cancelled'
        ];

        foreach ($flights as $flight) {
            for ($i = 0; $i < 5; $i++) {
                $booking = Booking::create([
                    'passenger_name' => fake()->name(),
                    'seat_number' => 'A' . ($i + 1),
                    'status' => $statues[rand(0, count($statues) - 1)]
                ]);

                $booking->flight()->associate($flight);
                $booking->save();
            }
        }
    }
}
