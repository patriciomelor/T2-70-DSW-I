<?php

use Illuminate\Support\Facades\Route;
// 1. Listar todos los proyectos.
Route::get('/GetAllProyectos', function () {
    return view('GetAllProyectosView');
});

// 2. Agregar Proyecto.
Route::post('/PostProyectos', function () {
    return view('PostProyectosView');
});

// 3. Eliminar proyecto por su Id.
Route::delete('/DeleteProyectos/{$_id}', function($_id) {
    return view('DeleteProyectosView');
});

// 4. Actualizar proyecto por su id.
Route::put('/UpdateProyectos/{_id}', function($_id) {
    return view('UpdateProyectosView');
});

// 5. Obtener un proyecto por su id.
Route::get('/GetByIdProyectos/{$_id}', function($_id) {
    return view('GetByIdProyectosView');
    //return "descripción del proyecto buscado con el id: {$_id}";    
});