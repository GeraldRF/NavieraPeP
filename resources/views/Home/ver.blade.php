@extends('layouts.vendor-comun')

@section('title', 'Ver | Naviera PeP')

@section('styles')
    <link href="{{ URL::asset('css/home_index.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/ver.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container" style="min-height: 76%; margin-top: 30px; margin-bottom:30px">

        <div style="background-color: white; display: flex; flex-direction: column; padding: 30px; gap:50px">

            {{-- contiene la informacion --}}
            <div>
                <div>
                    <h3 style="text-align: center;">{{ $ruta->origen }} - {{ $ruta->destino }}</h3>
                </div>
                <div style="display: flex; flex-direction: row; gap:40px;justify-content: center">
                    <div style="padding:15px">
                        <div style="display:flex;justify-content: center;">
                            <h6><strong>Salida</strong></h6>
                        </div>
                        <div>

                            <?php $viaje = explode(' ', $itinerario->fecha_hora_salida); ?>

                            <ul style="list-style: none; padding: 5px 15px 0 15px">
                                <li>Fecha: {{ $viaje[0] }}</li>
                                <li>Hora: {{ $viaje[1] }}</li>
                            </ul>
                        </div>
                    </div>
                    <div style="padding:15px">
                        <div style="display:flex;justify-content: center;">
                            <h6><strong>Precio</strong></h6>
                        </div>
                        <div>
                            <ul style="list-style: none; padding: 5px 15px 0 15px">
                                <li>{{ $itinerario->precio }}</li>
                            </ul>
                        </div>
                    </div>
                    <div style="padding:15px">
                        <div style="display:flex;justify-content: center;">
                            <h6><strong>Disponibilidad</strong></h6>
                        </div>
                        <div>
                            <ul style="list-style: none; padding: 5px 15px 0 15px">
                                <li>Pasajes: {{ $nave->cap_pasajeros - $itinerario->cant_pasajeros }}</li>
                                <li>Carga: {{ $nave->cap_carga - $itinerario->cant_carga }} Kg</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h4 style="text-align: center">Seleccione una opcion</h4>

                {{-- contiene los dialogos --}}
                <div style="display: flex; flex-direction: row; flex-wrap: wrap; gap:60px; justify-content: center">


                    <button id="pasaje" style="background-color: transparent; border:none">
                        <div style="background-color:transparent; color:rgb(0, 0, 0); border:0.5px solid black">
                            <div style="display:flex;justify-content: center;">
                                <h6><strong>Pasaje</strong></h6>
                            </div>

                            <div style="min-width: 250px; min-height: 250px;">
                                <div id="pasajero_img" style="display: block">
                                    <img src="/imagenes/pasajero.png" alt="persona.png"
                                        style="width: 220px; height: 220px; padding:0 10px 0 10px;">
                                </div>
                                <div id="pasajero_btns" style="display: none">
                                    <div
                                        style="list-style: none; padding: 5px 15px 0 15px; display:flex; flex-direction: column; justify-content: center; gap:10px;">

                                        <div>
                                            {!! Form::open(['route' => 'ventas.index']) !!}
                                            {!! Form::text('cantidad', null, ['class' => 'form-control','placeholder'=>'Ingrese la cantidad a comprar']) !!}
                                            {!! Form::submit('Comprar', ['class' => 'btn btn-primary']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div>O</div>
                                        <div>
                                            {!! Form::open(['route' => 'reservas.index']) !!}
                                            {!! Form::text('cantidad', null, ['class' => 'form-control','placeholder'=>'Ingrese la cantidad a reservar']) !!}
                                            {!! Form::submit('Reservar', ['class' => 'btn btn-primary']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>

                    <button id="carga" style="background-color: transparent; border:none">
                        <div style="background-color:transparent; color:rgb(0, 0, 0); border:0.5px solid black">
                            <div style="display:flex;justify-content: center;">
                                <h6><strong>Carga</strong></h6>
                            </div>

                            <div style="min-width: 250px; min-height: 250px;">
                                <div id="carga_img" style="display: block">
                                    <img src="/imagenes/carga.png" alt="carga.png"
                                        style="width: 220px; height: 220px; padding:0 10px 0 10px;">
                                </div>
                                <div id="carga_btns" style="display: none">
                                    <div
                                        style="list-style: none; padding: 5px 15px 0 15px; display:flex; flex-direction: column; justify-content: center; gap:10px;">

                                        <div>
                                            {!! Form::open(['route' => 'ventas.index']) !!}
                                            <div style="display: flex; flex-direction: row; align-items: baseline; gap:5px">
                                                {!! Form::text('cantidad', null, ['class' => 'form-control','placeholder'=>'Ingrese la cantidad a comprar']) !!}<h6>KG</h6>
                                            </div>
                                            
                                            {!! Form::submit('Comprar', ['class' => 'btn btn-primary']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div>O</div>
                                        <div>
                                            {!! Form::open(['route' => 'reservas.index']) !!}
                                            <div style="display: flex; flex-direction: row; align-items: baseline; gap:5px">
                                                {!! Form::text('cantidad', null, ['class' => 'form-control','placeholder'=>'Ingrese la cantidad a reservar']) !!}<h6>KG</h6>
                                            </div>
                                            {!! Form::submit('Reservar', ['class' => 'btn btn-primary']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>

                </div>

            </div>
        </div>
    </div>

    <script>
        $("#pasaje").on('click', function() {
            $("#pasajero_img").css("display", "none");
            $("#pasajero_btns").css("display", "block");
            $("#carga_img").css("display", "block");
            $("#carga_btns").css("display", "none");
        });
        $("#carga").on('click', function() {
            $("#carga_img").css("display", "none");
            $("#carga_btns").css("display", "block");
            $("#pasajero_img").css("display", "block");
            $("#pasajero_btns").css("display", "none");
        });
    </script>


    {{-- style="display: flex; flex-direction: row">Cantidad: {!! Form::open() !!} {!! Form::text('cantidad', null, []) !!} {!! Form::close() !!} </ul> --}}

@endsection
