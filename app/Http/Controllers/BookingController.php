<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Flight;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flights = Flight::all();
        return view('bookings.form', compact('flights'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'passenger_name' => 'required',
            'seat_number' => 'required',
            'status' => 'required',
            
            'flight' => 'required',
        ]);

        $validated['flight'] = Flight::find($validated['flight'])->toArray();

        Booking::create($validated);

        return redirect()->route("bookings.index")->with([
            "message"=> "Registro creado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $flights = Flight::all();
        return view('bookings.form', compact('booking' ,'flights'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $validated = $this->validate($request, [
            'passenger_name' => 'required',
            'seat_number' => 'required',
            'status' => 'required',
            
            'flight' => 'required',
        ]);

        $validated['flight'] = Flight::find($validated['flight'])->toArray();

        $booking->update($validated);

        return redirect()->route("bookings.index")->with([
            "message"=> "Registro actualizado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        
        return redirect()->route("bookings.index")->with([
            "message"=> "Registro actualizado exitosamente",
            "type" => "success"
        ]);
    }
}
