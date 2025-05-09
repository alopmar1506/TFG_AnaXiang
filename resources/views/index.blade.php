<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <link href="{{ asset('css/styleGeneral.css') }}" rel="stylesheet">
    <link href="{{ asset('css/usuarios/mostrarUsuarios.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header class="cabecera">
        <nav>
            <ul>
                <li><a href="{{ route('handspaws') }}"><img src="{{ asset('img/logoHandsPaws-removebg-preview.png') }}"
                            alt="logoHandsPaws"></a>
                </li>
                <li><a href="{{ route('iniciarSesion') }}"><b>Iniciar sesión</b></a></li>
                <li style="color: white;">|</li>
                <li><a href="{{ route('crearUsuario') }}"><b>Registrarse</b></a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="fotoPrincipal">
        <img src="{{ asset('img/panoramica.jpg') }}" alt="imagen cabecera">
    </div>

    <main>
        <section class="introduccion">
            <div class="bienvenida">
                <h1 style="color: orange;">¡Bienvenido!🐾</h1>
                <p><b>HandsPaws</b> es una página en la que podrás encontrar a los mejores cuidadores para
                    tus amigos peludos, <br>
                    Además ofrecemos <b>recomendaciones</b> para el cuidado de vuestras
                    mascotas como por ejemplo de alimentos que pueden o no
                    comer, que champú usar según <br>
                    su pelaje o qué juguetes les pueden gustar. <br>
                    Entra investiga y participa en el blog contándonos tus
                    <b>experiencias</b> con los consejos usados o con consejos que
                    puedan ayudar a más gente.
                </p>
            </div>
        </section>

        <section class="usuarios">
            <h1 class="titulo">Cuidadores</h1>

            <form action="{{ route('handspaws') }}" method="GET">
                <label for="direccion">Ciudad</label>
                <input type="text" name="direccion" placeholder="Buscar por ciudad" value="{{ request('direccion') }}">
                <input type="submit" value="Filtrar">
            </form>
            @foreach($usuarios as $usuario)
                <div class="cuadroUsuarios">
                    <ul class="listaOficinas">
                        <li><img src="{{ asset("storage/app/public/img" . $usuario->fotoUsuario) }}" alt=""></li>
                        <li><a href="{{route('perfilUsuario', $usuario->id)}}">{{$usuario->nombre}}</a></li>
                        <li>{{$usuario->direccion}}</a></li>
                    </ul>
                </div>
            @endforeach
        </section>

        <h3 class="mt-5">Mascotas</h3>
        <div id="mascotasCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($mascotas->chunk(3) as $chunk)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <div class="row">
                            @foreach($chunk as $mascota)
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <img src="{{ asset('img/' . $mascota->foto) }}" class="card-img-top"
                                            alt="Foto de {{ $mascota->nombre }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $mascota->nombre }}</h5>
                                            <p class="card-text">Especie: {{ $mascota->especie }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mascotasCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mascotasCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </main>
    <footer class="pie">
        <div class="autora">
            <a href="index.html"><img src="img/logoHandsPaws-removebg-preview.png" alt="logoHandsPaws"></a>
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