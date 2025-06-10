<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesión</title>
    <link href="{{ asset('css/styleGeneral.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estiloFormularios.css') }}" rel="stylesheet">

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
                        <a href="#"><b>{{ Auth::user()->nombre }}</b></a>
                        <ul class="submenu">
                            <li><a href="{{ route('perfilUsuario', Auth::user()->id) }}">Mi perfil</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        style="background:none; border:none; color:blue; cursor:pointer;">Cerrar
                                        sesión</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ route('iniciarSesion') }}"><b>Iniciar sesión</b></a></li>
                    <li style="color: white;">|</li>
                    <li><a href="{{ route('crearUsuario') }}"><b>Registrarse</b></a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <h1 class="titulo">Inicio sesión</h1>
    <form method="POST" action="{{ route('procesarLogin') }}" class="formularioRegistro">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
        <button type="submit">Iniciar sesión</button>
    </form>


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