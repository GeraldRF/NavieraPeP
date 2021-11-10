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
    {!! Form::label('ruta_id', 'Ruta') !!}

    {!! Form::select('ruta_id', [null => 'Seleccione la ruta'] + $rutas, null, ['class' => 'form-control']) !!}

    @error('ruta_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('nave_id', 'Nave') !!}

    {!! Form::select('nave_id', [null => 'Seleccione la nave'] + $naves, null, ['class' => 'form-control']) !!}

    @error('nave_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('precio', 'Precio') !!}
    {!! Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el precio del ticket']) !!}

    @error('precio')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>

{!! Form::hidden('cant_pasajeros', 0) !!}
{!! Form::hidden('cant_carga', 0) !!}

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
        $('#fecha_hora_salida').on('click', function() {
            var value = $(this).val();
            if (value == "") {
                $(this).val("01/01/0000 00:00:00 am");
            }
        });
        $('#fecha_hora_llegada').on('click', function() {
                var value = $(this).val();
                if (value == "")) {
                $(this).val("01/01/0000 00:00:00 am");
                }
            }
        });
    });
</script>
