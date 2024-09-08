<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// en routes/api.php
use App\Http\Controllers\AuthController;

// Ruta para mostrar el formulario de registro
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('post.login');
use App\Http\Controllers\Auth\LoginController;
// Definir la ruta de logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('user', [AuthController::class, 'getAuthenticatedUser'])->middleware('auth:api');
use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Otras rutas protegidas
});
use App\Http\Controllers\ProjectController;

// Crear rutas de recurso para proyectos
Route::resource('proyects', ProjectController::class);
