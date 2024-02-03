<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Plane;
use App\Models\Route;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::all();
        return view('flights.index', compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = Route::all();
        $planes = Plane::all();
        return view('flights.form', compact('routes', 'planes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'departure_date' => 'required',
            'arrival_date' => 'required',
            'price' => 'required',
            'status' => 'required',
            
            'route' => 'required',
            'plane' => 'required',
        ]);

        $validated['route'] = Route::find($validated['route'])->toArray();
        $validated['plane'] = Plane::find($validated['plane'])->toArray();

        Flight::create($validated);

        return redirect()->route("flights.index")->with([
            "message"=> "Registro creado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flight $flight)
    {
        $routes = Route::all();
        $planes = Plane::all();
        return view('flights.form', compact('flight' ,'routes', 'planes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flight $flight)
    {
        $validated = $this->validate($request, [
            'departure_date' => 'required',
            'arrival_date' => 'required',
            'price' => 'required',
            'status' => 'required',
            
            'route' => 'required',
            'plane' => 'required',
        ]);

        $validated['route'] = Route::find($validated['route'])->toArray();
        $validated['plane'] = Plane::find($validated['plane'])->toArray();

        $flight->update($validated);

        return redirect()->route("flights.index")->with([
            "message"=> "Registro actualizado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();

        return redirect()->route("flights.index")->with([
            "message"=> "Registro eliminado exitosamente",
            "type" => "success"
        ]);
    }
}
