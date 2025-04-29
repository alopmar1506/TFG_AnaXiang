<?php

use App\Http\Controllers\perfilController;
use App\Http\Controllers\usuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//USUARIO
Route::get('index', [usuarioController::class,'index'])->name('handspaws');
Route::get('usuario/{id}', [usuarioController::class, 'show'])->name('perfilUsuario');
Route::get('crearUsuario', [usuarioController::class, 'create'])->name('crearUsuario');
Route::post('handspaws', [usuarioController::class, 'store'])->name('guardarUsuario');
Route::get('/editarUsuario/{id}', [usuarioController::class, 'edit'])->name('editarUsuario');
Route::put('index/{id}', [UsuarioController::class, 'update'])->name('actualizarUsuario');


//PERFIL
Route::get('iniciarSesion', [perfilController::class,'index'])->name(name: 'iniciarSesion');
Route::get('perfilUsuario', [perfilController::class,'show'])->name('perfilUsuario');


//MASCOTAS
