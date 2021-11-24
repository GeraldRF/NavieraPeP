<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la nave']) !!}

    @error('nombre')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('cap_pasajeros', 'Capacidad de pasajeros') !!}
    {!! Form::text('cap_pasajeros', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la capacidad de pasajeros']) !!}

    @error('cap_pasajeros')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('cap_carga', 'Capacidad de carga') !!}
    {!! Form::text('cap_carga', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la capacidad de carga']) !!}

    @error('cap_carga')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>