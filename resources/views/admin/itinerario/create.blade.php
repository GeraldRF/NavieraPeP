@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <h1>Crear itinerario</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.itinerarios.store']) !!}

        @include('admin.itinerario.partials.form')

        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
