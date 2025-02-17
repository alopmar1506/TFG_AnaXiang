<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/handspaws', [usuarioController::class,'index'])->name('handspaws');
Route::get('/handspaws/{id}', [usuarioController::class, 'show'])->name('mostrarUsuarios');

