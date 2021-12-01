<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="imagenes/favicon.png">
    <title>Informe_ingresos_{{ date('Y-m-d') }}_{{ date('h:i:s') }}</title>

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

    <?php $totalTodo = 0; ?>


    <div>

        <h3><strong>Ventas que se han realizado</strong></h3>

        <p>Se hara un recuento de {{ count($ventas) }} ventas diferentes y se mostrara que se vendio de
            cada una.</p>

        @foreach ($ventas as $venta)

            <br>
            <h3>Venta #{{ $venta->id }}</h3>
            <table>
                <tr>
                    <td>Tipo:</td>
                    <td>
                        @if ($venta->tipo == 0)
                            Pasaje
                        @else
                            Carga
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Cantidad de espacios: </td>
                    <td>{{ $venta->cantidad }}</td>
                </tr>
                <tr>
                    <td>Total:</td>
                    <td>{{ $venta->total }} <?php $totalTodo += $venta->total; ?> </td>
                </tr>
                <tr>
                    <td>Fecha de venta:</td>
                    <td>{{ $venta->fecha_venta }}</td>
                </tr>
                @if ($venta->tipo == 1)
                    <tr>
                        <td>Descripcion:</td>
                        <td>{{ $venta->descripcion }}</td>
                    </tr>
                @endif
            </table>
            <br>

            @foreach ($itinerarios as $itinerario)

                @if ($itinerario->id == $venta->itinerario_id)



                    @foreach ($rutas as $ruta)

                        @if ($ruta->id == $itinerario->ruta_id)
                            <h5> Esta venta se realizo en la ruta {{ $ruta->origen }} - {{ $ruta->destino }}</h5>
                        @endif

                    @endforeach
                    @foreach ($naves as $nave)

                        @if ($nave->id == $itinerario->nave_id)
                            <h5>La nave {{ $nave->nombre }} es la encargada de esta ruta</h5>
                        @endif

                    @endforeach

                    @if (date('Y-m-d H:i:S') < $itinerario->fecha_hora_salida)
                        <h5>Esta nave sarpa el {{ $itinerario->fecha_hora_salida }}
                        </h5>
                    @else
                        <h5>Esta nave ya sarpo el {{ $itinerario->fecha_hora_salida }}</h5>
                    @endif
                @endif

            @endforeach


        @endforeach
        <br>
        <br>
        <h3>Totales</h3>
        <table>

            @foreach ($itinerarios as $itinerario)
                <?php $total = 0; ?>
                <tr style="border-bottom: 0.5px solid; margin-bottom:5px">
                    <td>
                        Total de viaje con ruta
                        @foreach ($rutas as $ruta)
                            @if ($ruta->id == $itinerario->ruta_id)
                                {{ $ruta->origen }} - {{ $ruta->destino }}
                            @endif
                        @endforeach
                        con fecha {{ $itinerario->fecha_hora_salida }}
                        @foreach ($naves as $nave)
                            @if ($nave->id == $itinerario->nave_id)
                                hecha por la nave {{ $nave->nombre }}
                            @endif
                        @endforeach
                    </td>

                    <td>
                        @foreach ($ventas as $venta)
                            @if ($venta->itinerario_id == $itinerario->id)

                                <?php $total += $venta->total; ?>

                            @endif
                        @endforeach
                        {{ $total }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>Total de todos los viajes</td>
                <td>{{ $totalTodo }}</td>
            </tr>
        </table>

    </div>

</div>

<script>
    print()
</script>
