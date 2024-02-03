@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    <h1>Reservas</h1>
@stop

@section('content')
<a href="{{ route('bookings.create') }}" class="btn btn-primary btn-sm mb-3">Nuevo</a>
<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th scope="col">Nombre del Pasajero</th>
            <th scope="col">Número de Asiento</th>
            <th scope="col">Estado</th>
            <th scope="col">Vuelo</th>
            <th scope="col" colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->passenger_name }}</td>
                <td>{{ $booking->seat_number }}</td>
                <td>{{ $booking->status }}</td>
                <td>
                    {{ $booking->flight['route']['origin_airport']['name'] }} ({{ $booking->flight['route']['origin_airport']['code'] }})
                    a
                    {{ $booking->flight['route']['destination_airport']['name'] }} ({{ $booking->flight['route']['destination_airport']['code'] }})
                </td>
                <td><a href="{{ route('bookings.edit', ['booking' => $booking->_id]) }}" class="btn btn-secondary btn-sm">Editar</a></td>
                <td>
                    <form action="{{ route('bookings.destroy', [ 'booking' => $booking->_id ]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop