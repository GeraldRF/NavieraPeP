<div class="form-group">
    {!! Form::label('fecha_hora_salida', 'Fecha y hora de salida') !!}
    {!! Form::datetime('fecha_hora_salida', null, ['class' => 'form-control', 'placeholder' => 'dia/mes/año horas:minutos:segundos am/pm', 'id' => 'fecha_hora_salida']) !!}

    @error('fecha_hora_salida')
        <span class="text-danger">{{ $message }}</span>
    @enderror
   
</div>
<div class="form-group">
    {!! Form::label('fecha_hora_llegada', 'Fecha y hora de llegada') !!}
    {!! Form::datetime('fecha_hora_llegada', null, ['class' => 'form-control', 'placeholder' => 'dia/mes/año horas:minutos:segundos am/pm', 'id' => 'fecha_hora_llegada']) !!}

    @error('fecha_hora_llegada')
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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
           $('#fecha_hora_salida').on('click', function(){
            $(this).val("01/01/0000 00:00:00 am");
           });
           $('#fecha_hora_llegada').on('click', function(){
            $(this).val("01/01/0000 00:00:00 am");
           });
        });
</script>