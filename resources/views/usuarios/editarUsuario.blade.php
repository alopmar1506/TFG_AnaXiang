<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario editar usuario</title>
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

    @foreach($errors->all() as $error)
        <span>{{ $error }}</span> <br>
    @endforeach
    <h1>Editar usuario {{$usuario->nombre}}</h1>
    <form method="post" action="{{ route('actualizarUsuario', $usuario->id)}}">
        @csrf
        @method('PUT')
        <input type="text" name="nombre" id="nombre" placeholder="Introduce el nombre"
            value="{{old('nombre', $usuario->nombre)}}">
        <br>
        <input type="text" name="apellido" id="apellido" placeholder="Introduce el apellido"
            value="{{old('apellido', $usuario->apellido)}}">
        <br>
        <input type="text" name="direccion" id="direccion" placeholder="Introduce la direccion"
            value="{{old('direccion', $usuario->direccion)}}">
        <br>
        <input type="text" name="email" id="email" placeholder="Introduce el email"
            value="{{old('email', $usuario->email)}}">
        <br>
        <input type="password" name="contrasena" id="contrasena" placeholder="Introduce la contraseña"
            value="{{old('contrasena', $usuario->contrasena)}}">
        <br>
        <input type="file" name="fotoUsuario" id="fotoUsuario" value="{{old('fotoUsuario', $usuario->fotoUsuario)}}">
        <br>
        <input type="text" name="descripcion" id="descripcion" placeholder="Introduce la descripción"
            value="{{old('descripcion', $usuario->descripcion)}}">
        <br>
        <input type="submit" value="Actualizar información">
    </form>

    <a href="{{ route('perfilUsuario', $usuario->id) }}">Volver al perfil</a>

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