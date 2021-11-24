    <header>
        <nav class="navbar navbar-expand-lg">
            <img src="imagenes/Logo.png" class="logo">

            <div class="hamburger navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"
                style="border: none; align-items: self-end;">
                <div class="hamburger-inner-0"></div>
                <div class="hamburger-inner-1"></div>
                <div class="hamburger-inner-2"></div>
            </div>

            <div class="collapse navbar-collapse contenedor-menu" id="collapsibleNavId">
                <div class="menu-inicio">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="gap: 15px">
                        <li class="nav-item">
                            <a class="nav-link btn-inicio" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-inicio" href="#">Viajes</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link btn-inicio" href="#">Trasportar</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link btn-inicio" href="#">Rutas</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link btn-inicio" href="#">Contactanos</a>
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
                            <li class="nav-item"><a class="btn-sesion-i" href="/admin">Entrar en modo admin</a></li>
                            <li class="nav-item" style="align-self: center;">
                                <span style="color: white;">{{ Auth::user()->name }}</span>
                            </li>
                            <li class="nav-item" style="max-height: 36px">
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
    <script>
        $('.hamburger').on('click', function() {
            $('.hamburger').toggleClass('open');
        });
    </script>
