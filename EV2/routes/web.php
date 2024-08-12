<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
})->name('raiz');

Route::get('/login', [UserController::class, 'formularioLogin'])->name('usuario.login');
Route::post('/login', [UserController::class, 'login'])->name('usuario.validar');
Route::get('/users/register', [UserController::class, 'formularioNuevo'])->name('usuario.registrar');
Route::post('/users/register', [UserController::class, 'registrar'])->name('usuario.registrar');