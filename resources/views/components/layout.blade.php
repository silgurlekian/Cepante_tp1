<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Venta de Vinos' }}</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo de Cepante" class="me-2">
                    <h1 class="logo">Cepante</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item {{ request()->is('productos.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                        </li>
                        <li class="nav-item {{ request()->is('noticias.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('noticias.index') }}">Noticias</a>
                        </li>

                        @auth
                            <li class="nav-item {{ request()->routeIs('admin.productos.*') ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('admin.productos.index', ['admin' => auth()->user()->id]) }}">Administrar
                                    Productos</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('admin.noticias.*') ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('admin.noticias.index', ['admin' => auth()->user()->id]) }}">Administrar
                                    Noticias</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="nav-link">Cerrar sesión</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endauth

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <p class="fw-bold">Información de contacto</p>
                    <ul class="list-unstyled">
                        <li>Dirección: Calle Falsa 123, Buenos Aires</li>
                        <li>Teléfono: +54 9 11 6569 7890</li>
                        <li>Email: <a href="mailto:info@cepante.com">info@cepante.com</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-6">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 text-center">
                    <p>&copy; {{ date('Y') }} Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
