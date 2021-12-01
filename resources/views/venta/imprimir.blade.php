<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="imagenes/favicon.png">
    <title>NavieraPeP</title>

    <link rel="stylesheet" href="{{URL::asset('/css/Normalize.css')}}">
    <link href="{{ URL::asset('/css/menu.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    
</head>

    <div id="contenedor" class="container"
        style="min-height: 76%; margin-top: 30px; margin-bottom:30px; display: flex; justify-content: center;align-items: flex-start;">

        <div
            style="background-color: white; display: flex; flex-direction: column; padding: 30px; gap:50px; width: max-content; max-width: 600px;">
            <h2 style="text-align: center;">Ticket</h2>

            <div style="display: flex; flex-direction: column; flex-wrap:wrap; justify-content: space-evenly; ">
                <div style="display: flex; flex-direction: row; margin-bottom:10px">

                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>
                                    <h4><strong>Origen:</strong></h4>
                                </td>
                                <td>
                                    <h4>{{ $compra['origen'] }}</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><strong>Destino:</strong></h4>
                                </td>
                                <td>
                                    <h4>{{ $compra['destino'] }}</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><strong>Tipo:</strong></h4>
                                </td>
                                <td>
                                    @if ($compra['tipo'] == 0)
                                      <h4>Pasaje</h4>  
                                    @else
                                     <h4>Carga</h4>   
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><strong>Cantidad:</strong></h4>
                                </td>
                                <td>
                                    @if ($compra['tipo'] == 1)
                                        <h4>{{ $compra['cantidad'] }} kg</h4>
                                    @else
                                        <h4>{{ $compra['cantidad'] }}</h4>
                                    @endif
                                </td>
                            </tr>
                            @if ($compra['tipo'] == 1)

                                <tr>
                                    <td>
                                        <h4><strong>Descripcion:</strong></h4>
                                    </td>
                                    <td>
                                        <h4>{{ $compra['descripcion'] }}</h4>
                                    </td>
                                </tr>

                            @endif

                            <tr>
                                <td>
                                    <h4><strong>Fecha de compra:</strong></h4>
                                </td>
                                <td>
                                    <h4>{{ $compra['fecha_compra'] }}</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><strong>Fecha salida:</strong></h4>
                                </td>
                                <td>
                                    <h4>{{ $compra['fecha_salida'] }}</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><strong>Total:</strong></h4>
                                </td>
                                <td>
                                    <h4>{{ $compra['total'] }}</h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="visible-print text-center">
                    {!! QrCode::size(230)->generate($compra['id']) !!}
                </div>

            </div>

        </div>
    </div>

    <script>

	  print( );
	 
    </script>
