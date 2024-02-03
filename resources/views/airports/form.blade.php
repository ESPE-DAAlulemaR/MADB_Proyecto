@extends('adminlte::page')

@section('title', 'Aeropuertos')

@section('content_header')
    <h1>Aeropuertos</h1>
@stop

@section('content')
    <form action="{{ !isset($airport) ? route('airports.store') : route('airports.update', ['airport' => $airport->_id]) }}"
        method="POST">
        @csrf
        @if (isset($airport))
            @method('PUT')
        @endif

        <div class="row mb-3">
            <div class="col-4">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                    name="name" value="{{ isset($airport) ? $airport->name : old('name') }}">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('name')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-4">
                <label for="city" class="form-label">Ciudad</label>
                <input type="text" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" id="city"
                    name="city" value="{{ isset($airport) ? $airport->city : old('city') }}">
                @if ($errors->has('city'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('city')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-4">
                <label for="country" class="form-label">País</label>
                <input type="text" class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" id="country"
                    name="country" value="{{ isset($airport) ? $airport->country : old('country') }}">
                @if ($errors->has('country'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('country')) }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label for="code" class="form-label">Código</label>
                <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" id="code"
                    name="code" value="{{ isset($airport) ? $airport->code : old('code') }}">
                @if ($errors->has('code'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('code')) }}</strong>
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
