@extends('adminlte::page')

@section('title', 'Rutas')

@section('content_header')
    <h1>Rutas</h1>
@stop

@section('content')
    <a href="{{ route('routes.create') }}" class="btn btn-primary btn-sm mb-3">Nuevo</a>
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">Distancia</th>
                <th scope="col">Duración Estimada</th>
                <th scope="col">Aeropuerto de Origen</th>
                <th scope="col">Aeropuerto de Destino</th>
                <th scope="col">Aerolínea</th>
                <th scope="col" colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($routes as $route)
                <tr>
                    <td>{{ $route->distance }} km</td>
                    <td>{{ $route->estimated_duration }} horas</td>
                    <td>{{ $route->origin_airport['name'] }} - {{ $route->origin_airport['code'] }}</td>
                    <td>{{ $route->destination_airport['name'] }} - {{ $route->destination_airport['code'] }}</td>
                    <td>{{ $route->airline['name'] }}</td>
                    <td><a href="{{ route('routes.edit', ['route' => $route->_id]) }}"
                            class="btn btn-secondary btn-sm">Editar</a></td>
                    <td>
                        <form action="{{ route('routes.destroy', [ 'route' => $route->_id ]) }}" method="POST">
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
