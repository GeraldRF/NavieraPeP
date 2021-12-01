<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="imagenes/favicon.png">
    <title>Informe_ingresos_{{date('Y-m-d')}}_{{date('h:i:s')}}</title>

    <link rel="stylesheet" href="{{ URL::asset('/css/Normalize.css') }}">
    <link href="{{ URL::asset('/css/menu.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

</head>

<div id="contenedor" class="container"
    style="min-height: 100%; margin-top: 30px; margin-bottom:30px; display: flex; flex-direction: column; justify-content: center;">

    <div style="min-height: 500px; width:100% ; text-align: center;">
        <h1 style="width: 100%; text-align: center">Informe de ingresos</h1>
        <img src="/imagenes/Logo-sesion.png" style="width: 440; height: 300;" alt="logo">
    </div>

    <div>

        <h3><strong>Trafico en cuanto a naves</strong></h3>

        <p>Se hara un recuento de {{ count($naves) }} naves y se mostrara el trafico por ruta.</p>

        @foreach ($naves as $nave)
            <br>
            <h4>{{ $nave->nombre }}</h4>

            <table style="gap:15px">
                <tr>
                    <td>Capacidad de pasajeros:</td>
                    <td>{{ $nave->cap_pasajeros }}</td>
                </tr>
                <tr>
                    <td>Capacidad de carga:</td>
                    <td>{{ $nave->cap_carga }}</td>
                </tr>
            </table>
            <br>
            <p>De las cantidades anteriores por cada ruta se ocupo lo siguiente:</p>

            @foreach ($itinerarios as $itinerario)
                @if ($itinerario->nave_id == $nave->id)

                    @foreach ($rutas as $ruta)
                        @if ($ruta->id == $itinerario->ruta_id)
                            <br>
                            <h6>{{ $ruta->origen }} - {{ $ruta->destino }}</h6>

                            <table style="gap:15px">
                                <tr>
                                    <td>Espacios de pasajeros:</td>
                                    <td>{{ $itinerario->cant_pasajeros }}</td>
                                </tr>
                                <tr>
                                    <td>Espacios de carga:</td>
                                    <td>{{ $itinerario->cant_carga }}</td>
                                </tr>
                            </table>

                            <br>
                            @if (date('Y-m-d H:i:S') < $itinerario->fecha_hora_salida)
                                <p>Esta nave <strong>no</strong> ha sarpado sino hasta {{ $itinerario->fecha_hora_salida }}</p>
                            @else
                                <p>Esta nave <strong>ya</strong> sarpo el {{ $itinerario->fecha_hora_salida }}</p>
                            @endif

                        @endif
                    @endforeach

                @endif




            @endforeach



        @endforeach

    </div>

</div>

<script>
    print()
</script>
