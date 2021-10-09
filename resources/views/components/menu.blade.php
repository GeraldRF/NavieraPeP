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
