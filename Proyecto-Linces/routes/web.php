<?php

use Illuminate\Support\Facades\Route;

// 1. Listar todos los proyectos.
Route::get('/Proyectos', function () {
    return view('GetAllProyectosView');
});

// 2. Agregar Proyecto.
Route::post('/proyectos', function () {
    return view('PostProyectosView');
});

// 3. Eliminar proyecto por su Id.
Route::delete('/proyectos/{$_id}', function($_id) {
    return view('DeleteProyectosView');
});

// 4. Actualizar proyecto por su id.
Route::update('/proyectos/{$_id}', function($_id) {
    return view('UpdateProyectosView');
});

// 5. Obtener un proyecto por su id.
Route::get('/proyectos/{$_id}', function($_id) {
    return view('GetByIdProyectosView');
    //return "descripción del proyecto buscado con el id: {$_id}";    
});