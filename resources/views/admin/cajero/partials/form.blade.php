<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del cajero']) !!}

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('email', 'Correo electronico') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo electronico']) !!}

    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>


<div class="form-group">
    {!! Form::label('password', 'Contreseña') !!}

    {!! Form::text('password', null, ['class' => 'form-control', 'placeholder'=>'Ingrese la contraseña']) !!}

    @error('password')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>
