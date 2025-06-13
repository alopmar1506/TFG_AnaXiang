<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu perfil</title>
    <link href="{{ asset('css/styleGeneral.css') }}" rel="stylesheet">
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

    <h2>Tu información: </h2>
    <div class="informacionUsuario">
        <ul class="">
            <img src="{{ asset('storage/' . $usuario->fotoUsuario) }}" class="card-img-top"
                alt="Foto de {{ $usuario->nombUsuario }}">
            <li>Nombre: {{ $usuario->nombre . " " . $usuario->apellido }}</li>
            <li>Provincia: {{ $usuario->direccion }}</li>
            <li>Sobre mi: {{ $usuario->descripcion }}</li>
        </ul>
    </div>

    @if (Auth::user()->rol === 'dueño')
        <h2>Tus mascotas: </h2>
        <div class="mascotasUsuario">
            @if ($mascota->isEmpty())
                <p>No tienes mascotas registradas.</p>
            @else
                    <div class="lista-mascotas">
                        @foreach ($mascota as $mascotas)
                            <div class="card-mascota">
                                <img src="{{ asset('storage/' . $mascotas->fotoMascota) }}" alt="Foto de {{ $mascotas->nombreMascota }}"
                                    class="foto-mascota">
                                <ul>
                                    <li><strong>Nombre:</strong> {{ $mascotas->nombreMascota }}</li>
                                    <li><strong>Especie:</strong> {{ $mascotas->especie }}</li>
                                    <li><strong>Tamaño:</strong> {{ $mascotas->tamanio }}</li>
                                </ul>

                                @auth
                                    @if (Auth::id() === $usuario->id)
                                        <form action="{{ route('eliminarMascota', $mascotas->id) }}" method="POST" style="margin-top: 10px;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta mascota?')"
                                                class="btn-eliminar">
                                                Eliminar mascota
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
    @endif

    @auth
        @if (Auth::id() === $usuario->id)
            <div class="accionesUsuario">
                <button onclick="window.location.href='{{ route('editarUsuario', ['id' => $usuario->id]) }}'"
                    class="botonPerfil">
                    Editar usuario
                </button>

                @if (Auth::user()->rol === 'dueño')
                    <button onclick="window.location.href='{{ route('crearMascota') }}'" class="botonPerfil">
                        Añadir mascota
                    </button>
                @endif

                <form action="{{ route('eliminarUsuario', $usuario->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')"
                        class="botonPerfil">
                        Eliminar usuario
                    </button>
                </form>
            </div>
        @endif
    @endauth
    </div>

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