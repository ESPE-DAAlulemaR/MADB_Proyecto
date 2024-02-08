@extends('adminlte::page')

@section('title', 'Aeropuertos')

@section('content_header')
    <h1>Aeropuertos</h1>
@stop

@section('content')
<a href="{{ route('airports.create') }}" class="btn btn-primary btn-sm mb-3">Nuevo</a>
    <table class="table table-hover table-dark dataTable">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Ciudad</th>
                <th scope="col">País</th>
                <th scope="col">Código</th>
                <th scope="col" colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($airports as $airport)
                <tr>
                    <td>{{ $airport->name }}</td>
                    <td>{{ $airport->city }}</td>
                    <td>{{ $airport->country }}</td>
                    <td>{{ $airport->code }}</td>

                    <td><a href="{{ route('airports.edit', ['airport' => $airport->_id]) }}"
                            class="btn btn-secondary btn-sm">Editar</a></td>
                    <td>
                        <form action="{{ route('airports.destroy', [ 'airport' => $airport->_id ]) }}" method="POST">
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
