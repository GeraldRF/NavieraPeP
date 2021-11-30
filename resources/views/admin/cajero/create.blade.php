@extends('adminlte::page')

@section('title', 'Registrar')

@section('content_header')
    <h1>Registrar cajero</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.cajeros.store']) !!}

        @include('admin.cajero.partials.form')

        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
