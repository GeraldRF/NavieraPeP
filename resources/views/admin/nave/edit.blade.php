@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($nave, ['route' => ['admin.naves.update', $nave], 'method' => 'put']) !!}

        @include('admin.nave.partials.form')

        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>

@stop
