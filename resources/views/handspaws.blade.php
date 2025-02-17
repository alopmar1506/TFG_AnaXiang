<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            background-color: rgb(247, 247, 247);
        }

        /*CABECERA*/
        .cabecera {
            background-color: rgb(255, 178, 90);
            font-size: 20px;
            margin-top: 0;
        }

        .cabecera img {
            width: 110px;
            height: 120px;
        }

        .cabecera nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cabecera nav ul li {
            display: inline-block;
        }

        .cabecera nav ul li a:hover {
            color: black;
        }

        .cabecera nav ul li:first-child {
            margin-right: auto;
        }

        .cabecera nav ul li:not(:first-child) {
            margin-left: 25px;
        }

        .cabecera nav ul li a {
            text-decoration: none;
            color: white;
        }

        /*------------------------------------------------*/
        /*FOOTER*/
        .pie {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgb(255, 213, 165);
            padding: 1rem;
        }

        .pie p:first-child {
            margin-right: auto;
        }

        .pie p:not(:first-child) {
            margin-left: 20px;
        }

        .pie a {
            text-decoration: none;
            color: black;
        }

        .autora {
            display: flex;
            flex-direction: column;
        }

        .autora img {
            width: 100px;
            height: 110px;
        }

        .footerDerecha {
            display: flex;
            flex-direction: column;
        }

        .enlaces {
            display: flex;
        }

        .usuarios{
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
<header class="cabecera">
    <nav>
        <ul>
            <li><a href="handspaws.blade.php"></a></li>
            <li><a href=""><b>Iniciar sesión</b></a></li>
            <li><a href=""><b>Registrarse</b></a></li>
        </ul>
    </nav>
</header>

<div class="fotoPrincipal">
</div>
<main>
    <form action="{{ route('handspaws') }}" method="GET">
        <input type="text" name="ubicacion" placeholder="Buscar por ubicación">
        <input type="submit" value="Filtrar">
    </form>
    <div class="usuarios">
        @foreach($usuarios as $usuario)
            <ul>
                <li><a href="{{ route('mostrarUsuarios', $usuario->id) }}">{{$usuario->nombre}}</a></li>
                <li>Especie de la mascota: {{$usuario->raza_mascota}}</li>
                <li>Ubicación: {{$usuario->ubicacion}}</li>
            </ul>
        @endforeach
    </div>
</main>

<footer class="pie">
    <div class="autora">
        <p>2023-2024 | Ana Xiang López Martínez</p>
    </div>
    <div class="footerDerecha">
        <div class="enlaces">
            <p><a href="#">Política de privacidad</a></p>
            <p><a href="#">Política de cookies</a></p>
            <p><a href="#">Aviso legal</a></p>
        </div>
    </div>
</footer>

</body>

</html>
