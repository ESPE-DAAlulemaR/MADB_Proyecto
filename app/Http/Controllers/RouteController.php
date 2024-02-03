<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = Route::all();
        return view('routes.index', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $airports = Airport::all();
        $airlines = Airline::all();
        return view('routes.form', compact('airports', 'airlines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'distance' => 'required',
            'estimated_duration' => 'required',
        
            'origin_airport' => 'required',
            'destination_airport' => 'required',
            'airline' => 'required'
        ]);

        $validated['origin_airport'] = Airport::find($validated['origin_airport'])->toArray();
        $validated['destination_airport'] = Airport::find($validated['destination_airport'])->toArray();
        $validated['airline'] = Airline::find($validated['airline'])->toArray();

        Route::create($validated);

        return redirect()->route("routes.index")->with([
            "message"=> "Registro creado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $route)
    {
        $airports = Airport::all();
        $airlines = Airline::all();
        return view('routes.form', compact('route' ,'airports', 'airlines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Route $route)
    {
        $validated = $this->validate($request, [
            'distance' => 'required',
            'estimated_duration' => 'required',
        
            'origin_airport' => 'required',
            'destination_airport' => 'required',
            'airline' => 'required'
        ]);

        $validated['origin_airport'] = Airport::find($validated['origin_airport'])->toArray();
        $validated['destination_airport'] = Airport::find($validated['destination_airport'])->toArray();
        $validated['airline'] = Airline::find($validated['airline'])->toArray();

        $route->update($validated);

        return redirect()->route("routes.index")->with([
            "message"=> "Registro actualizado exitosamente",
            "type" => "success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        $route->delete();

        return redirect()->route("routes.index")->with([
            "message"=> "Registro eliminado exitosamente",
            "type" => "success"
        ]);
    }
}
