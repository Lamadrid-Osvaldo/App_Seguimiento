<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regionales extends Model
{
    use HasFactory;

        /*
    * El modelo "regionales" representa las regionales en la aplicación.
    * Este modelo se conecta a la tabla "tblregionales" en la base de datos y define
    * los atributos relacionados con las regionales, como el código, la denominación y las observaciones.
    *
    * Atributos:
    * - nis: El número de identificación de la regional (clave primaria).
    * - codigo: El código de la regional.
    * - denominacion: La denominación (nombre) de la regional.
    * - observaciones: Cualquier observación adicional relacionada con la regional.
    */
    protected $table = 'tblregionales';

    protected $primaryKey = 'nis';


    protected $fillable = [
        'codigo',
        'denominacion',
        'observaciones'];

    public $timestamps = false;
}
