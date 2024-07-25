<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    //1. Controlador para crear un proyecto.
    public function new($_nuevo)
    {
        //Crear el objeto nuevo
    }
    
    //2. Controlador para obtener los proyectos y 5. Controlador para obtener un proyecto por id.
    public function get($_id)
    {
        if ($_id == NULL) {
            //Retorno todo
        } else {
            //Busca por el id
        }
    }

    //3. Controlador para actualizar un proyecto por id.
    public function update($_nuevo)
    {
        //Recordar setear el id
    }

    //4. Controlador para eliminar un proyecto por id.
    public function delete($_id)
    {
        //Para eliminar
    }
}