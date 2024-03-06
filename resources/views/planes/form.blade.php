@extends('adminlte::page')

@section('title', 'Aviones')

@section('content_header')
    <h1>Aviones</h1>
@stop

@section('content')
<form action="{{ !isset($plane) ? route('planes.store') : route('planes.update', ['plane' => $plane->_id]) }}" method="POST">
    @csrf
    @if (isset($plane))
        @method('PUT')
    @endif

    <div class="row mb-3">
        <div class="col-4">
            <label for="model" class="form-label">Modelo</label>
            <input type="text" class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" id="model"
                name="model" value="{{ isset($plane) ? $plane->model : old('model') }}">
            @if ($errors->has('model'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ __($errors->first('model')) }}</strong>
                </span>
            @endif
        </div>

        <div class="col-4">
            <label for="manufacturer" class="form-label">Fabricante</label>
            <input type="text" class="form-control {{ $errors->has('manufacturer') ? 'is-invalid' : '' }}" id="manufacturer"
                name="manufacturer" value="{{ isset($plane) ? $plane->manufacturer : old('manufacturer') }}">
            @if ($errors->has('manufacturer'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ __($errors->first('manufacturer')) }}</strong>
                </span>
            @endif
        </div>

        <div class="col-4">
            <label for="passenger_capacity" class="form-label">Capacidad de Pasajeros</label>
            <input type="number" class="form-control {{ $errors->has('passenger_capacity') ? 'is-invalid' : '' }}" id="passenger_capacity"
                name="passenger_capacity" value="{{ isset($plane) ? $plane->passenger_capacity : old('passenger_capacity') }}">
            @if ($errors->has('passenger_capacity'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ __($errors->first('passenger_capacity')) }}</strong>
                </span>
            @endif
        </div>

        <div class="col-4">
            <label for="year_of_manufacture" class="form-label">Año de fabricación</label>
            <input type="text" class="form-control {{ $errors->has('year_of_manufacture') ? 'is-invalid' : '' }}" id="year_of_manufacture"
                name="year_of_manufacture" value="{{ isset($plane) ? $plane->year_of_manufacture : old('year_of_manufacture') }}">
            @if ($errors->has('year_of_manufacture'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ __($errors->first('year_of_manufacture')) }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-4">
            <label for="cargo_capacity" class="form-label">Capacidad de Carga</label>
            <input type="number" class="form-control {{ $errors->has('cargo_capacity') ? 'is-invalid' : '' }}" id="cargo_capacity"
                name="cargo_capacity" value="{{ isset($plane) ? $plane->cargo_capacity : old('cargo_capacity') }}">
            @if ($errors->has('cargo_capacity'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ __($errors->first('cargo_capacity')) }}</strong>
                </span>
            @endif
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