<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Rutas para registro

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    // Ruta para mostrar el formulario de registro
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');

    // Ruta para procesar el formulario de registro
    Route::post('/register', [AuthController::class, 'register'])->name('register');


// Grupo para usuarios autenticados
Route::middleware('auth:api')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
