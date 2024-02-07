@extends('adminlte::page')

@section('title', 'Aerolineas')

@section('content_header')
    <h1>Aerolineas</h1>
@stop

@section('content')
<a href="{{ route('airlines.create') }}" class="btn btn-primary btn-sm mb-3">Nuevo</a>
<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Flota</th>
            <th scope="col" colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($airlines as $airline)
            <tr>
                <td>{{ $airline->name }}</td>
                <td>
                    @foreach ($airline->fleet as $plane)
                        {{ $plane->manufacturer }} - {{ $plane->model }},
                    @endforeach
                </td>
                
                <td><a href="{{ route('airlines.edit', ['airline' => $airline->_id]) }}"
                        class="btn btn-secondary btn-sm">Editar</a></td>
                <td>
                    <form action="{{ route('airlines.destroy', [ 'airline' => $airline->_id ]) }}" method="POST">
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