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

    {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la contraseña']) !!}
    <div class="alert alert-info" role="alert">

        <p>Para editar la contraseña elimine "<i style="color:rgb(155, 7, 7)">{{ $cajero->password }}</i>"
            completamente y escriba
            su nueva contraseña.</p>
        <p><strong style="color: rgb(155, 7, 7)">*</strong> Si no desea cambiar la contraseña, deje el codigo tal cual.
        </p>

    </div>


    @error('password')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>
