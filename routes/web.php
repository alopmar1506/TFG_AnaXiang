<?php

use App\Http\Controllers\perfilController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\mascotaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//USUARIO
Route::get('index', [usuarioController::class,'index'])->name('handspaws');
Route::get('usuario/{id}', [usuarioController::class, 'show'])->name('perfilUsuario');
Route::get('crearUsuario', [usuarioController::class, 'create'])->name('crearUsuario');
Route::post('index', [usuarioController::class, 'store'])->name('guardarUsuario');
Route::get('/editarUsuario/{id}', [usuarioController::class, 'edit'])->name('editarUsuario');
Route::put('index/{id}', [UsuarioController::class, 'update'])->name('actualizarUsuario');


//PERFIL
Route::get('iniciarSesion', [perfilController::class,'index'])->name(name: 'iniciarSesion');


//MASCOTAS
Route::get('index', [mascotaController::class, 'index'])->name('handspaws');
Route::get('crearMascota', [mascotaController::class, 'create'])->name('crearMascota');
Route::post('handspaws', [mascotaController::class, 'store'])->name('guardarMascota');
