<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airports = Airport::all();
        return view('airports.index', compact('airports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('airports.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'code' => 'required',
        ]);

        Airport::create($validated);

        return redirect()->route("airports.index")->with([
            "message"=> "Registro creado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Airport $airport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Airport $airport)
    {
        return view('airports.form', compact('airport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Airport $airport)
    {
        $validated = $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'code' => 'required',
        ]);

        $airport->update($validated);

        return redirect()->route("airports.index")->with([
            "message"=> "Registro actualizado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airport $airport)
    {
        $airport->delete();
        
        return redirect()->route("airports.index")->with([
            "message"=> "Registro eliminado exitosamente",
            "type" => "success"
        ]);
    }
}
