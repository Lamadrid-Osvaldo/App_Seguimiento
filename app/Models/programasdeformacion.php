<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programasdeformacion extends Model
{
    use HasFactory;

    /*
    * El modelo "programasdeformacion" representa los programas de formación en la aplicación.
    * Este modelo se conecta a la tabla "tblprogramasdeformacion" en la base de datos y define 
    * los atributos relacionados con los programas de formación, como el código, la denominación y las observaciones.
    *
    * Atributos:
    * - nis: El número de identificación del programa de formación (clave primaria).
    * - codigo: El código del programa de formación.
    * - denominacion: La denominación (nombre) del programa de formación.
    * - observaciones: Cualquier observación adicional relacionada con el programa de formación.
    */
    protected $table = 'tblprogramasdeformacion';

    protected $primaryKey = 'nis';

    protected $fillable = [
        'codigo',
        'denominacion',
        'observaciones'];

    public $timestamps = false;
}
