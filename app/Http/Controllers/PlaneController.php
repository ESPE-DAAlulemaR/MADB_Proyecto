<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Plane;
use Illuminate\Http\Request;

class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planes = Plane::all();
        return view('planes.index', compact('planes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $airports = Airport::all();
        return view('planes.form', compact('airports'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'model' => 'required',
            'manufacturer' => 'required',
            'passenger_capacity' => 'required',
            'cargo_capacity' => 'required',
        ]);

        Plane::create($validated);

        return redirect()->route("planes.index")->with([
            "message"=> "Registro creado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Plane $plane)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plane $plane)
    {
        $airports = Airport::all();
        return view('planes.form', compact('plane', 'airports'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plane $plane)
    {
        $validated = $this->validate($request, [
            'model' => 'required',
            'manufacturer' => 'required',
            'passenger_capacity' => 'required',
            'cargo_capacity' => 'required',
        ]);

        $plane->update($validated);

        return redirect()->route("planes.index")->with([
            "message"=> "Registro actualizado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plane $plane)
    {
        $plane->delete();

        return redirect()->route("planes.index")->with([
            "message"=> "Registro eliminado exitosamente",
            "type" => "success"
        ]);
    }
}
