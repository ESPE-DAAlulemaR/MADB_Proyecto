@extends('adminlte::page')

@section('title', 'Vuelos')

@section('content_header')
    <h1>Vuelos</h1>
@stop

@section('content')
<form action="{{ !isset($flight) ? route('flights.store') : route('flights.update', ['flight' => $flight->_id]) }}" method="POST">
    @csrf
    @if (isset($flight))
        @method('PUT')
    @endif

    <div class="row mb-3">
        <div class="col-4">
            <label for="departure_date" class="form-label">Fecha de Salida</label>
            <input type="datetime-local" class="form-control {{ $errors->has('departure_date') ? 'is-invalid' : '' }}" id="departure_date"
                name="departure_date" value="{{ isset($flight) ? $flight->departure_date : old('departure_date') }}">
            @if ($errors->has('departure_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ __($errors->first('departure_date')) }}</strong>
                </span>
            @endif
        </div>

        <div class="col-4">
            <label for="arrival_date" class="form-label">Fecha de Llegada</label>
            <input type="datetime-local" class="form-control {{ $errors->has('arrival_date') ? 'is-invalid' : '' }}" id="arrival_date"
                name="arrival_date" value="{{ isset($flight) ? $flight->arrival_date : old('arrival_date') }}">
            @if ($errors->has('arrival_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ __($errors->first('arrival_date')) }}</strong>
                </span>
            @endif
        </div>

        <div class="col-4">
            <label for="price" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price"
                name="price" value="{{ isset($flight) ? $flight->price : old('price') }}">
            @if ($errors->has('price'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ __($errors->first('price')) }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-4">
            <label for="status" class="form-label">Estado</label>
            <select class="form-control" id="status" name="status">
                <option value="Scheduled" {{ isset($flight) && $flight->status == 'Scheduled' ? 'selected' : '' }}>Programado</option>
                <option value="In Progress" {{ isset($flight) && $flight->status == 'In Progress' ? 'selected' : '' }}>En Progreso</option>
                <option value="Completed" {{ isset($flight) && $flight->status == 'Completed' ? 'selected' : '' }}>Completado</option>
                <option value="Cancelled" {{ isset($flight) && $flight->status == 'Cancelled' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-4">
            <label for="route" class="form-label">Ruta</label>
            <select class="form-control" id="route" name="route">
                @foreach ($routes as $route)
                    <option value="{{ $route->_id }}" {{ isset($flight) && $flight->route['_id'] == $route->_id ? 'selected' : '' }}>
                        {{ $route->origin_airport['name'] }} ({{ $route->origin_airport['code'] }})
                        a
                        {{ $route->destination_airport['name'] }} ({{ $route->destination_airport['code'] }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-4">
            <label for="plane" class="form-label">Avión</label>
            <select class="form-control" id="plane" name="plane">
                @foreach ($planes as $plane)
                    <option value="{{ $plane->_id }}" {{ isset($flight) && $flight->plane['_id'] == $plane->_id ? 'selected' : '' }}>
                        {{ $plane->manufacturer }} - {{ $plane->model }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row p-3">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop