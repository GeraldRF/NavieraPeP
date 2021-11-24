@extends('adminlte::page')

@section('title', 'Rutas')

@section('content_header')
    <h1>Rutas</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('admin.rutas.create') }}">Agregar</a>


        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Oringen</th>
                        <th>Destino</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rutas as $ruta)
                        <tr>
                            <td>{{ $ruta->id }}</td>
                            <td>{{ $ruta->origen }}</td>
                            <td>{{ $ruta->destino }}</td>
                            <td width="10px"><a class="btn btn-warning btn-sm"
                                    href="{{ route('admin.rutas.edit', $ruta) }}">Editar</a></td>
                            <td width="10px">
                                <form action="{{ route('admin.rutas.destroy', $ruta) }}" method="POST">
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
