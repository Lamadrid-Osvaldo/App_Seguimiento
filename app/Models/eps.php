<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eps extends Model
{
    use HasFactory;

    /*
    * El modelo "eps" representa las Entidades Promotoras de Salud (EPS) en la aplicación.
    * Este modelo se conecta a la tabla "tbleps" en la base de datos y define los atributos relacionados con las EPS, como el número de documento, la denominación y las observaciones.
    * Atributos:
    * - nis: El número de identificación de la EPS (clave primaria).
    * - numdoc: El número de documento de la EPS.
    * - denominacion: La denominación (nombre) de la EPS.
    * - observaciones: Cualquier observación adicional relacionada con la EPS.
    */
    protected $table = 'tbleps';

    protected $primaryKey  = 'nis';
    
    protected $fillable = [
        'numdoc',
        'denominacion',
        'observaciones'
    ];

    public $timestamps = false;
}
