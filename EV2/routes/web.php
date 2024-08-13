<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
})->name('raiz');

//RUTAS INICIO DE SESIÓN - LOGIN
Route::get('/login', [UserController::class, 'formularioLogin'])->name('usuario.login');
Route::post('/login', [UserController::class, 'login'])->name('usuario.validar');

//RUTAS LOGOUT
Route::post('/logout', [UserController::class, 'logout'])->name('usuario.logout');

//RUTAS PARA REGISTRO DE USUARIO
Route::get('/users/register', [UserController::class, 'formularioNuevo'])->name('usuario.registrar');
Route::post('/users/register', [UserController::class, 'registrar'])->name('usuario.registrar');

Route::get('/backoffice', function(){
    $user = Auth::user();
    if($user == NULL){
        return redirect()->route('usuario.login')->withErrors(['message'=>'No existe una sesión activa']);
    }
    return view('backoffice.dashboard',['user'=>$user]);
})->name('backoffice.dashboard');