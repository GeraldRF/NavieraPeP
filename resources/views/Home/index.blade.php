@extends('layouts.vendor-comun')

@section('title', 'Inicio - Naviera PeP')

@section('styles')
    <link href="{{ URL::asset('css/home_index.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/home_slider.css">
@endsection

@section('content')
    @if (!Auth::user())

        <img class="fondo" src="/imagenes/crucero.jpg" alt="">
        <div class="contenedor-padre">
            <div class="contenedor">
                <div style="margin-top:40px; display: flex; flex-direction:column; gap:20px;">
                    <h1>Agencia de viajes y transporte, con reconocimiento a nivel mundial.</h1>
                    <h3>Viaja feliz, viaja seguro con nosotros.</h3>
                </div>
                <div class="contenedor-botones">
                    <a href=""><img src="/imagenes/conozcamas.png" style="width: 200px" alt="Conozca mas"></a>

                    <a href=""><img src="/imagenes/creatucuenta.png" style="width: 200px" alt="Crea tu cuenta"></a>

                </div>
                <div>
                    <h5>Contamos con factura electronica.</h5>
                </div>
            </div>
        </div>

    @else

    @if (Auth::user()->roll == 2)
    
    <?php echo '<script>
        window.location = "'.route('admin').'"
   </script>'; ?>

    @elseif (Auth::user()->roll == 1)

    @else

       <img class="fondo" src="/imagenes/crucero.jpg" alt="">
    <div class="contenedor-padre">
        <div class="contenedor">
            <div style="margin-top:40px; display: flex; flex-direction:column; gap:20px;">
                <h1>Agencia de viajes y transporte, con reconocimiento a nivel mundial.</h1>
                <h3>Viaja feliz, viaja seguro con nosotros.</h3>
            </div>
            <div class="contenedor-botones">
                <a href=""><img src="/imagenes/conozcamas.png" style="width: 200px" alt="Conozca mas"></a>
            </div>
            <div>
                <h5>Contamos con factura electronica.</h5>
            </div>
        </div>
    </div>
    @endif

    

    @endif



@endsection
