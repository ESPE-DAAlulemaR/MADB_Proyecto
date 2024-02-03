@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    <h1>Reservas</h1>
@stop

@section('content')
    <form action="{{ !isset($booking) ? route('bookings.store') : route('bookings.update', ['booking' => $booking->_id]) }}"
        method="POST">
        @csrf
        @if (isset($booking))
            @method('PUT')
        @endif

        <div class="row mb-3">
            <div class="col-4">
                <label for="passenger_name" class="form-label">Nombre del Pasajero</label>
                <input type="text" class="form-control {{ $errors->has('passenger_name') ? 'is-invalid' : '' }}"
                    id="passenger_name" name="passenger_name"
                    value="{{ isset($booking) ? $booking->passenger_name : old('passenger_name') }}">
                @if ($errors->has('passenger_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('passenger_name')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-4">
                <label for="seat_number" class="form-label">Número de Asiento</label>
                <input type="text" class="form-control {{ $errors->has('seat_number') ? 'is-invalid' : '' }}"
                    id="seat_number" name="seat_number"
                    value="{{ isset($booking) ? $booking->seat_number : old('seat_number') }}">
                @if ($errors->has('seat_number'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('seat_number')) }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-4">
                <label for="status" class="form-label">Estado</label>
                <select class="form-control" id="status" name="status">
                    <option value="Confirmed" {{ isset($booking) && $booking->status == 'Confirmed' ? 'selected' : '' }}>
                        Confirmado</option>
                    <option value="Pending" {{ isset($booking) && $booking->status == 'Pending' ? 'selected' : '' }}>
                        Pendiente</option>
                    <option value="Cancelled" {{ isset($booking) && $booking->status == 'Cancelled' ? 'selected' : '' }}>
                        Cancelado</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-4">
                <label for="flight" class="form-label">Vuelo</label>
                <select class="form-control" id="flight" name="flight">
                    @foreach ($flights as $flight)
                        <option value="{{ $flight->_id }}"
                            {{ isset($booking) && $booking->flight['_id'] == $flight->_id ? 'selected' : '' }}>
                            {{ $flight->route['origin_airport']['name'] }} ({{ $flight->route['origin_airport']['code'] }})
                            a
                            {{ $flight->route['destination_airport']['name'] }}
                            ({{ $flight->route['destination_airport']['code'] }})
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
