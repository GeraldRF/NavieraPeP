@extends('adminlte::page')

@section('title', 'Naves')

@section('content_header')
    <h1>Naves</h1>
@stop

@section('content')
@if (session('success'))
<div class="alert alert-success">
    <strong>{{ session('success') }}</strong>
</div>
@endif

<div class="card">
<div class="card-header">
    <a class="btn btn-primary" href="{{ route('admin.naves.create') }}">Agregar</a>


</div>
<div class="card-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Capacidad de pasajeros</th>
                <th>Capacidad de carga</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($naves as $nave)
                <tr>
                    <td>{{ $nave->id }}</td>
                    <td>{{ $nave->nombre }}</td>
                    <td>{{ $nave->cap_pasajeros }}</td>
                    <td>{{ $nave->cap_carga }}</td>
                    <td width="10px"><a class="btn btn-warning btn-sm"
                            href="{{ route('admin.naves.edit', $nave) }}">Editar</a></td>
                    <td width="10px">
                        <form action="{{ route('admin.naves.destroy', $nave) }}" method="POST">
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
