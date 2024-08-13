<!-- MODELO DE PROYECTO QUE USARÁ EL CONTROLADOR     -->
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    //MODELO DE USUARIOS QUE USARÁ EL CONTROLADOR
    protected $fillable = [
        'id_proyecto',
        'nombre',
        'fecha_inicio',
        'estado',
        'responsable',
        'monto',
        'creador'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    /**
     * @return array<string, string>
     */
    protected $casts = [
        'fecha_inicio' => 'datetime',
    ];
}
