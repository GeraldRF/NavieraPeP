@extends('adminlte::page')

@section('title', 'Cajeros')

@section('content_header')
    <h1>Cajeros</h1>
@stop

@section('content')
@if (session('success'))
<div class="alert alert-success">
    <strong>{{ session('success') }}</strong>
</div>
@endif

<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{ route('admin.cajeros.create') }}">Agregar</a>
    </div>
    <div class="card-body">

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cajeros as $cajero)
            <tr>
                <td>{{ $cajero->id }}</td>
                <td>{{ $cajero->name }}</td>
                <td>{{ $cajero->email }}</td>
                <td width="10px"><a class="btn btn-warning btn-sm"
                        href="{{ route('admin.cajeros.edit', $cajero) }}">Editar</a></td>
                <td width="10px">
                    <form action="{{ route('admin.cajeros.destroy', $cajero) }}" method="POST">
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
