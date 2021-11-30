@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($itinerario, ['route' => ['admin.itinerarios.update', $itinerario], 'method' => 'put']) !!}

        @include('admin.itinerario.partials.form')

        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop