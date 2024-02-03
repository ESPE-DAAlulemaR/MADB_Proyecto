@extends('adminlte::page')

@section('title', 'Rutas')

@section('content_header')
    <h1>Rutas</h1>
@stop

@section('content')
    <form action="{{ !isset($route) ? route('routes.store') : route('routes.update', ['route' => $route->_id]) }}"
        method="POST">
        @csrf
        @if (isset($route))
            @method('PUT')
        @endif

        <div class="row mb-3">
            <div class="col-4">
                <label for="distance" class="form-label">Distancia (en km)</label>
                <input type="number" class="form-control {{ $errors->has('distance') ? 'is-invalid' : '' }}" id="distance"
                    name="distance" value="{{ isset($route) ? $route->distance : old('distance') }}">
                @if ($errors->has('distance'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('distance')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-4">
                <label for="estimated_duration" class="form-label">Duración Estimada (en horas)</label>
                <input type="number" class="form-control {{ $errors->has('estimated_duration') ? 'is-invalid' : '' }}"
                    id="estimated_duration" name="estimated_duration"
                    value="{{ isset($route) ? $route->estimated_duration : old('estimated_duration') }}">
                @if ($errors->has('estimated_duration'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('estimated_duration')) }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-4">
                <label for="origin_airport" class="form-label">Aeropuerto de Origen</label>
                <select class="form-control" id="origin_airport" name="origin_airport">
                    @foreach ($airports as $airport)
                        <option value="{{ $airport->_id }}"
                            {{ isset($route) && $route->origin_airport['_id'] == $airport->_id ? 'selected' : '' }}>
                            {{ $airport->name }} - {{ $airport->code }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-4">
                <label for="destination_airport" class="form-label">Aeropuerto de Destino</label>
                <select class="form-control" id="destination_airport" name="destination_airport">
                    @foreach ($airports as $airport)
                        <option value="{{ $airport->_id }}"
                            {{ isset($route) && $route->destination_airport['_id'] == $airport->_id ? 'selected' : '' }}>
                            {{ $airport->name }} - {{ $airport->code }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-4">
                <label for="airline" class="form-label">Aerolínea</label>
                <select class="form-control" id="airline" name="airline">
                    @foreach ($airlines as $airline)
                        <option value="{{ $airline->_id }}"
                            {{ isset($route) && $route->airline['_id'] == $airline->_id ? 'selected' : '' }}>
                            {{ $airline->name }}
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
