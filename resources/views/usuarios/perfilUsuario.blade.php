<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados de {{ $usuario->nombre }}</title>
    <link href="{{ asset('css/styleGeneral.css') }}" rel="stylesheet">
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

    <div class="informacionUsuario">
        <ul class="">
            <li>
                <img src="{{ $usuario->foto ? asset('storage/' . $usuario->fotoUsuario) : asset('img/avatarjpg.jpg') }}"
                    alt="Foto de {{$usuario->nombre}}">
            </li>
            <li>Nombre: {{ $usuario->nombre . " ". $usuario->apellido }}</li>
            <li>Provincia: {{ $usuario->direccion }}</li>
            <li>Sobre mi: {{ $usuario->descripcion }}</li>
        </ul>
    </div>
    <a href="{{ route('editarUsuario', $usuario->id) }}">Editar usuario</a>
    <button type="submit"><a href="{{ route('crearMascota') }}"></a>Añadir mascota</button>

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