<?php

namespace App\Http\Controllers;

use App\Models\ProyectosModel;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    // POST - 1. Controlador para crear un proyecto. (Proyecto: id, nombre, fecha_inicio, estado, responsable, monto)
    public function crearProyecto($_nuevo){
        //Llamamos a la conexión, instanciamos el objeto.
        //Hacemos la query
        //Hacemos el $rs null
        try {
            //Se crea el nuevo proyecto y se almacena en $rs 
        } catch (\Throwable $th){
            $rs = null; //Si no se puede crear $rs sigue null
        }
        
        //Se da la respuesta true o null para rs
        //Se cierra la conexión    
        if ($rs_p) {
            return true;
        }
        return null; 
    }
    
    //Otra opción
    public function new($_nuevo){
        //crear el objeto nuevo
        $nuevo = new ProyectosModel();
    }

    // GET ALL - 2. Controlador para obtener los proyectos.
    public function getAll()
    {
        //Llamamos a la conexión, instanciamos el objeto.
        //Hacemos la query
        //Hacemos el $rs para almacenar los objetos en una cola y que se recorra en el if
        if ($rs) {
            //Mientras haya objetos en rs se almacenarán en un arreglo
        }
        //Cerramos la conexión
        //Retornamos el arreglo con todos los datos
    }


    // FUNCIÓN PARA COMPROBAR QUE EL ID EXISTE EN EL REGISTRO ANTES DE USAR DELETE, GET BY ID, ACTUALIZAR POR ID.
    public function comprobarId($_id)
    {
        //Llamamos a la conexión, instanciamos el objeto.
        //Hacemos la query
        //Hacemos el $rs null 
        try{
            //comprombamos que el id ingresado existe en el registro de la bd
        }catch (){
            //$rs sigue siendo null
        }
        //Cerramos la conexión
        //Retornamos la respuesta
    }

    // UPDATE - 3. Controlador para actualizar un proyecto por id.
    //Asumiendo que ya se comprobó previamente que el id si existe en el registro, se corre la función.
    public function update($_nuevo){ //El objeto que ingresa debe incluir los datos a modificar y el id que corresponde.
        if($_id == NULL){
            //se informa que no se ingresó el valor del id
        }else{            
            //corro la función para actualizar los datos del id ingresado
        }
    }


    // DELETE BY ID - 4. Controlador para eliminar un proyecto por id.
    //Asumiendo que ya se comprobó previamente que el id si existe en el registro, se corre la función.
    public function delete($_id){
        if($_id == NULL){
            //se informa que no se ingresó el valor del id
        }else{            
            //corro la función para eliminar los datos del id ingresado
        }
    }

    // GET BY ID - 5. Controlador para obtener un proyecto por id.
    //Asumiendo que ya se comprobó previamente que el id si existe en el registro, se corre la función.
    public function get($_id){
        if($_id == NULL){
            //se informa que no se ingresó el valor del id
        }else{            
            //corro la función para rescatar los datos del id ingresado
        }
    }


}
