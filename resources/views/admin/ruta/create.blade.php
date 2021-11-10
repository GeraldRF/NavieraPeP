@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <h1>Crear ruta</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.rutas.store']) !!}
            <div class="form-group">
                {!! Form::label('origen', 'Origen') !!}
                {!! Form::text('origen', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el lugar de origen']) !!}

                @error('origen')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group">
                {!! Form::label('destino', 'Destino') !!}
                {!! Form::text('destino', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el lugar de destino']) !!}

                @error('origen')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop
