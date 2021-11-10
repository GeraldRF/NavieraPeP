@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <h1>Crear ruta</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.rutas.store']) !!}

            @include('admin.ruta.partials.form')

            {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
