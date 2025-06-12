<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HandsPaws</title>
    <link href="{{ asset('css/styleGeneral.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/logoHandsPaws.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header class="cabecera">
        <nav>
            <ul>
                <li><a href="{{ route('handspaws') }}">
                        <img src="{{ asset('img/logoHandsPaws-removebg-preview.png') }}" alt="logoHandsPaws">
                    </a></li>
                @auth
                    <li class="dropdown">
                        <div class="nombre">
                            <a href="#"><b>{{ Auth::user()->nombre }}</b></a>
                            <ul class="submenu">
                                <li><a href="{{ route('perfilUsuario', Auth::user()->id) }}">Mi perfil</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="sesion">
                                        @csrf
                                        <button type="submit"
                                            style="background:none; border:none; color:blue; cursor:pointer; font-size: 10px;">
                                            Cerrar sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                @else
                    <li><a href="{{ route('iniciarSesion') }}"><b>Iniciar sesión</b></a></li>
                    <li style="color: white;">|</li>
                    <li><a href="{{ route('crearUsuario') }}"><b>Registrarse</b></a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <div class="fotoPrincipal">
        <img src="{{ asset('img/panoramica2.jpg') }}" alt="imagen cabecera">
    </div>

    <main class="container my-5">
        <section class="mb-5">
            <div class="p-4 bg-white shadow rounded text-center">
                <h1 class="text-warning">¡Bienvenido! 🐾</h1>
                <p><b>HandsPaws</b> es una página para encontrar cuidadores y recomendaciones para el cuidado de tus
                    mascotas.</p>
            </div>
        </section>

        <section class="usuarios">
            <h1 class="titulo text-center mt-4">Cuidadores</h1>

            <form action="{{ route('handspaws') }}" method="GET" class="mx-auto" class="filtro">
                <label for="direccion">Ciudad</label>
                <input type="text" name="direccion" placeholder="Buscar por ciudad" value="{{ request('direccion') }}">
                <input type="submit" value="Filtrar">
            </form>

            <div id="carouselUsuarios" class="carousel slide mt-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($usuarios->chunk(3) as $chunk)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <div class="lista-usuario">
                                @foreach($chunk as $usuario)
                                    <div class="card-usuario">
                                        <a href="{{ route('perfilUsuario', $usuario->id) }}"><img
                                                src="{{ asset('storage/' . $usuario->fotoUsuario) }}" class="foto-usuario"
                                                alt="Foto de {{ $usuario->nombre }}"></a>
                                        <ul>
                                            <li><strong>{{ $usuario->nombre }}</strong></li>
                                            <li><strong>Provincia:</strong> {{ $usuario->direccion }}</li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselUsuarios"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselUsuarios"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </section>


        <section class="mascotas mb-5">
            <h3 class="text-center mb-4">Mascotas</h3>

            <div id="mascotasCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($mascotas->chunk(3) as $chunk)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <div class="d-flex justify-content-center gap-4 flex-wrap">
                                @foreach($chunk as $mascota)
                                    <div class="card-mascota">
                                        <img src="{{ asset('storage/' . $mascota->fotoMascota) }}"
                                            alt="Foto de {{ $mascota->nombreMascota }}" class="foto-mascota">
                                        <ul class="list-unstyled mt-3">
                                            <li><strong>Nombre:</strong> {{ $mascota->nombreMascota }}</li>
                                            <li><strong>Especie:</strong> {{ $mascota->especie }}</li>
                                            <li><strong>Tamaño:</strong> {{ $mascota->tamanio }}</li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#mascotasCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mascotasCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </section>
    </main>

    <footer class="pie">
        <div class="autora">
            <a href="{{ route('handspaws') }}"><img src="{{ asset('img/logoHandsPaws-removebg-preview.png') }}"
                    alt="logoHandsPaws"></a>
            <p>2023-2024 | Ana Xiang López Martínez</p>
        </div>
        <div class="footerDerecha">
            <div class="redesSociales">
                <img src="img/twitter.svg">
                <img src="img/youtube.svg">
                <img src="img/instagram.svg">
            </div>
            <div class="enlaces">
                <p><a href="#">Política de privacidad</a></p>
                <p><a href="#">Política de cookies</a></p>
                <p><a href="#">Aviso legal</a></p>
            </div>
        </div>
    </footer>

</body>

</html>