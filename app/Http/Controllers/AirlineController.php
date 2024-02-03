<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Plane;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airlines = Airline::all();
        return view('airlines.index', compact('airlines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aircrafts = Plane::all();
        return view('airlines.form', compact('aircrafts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required',
            'fleet' => 'required|array'
        ]);

        $fleetArr = $validated['fleet'];
        unset($validated['fleet']);

        $airline = Airline::create($validated);
        $aux = [];
        
        foreach ($fleetArr as $planeId)
        array_push($aux, Plane::find($planeId)->toArray());
    
        $airline->fleet = $aux;
        $airline->save();

        return redirect()->route("airlines.index")->with([
            "message"=> "Registro creado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Airline $airline)
    {
        return view('airlines.show', compact('airline'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Airline $airline)
    {
        $aircrafts = Plane::all();
        return view('airlines.form', compact('airline', 'aircrafts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Airline $airline)
    {
        $validated = $this->validate($request, [
            'name' => 'required',
            'fleet' => 'required|array'
        ]);

        $fleetArr = $validated['fleet'];
        unset($validated['fleet']);

        $airline->update($validated);

        $aux = [];
        foreach ($fleetArr as $planeId)
            array_push($aux, Plane::find($planeId)->toArray());

        $airline->fleet = $aux;
        $airline->save();

        return redirect()->route("airlines.index")->with([
            "message"=> "Registro actualizado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airline $airline)
    {
        $airline->delete();

        return redirect()->route('airlines.index')->with([
            "message"=> "Registro eliminado exitosamente",
            "type" => "success"
        ]);
    }
}
