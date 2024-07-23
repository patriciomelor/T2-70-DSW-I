<?php

namespace App\Http\Controllers;

use App\Models\ProyectosModel;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    // POST - 1. Controlador para crear un proyecto. (Proyecto: id, nombre, fecha_inic, estado, responsable, monto)
    public function crearProyecto($_nuevo){
        $_nuevo = new ProyectosModel();
        $con = new Conexion(); //Llamamos a la conexión new Conexion, instanciamos el objeto.
        
        //Se crea una query para cada tabla en la que se quieren ingresar datos
        $sql_p = "INSERT INTO proyectos(id, nombre, fecha_inic, estado, responsable, monto) VALUES
                ($_nuevo->id,'$_nuevo->value_nombre', '$_nuevo->fecha_inicio', '$_nuevo->estado', '$_nuevo->responsable','$_nuevo->monto')"; //Hacemos una query, que copiamos de query.php

        //Se crean dos respuestas vacías, una para cada query
        $rs_p= [];

        //Se consulta cada respuesta
        try {
            $rs_p = mysqli_query($con->getConnection(), $sql_p); 
        } catch (\Throwable $th){
            $rs_p = null;
        }
        
        //Se da la respuesta true o null para rs_p
        $con->closeConnection();//Cerramos la conexión    
        if ($rs_p) {
            return true;
        }
        return null; 
    }
    
    // GET ALL - 2. Controlador para obtener los proyectos.
    // PUT? - 3. Controlador para actualizar un proyecto por id.
    // DELETE BY ID - 4. Controlador para eliminar un proyecto por id.
    // GET BY ID - 5. Controlador para obtener un proyecto por id.

}
