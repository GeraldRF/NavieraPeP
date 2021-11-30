@extends('layouts.vendor-comun')

@section('title', 'Configuracion - Naviera PeP')

@section('styles')
    <link href="{{ URL::asset('css/home_index.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/home_slider.css">
@endsection

@section('content')
    <div class="container" style="min-height: 96%; background-color:white;">
        <h1>Configuracion del administrador</h1>

        <div>
            {!! Form::open(['route' => 'configurar']) !!}

            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder' => 'Ingrese el nombre']) !!}
            {!! Form::label('email', 'Correo electronico') !!}
            {!! Form::text('email', null, ['class'=>'form-control','placeholder' => 'Ingrese el correo']) !!}
            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::text('password', null, ['class'=>'form-control','placeholder' => 'Ingrese la contraseña']) !!}


            {!! Form::submit('Configurar', ['class'=>'btn btn-primary form-control', 'style'=>'margin-top:30px']) !!}
            {!! Form::close() !!}
        </div>
    </div>
