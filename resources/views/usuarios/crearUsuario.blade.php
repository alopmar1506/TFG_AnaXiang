<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
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

    @foreach($errors->all() as $error)
        <span>{{ $error }}</span> <br>
    @endforeach
    <h1 class="titulo">Crear usuario</h1>
    <form method="post" action="{{ route('guardarUsuario')}}" class="formularioRegistro" enctype="multipart/form-data">
    @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido">
        <br>
        <label for="direccion">Ciudad:</label>
        <input type="text" id="direccion" name="direccion">
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena">
        <br>
        <label for="fotoUsuario">Foto usuario:</label>
        <input type="file" id="fotoUsuario" name="fotoUsuario">
        <br>
        <label for="descripcion">Describete para que los demás usuarios sepan de ti:</label>
        <input type="text" id="descripcion" name="descripcion">
        <br>
        <label for="rol">Rol:</label>
        <select id="rol" name="rol">
            <option value="">Seleccione una opción</option>
            <option value="cuidador">Cuidador</option>
            <option value="dueño">Dueño de mascota</option>
        </select>
        <button type="submit">Guardar</button>
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