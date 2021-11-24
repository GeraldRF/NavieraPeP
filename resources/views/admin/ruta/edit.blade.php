@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::model($ruta, ['route' => ['admin.rutas.update', $ruta], 'method' => 'put']) !!}

            @include('admin.ruta.partials.form')

            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
