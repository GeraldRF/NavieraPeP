<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/x-icon" href="imagenes/favicon.png">
    <link href="{{ URL::asset('css/menu.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</head>

    <header>
        <nav class="navbar navbar-expand-lg {{--navbar-light bg-dark--}}">
            <img src="imagenes/Logo.png" style="max-width: 100px; margin:0 5px 0 5px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                {{-- <span class="navbar-toggler-icon"></span> --}}
                <img src="imagenes/menu.png" style="max-width: 40px">
            </button>

            <div class="collapse navbar-collapse contenedor-menu" id="navbarSupportedContent">
                <div class="menu-inicio">
                    <ul class="nav justify-content-center">
                        <li class="nav-item ">
                            <a class="nav-link btn-inicio" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-inicio" href="#">Más</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link btn-inicio" href="#">Menos</a>
                        </li>
                    </ul>
                </div>
                <div class="menu-sesion">
                    @if (!Auth::user())
                        {{-- <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                data-display="static" aria-haspopup="true" aria-expanded="false">
                                <img src="imagenes/Persona.png" style="max-width: 50px">
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg-left">
                                <a class="dropdown-item" href="/iniciar-sesion">Iniciar sesión</a>
                                <a class="dropdown-item" href="/registrarse">Registrate</a>
                            </div>
                        </div> --}}

                        <ul class="nav justify-content-center" style="gap: 10px">
                            <li class="nav-item">
                                <a class="btn-sesion-r" href="/registrarse">Registrate</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn-sesion-i" href="/iniciar-sesion">Iniciar sesion</a>
                            </li>
                        </ul>
                    @else
                        <ul class="nav justify-content-center" style="gap: 20px">
                            <li class="nav-item" style="align-self: center;">
                                <span style="color: white;">{{ Auth::user()->name }}</span>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        <img src="/imagenes/icono-cerrar-sesion.png" title="Cerrar sesión"
                                            style="max-width: 40px; margin-right: 10px">
                                    </a>
                                </form>
                            </li>
                        </ul>

                    @endif
                </div>
            </div>
        </nav>
    </header>
