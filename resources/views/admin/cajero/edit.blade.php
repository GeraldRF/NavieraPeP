@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($cajero, ['route' => ['admin.cajeros.update', $cajero], 'method' => 'put']) !!}

        @include('admin.cajero.partials.formedit')

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