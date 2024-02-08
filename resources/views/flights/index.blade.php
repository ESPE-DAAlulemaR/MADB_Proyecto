@extends('adminlte::page')

@section('title', 'Vuelos')

@section('content_header')
    <h1>Vuelos</h1>
@stop

@section('content')
    <a href="{{ route('flights.create') }}" class="btn btn-primary btn-sm mb-3">Nuevo</a>
    <table class="table table-hover table-dark dataTable">
        <thead>
            <tr>
                <th scope="col">Fecha de Salida</th>
                <th scope="col">Fecha de Llegada</th>
                <th scope="col">Precio</th>
                <th scope="col">Estado</th>
                <th scope="col">Ruta</th>
                <th scope="col">Avión</th>
                <th scope="col" colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($flights as $flight)
                <tr>
                    <td>{{ $flight->departure_date }}</td>
                    <td>{{ $flight->arrival_date }}</td>
                    <td>{{ $flight->price }}</td>
                    <td>{{ $flight->status }}</td>
                    <td>
                        {{ $flight->route['origin_airport']['name'] }} ({{ $flight->route['origin_airport']['code'] }})
                        a
                        {{ $flight->route['destination_airport']['name'] }} ({{ $flight->route['destination_airport']['code'] }})
                    </td>
                    <td>{{ $flight->plane['manufacturer'] }} - {{ $flight->plane['model'] }}</td>
                    <td><a href="{{ route('flights.edit', ['flight' => $flight->_id]) }}"
                            class="btn btn-secondary btn-sm">Editar</a></td>
                    <td>
                        
                        <form action="{{ route('flights.destroy', [ 'flight' => $flight->_id ]) }}" method="POST">
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
