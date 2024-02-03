@extends('adminlte::page')

@section('title', 'Aerolineas')

@section('content_header')
    <h1>Aerolineas</h1>
@stop

@section('content')
<form action="{{ !isset($airline) ? route('airlines.store') : route('airlines.update', ['airline' => $airline->id]) }}" method="POST">
    @csrf
    @if (isset($airline))
        @method('PUT')
    @endif

    <div class="row mb-3">
        <div class="col-12">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                name="name" value="{{ isset($airline) ? $airline->name : old('name') }}">
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <label for="fleet" class="form-label">Flota</label>
            @foreach ($aircrafts as $aircraft)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $aircraft['_id'] }}"
                        id="fleet_{{ $aircraft['_id'] }}" name="fleet[]" @if (isset($airline) && in_array(['_id' => $aircraft['_id']], $airline['fleet'])) checked @endif>
                    <label class="form-check-label" for="fleet_{{ $aircraft['_id'] }}">
                        {{ $aircraft['model'] }} (Capacidad: {{ $aircraft['capacity'] }})
                    </label>
                </div>
            @endforeach
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