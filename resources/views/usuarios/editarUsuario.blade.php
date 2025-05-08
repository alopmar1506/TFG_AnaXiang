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
<form method="post" action="{{ route('actualizarUsuario',$usuario->id)}}">
    @csrf
    @method('PUT')
    <input type="text" name="nombre" id="nombre" placeholder="Introduce el nombre" value="{{old('nombre',$usuario->nombre)}}">
    <br>
    <input type="text" name="apellido" id="apellido" placeholder="Introduce el apellido" value="{{old('apellido',$usuario->apellido)}}">
    <br>
    <input type="text" name="direccion" id="direccion" placeholder="Introduce la direccion" value="{{old('direccion',$usuario->direccion)}}">
    <br>
    <input type="text" name="email" id="email" placeholder="Introduce el email" value="{{old('email',$usuario->email)}}">
    <br>
    <input type="text" name="contrasena" id="contrasena" placeholder="Introduce la contraseña" value="{{old('contrasena',$usuario->contrasena)}}">
    <br>
    <input type="file" name="fotoUsuario" id="fotoUsuario" value="{{old('fotoUsuario',$usuario->fotoUsuario)}}">
    <br>
    <input type="text" name="descripcion" id="descripcion" placeholder="Introduce la descripción" value="{{old('descripcion',$usuario->descripcion)}}">
    <br>
    <input type="submit" value="Actualizar información">
</form>
</body>
</html>

