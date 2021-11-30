@extends('layouts.vendor-comun')

@section('title', 'Inicio - Naviera PeP')

@section('styles')
    <link href="{{ URL::asset('css/home_index.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/home_slider.css">
@endsection

@section('content')
    
<div class="container" style="min-height: 73%; margin-top: 30px; margin-bottom:30px">

    {{-- contiene el filtro y los viajes --}}
    <div style="align-content: center; width:100%;">

        {{-- Contiene el filtro --}}
        <div style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-between">
            <div style="background-color:#435063; padding:5px 50px">
                <h4 style="color: white">Viajes disponibles</h4>
            </div>
            <div style="display: flex; flex-direction: row; flex-wrap:wrap">
                <div>
                    {!! Form::open(['route' => 'busqueda']) !!}
                    {!! Form::text('buscar', null, ['placeholder' => 'Ingrese (Origen - Destino) o use el filtro', 'style' => 'height: 40px; width:300px;']) !!}
                    {!! Form::close() !!}
                </div>
                <div><a data-toggle="modal" data-target="#exampleModal" style="margin-left: 5px;" href=""><img
                            style="width: 40px; height:40px; padding:3px; background-color: white; "
                            src="imagenes/filter.svg" alt="filtro"></a></div>
            </div>
        </div>

        {{-- Contiene los viajes --}}
        <div
            style="display: flex; flex-wrap: wrap; justify-content: center; width:100%; gap:30px; height:max-content; background-color: white">

            @if (count($viajes) != 0)

                {{-- @if (isset($GET['origen']) || isset($GET['destino']) || isset($GET['precio']) || isset($GET['fecha']))

                @else --}}

                @foreach ($viajes as $viaje)
                    <div
                        style="display: flex; flex-direction: column; gap:15px;background-color:#435063; padding:20px; margin:20px; color:white">
                        <div>
                            <h5>{{ $viaje['origen'] }} - {{ $viaje['destino'] }}</h5>
                        </div>
                        <div>
                            <div>
                                <h6>Salida</h6>
                            </div>
                            <div style="border:0.5px solid; max-height: 60px">
                                <ul style="list-style: none; padding: 5px 15px 0 15px">
                                    <li>Fecha: {{ $viaje['fecha'] }}</li>
                                    <li>Hora: {{ $viaje['hora'] }}</li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div>
                                <h6>Precio</h6>
                            </div>
                            <div style="border:0.5px solid; padding: 5px 15px 5px 15px; text-align: center;">
                                {{ $viaje['precio'] }}</li>
                            </div>
                        </div>
                        <div style="align-self: center;">
                            <a class="btn" href="ver/{{ $viaje['itinerario_id'] }}"
                                style="background-color: #2D60AC !important; color:white; border:none; min-width: 80px; min-height: 30px">
                                Ver</a>
                        </div>
                    </div>
                @endforeach



            @else

                <h1>Lo sentimos, no hay viajes disponibles</h1>

            @endif


        </div>

    </div>

</div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filtro - No es necesario llenar todos los espacios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'filtrar']) !!}

                    {!! Form::label('fecha', 'Fecha:') !!}
                    {!! Form::datetime('fecha', null, ['class' => 'form-control', 'placeholder' => 'Año-Mes-Dia (2022-07-01) No omita 0s a la izquierda']) !!}
                    {!! Form::label('origen', 'Origen:') !!}
                    {!! Form::text('origen', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el lugar de origen']) !!}
                    {!! Form::label('destino', 'Destino:') !!}
                    {!! Form::text('destino', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el lugar de destino']) !!}
                    {!! Form::label('precio', 'Precio') !!}
                    {!! Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el precio maximo del ticket']) !!}

                    <div class="modal-footer">
                        {!! Form::button('Cerrar', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) !!}
                        {!! Form::submit('Filtrar', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>


            </div>
        </div>
    </div>


@endsection

