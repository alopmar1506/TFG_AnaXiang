<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario editar usuario</title>
</head>
<body>
@foreach($errors->all() as $error)
<span>{{ $error }}</span> <br>
@endforeach
<h1>Edición del coche {{$usuario->nombre}}</h1>
<form method="post" action="{{ route('actualizarUsuario',$usuario->id  )}}">
    @csrf
    @method('PUT')
    <input type="text" name="nombre" id="nombre" placeholder="Marca del coche" value="{{old('nombre',$usuario->nombre)}}">
    <br>
    <input type="text" name="apellido" id="apellido" placeholder="Modelo del coche" value="{{old('apellido',$usuario->apellido)}}">
    <br>
    <input type="text" name="direccion" id="direccion" placeholder="Color del coche" value="{{old('direccion',$usuario->direccion)}}">
    <br>
    <input type="text" name="email" id="email" placeholder="Matricula del coche" value="{{old('email',$usuario->email)}}">
    <br>
    <input type="text" name="contrasena" id="contrasena" placeholder="Matricula del coche" value="{{old('contrasena',$usuario->contrasena)}}">
    <br>
    <input type="text" name="especie" id="especie" placeholder="Matricula del coche" value="{{old('especie',$usuario->especie)}}">
    <br>
    <input type="text" name="fotoUsuario" id="fotoUsuario" placeholder="Matricula del coche" value="{{old('fotoUsuario',$usuario->fotoUsuario)}}">
    <br>
    <input type="text" name="descripcion" id="descripcion" placeholder="Matricula del coche" value="{{old('descripcion',$usuario->descripcion)}}">
    <br>
    <input type="text" name="rol" id="rol" placeholder="Matricula del coche" value="{{old('rol',$usuario->rol)}}">
    <br>
    <input type="submit" value="Actualizar coche">
</form>
</body>
</html>


