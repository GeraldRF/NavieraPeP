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

    @error('destino')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>