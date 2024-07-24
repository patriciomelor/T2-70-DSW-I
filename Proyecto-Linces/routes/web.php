<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/proyectos', function () {
    return view('ProyectosView');
});
Route::get('/proyectos/{$_id}', function($_id) {
    return "mantenedor del id buscado: {$_id}";    
});