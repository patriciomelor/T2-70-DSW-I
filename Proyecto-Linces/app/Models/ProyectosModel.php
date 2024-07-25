
    <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectosModel extends Model
{
    use HasFactory;

    //DEFINICIÓN DE LOS ATRIBUTOS DE LA CLASE
    private $id;
    private $nombre;
    private $fecha_inicio;
    private $estado;
    private $responsable;
    private $monto;

    //MÉTODO CONSTRUCTOR PARA GENERAR LA INSTANCIA
    public function __construct()
    {
        //Seteamos datos del constructor  
    }    

    //MUTADORES (Permiten generar cambios)
    public function setId($_nuevo){
        $this->id = $_nuevo;
    }
    public function setNombre($_nuevo){
        $this->nombre = $_nuevo;
    }
    public function setFecha_inicio($_nuevo){
        $this->fecha_inicio = $_nuevo;
    }
    public function setEstado($_nuevo){
        $this->estado = $_nuevo;
    }
    public function setResponsable($_nuevo){
        $this->responsable = $_nuevo;
    }
    public function setMonto($_nuevo){
        $this->monto = $_nuevo;
    }

    //ACCESADORES (Permiten obtener el valor)
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getFecha_inicio(){
        return $this->fecha_inicio;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function getResponsable(){
        return $this->responsable;
    }
    public function getMonto(){
        return $this->monto;
    }
    
}

