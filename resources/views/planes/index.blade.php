@extends('adminlte::page')

@section('title', 'Aviones')

@section('content_header')
    <h1>Aviones</h1>
@stop

@section('content')
<a href="{{ route('planes.create') }}" class="btn btn-primary btn-sm mb-3">Nuevo</a>
<table class="table table-hover table-dark dataTable">
    <thead>
        <tr>
            <th scope="col">Modelo</th>
            <th scope="col">Fabricante</th>
            <th scope="col">Capacidad de Pasajeros</th>
            <th scope="col">Capacidad de Carga</th>
            <th scope="col">Año de fabricación</th>
            <th scope="col" colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($planes as $plane)
            <tr>
                <td>{{ $plane->model }}</td>
                <td>{{ $plane->manufacturer }}</td>
                <td>{{ $plane->passenger_capacity }}</td>
                <td>{{ $plane->cargo_capacity }}</td>
                <td>{{ $plane->year_of_manufacture }}</td>
                <td><a href="{{ route('planes.edit', ['plane' => $plane->_id]) }}" class="btn btn-secondary btn-sm">Editar</a></td>
                <td>
                    <form action="{{ route('planes.destroy', [ 'plane' => $plane->_id ]) }}" method="POST">
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