@extends('adminlte::page')

@section('title', 'Itinerarios')

@section('content_header')
    <h1>Itinerarios</h1>
@stop

@section('content')
@if (session('success'))
<div class="alert alert-success">
    <strong>{{ session('success') }}</strong>
</div>
@endif

<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{ route('admin.itinerarios.create') }}">Agregar</a>
    </div>
    <div class="card-body">

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Fecha y hora de salida</th>
            <th>Fecha y hora de llegada</th>
            <th>Id de ruta</th>
            <th>Id de nave</th>
            <th>Precio</th>
            <th>Pasajes vendidos</th>
            <th>Carga vendida</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($itinerarios as $itinerario)
            <tr>
                <td>{{ $itinerario->id }}</td>
                <td>{{ $itinerario->fecha_hora_salida }}</td>
                <td>{{ $itinerario->fecha_hora_llegada }}</td>
                <td>{{ $itinerario->ruta_id }}</td>
                <td>{{ $itinerario->nave_id }}</td>
                <td>{{ $itinerario->precio }}</td>
                <td>{{ $itinerario->cant_pasajeros }}</td>
                <td>{{ $itinerario->cant_carga }}</td>
                <td width="10px"><a class="btn btn-warning btn-sm"
                        href="{{ route('admin.itinerarios.edit', $itinerario) }}">Editar</a></td>
                <td width="10px">
                    <form action="{{ route('admin.itinerarios.destroy', $nave) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
@stop
