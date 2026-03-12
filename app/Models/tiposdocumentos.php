<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiposdocumentos extends Model
{
    use HasFactory;

        /*
    * El modelo "tiposdocumentos" representa los tipos de documentos en la aplicación.
    * Este modelo se conecta a la tabla "tbltiposdocumentos" en la base de datos y define
    * los atributos relacionados con los tipos de documentos, como la denominación y las observaciones.
    * Atributos:
    * - nis: El número de identificación del tipo de documento (clave primaria).
    * - denominacion: La denominación (nombre) del tipo de documento.
    * - observaciones: Cualquier observación adicional relacionada con el tipo de documento.
    */
    protected $table = 'tbltiposdocumentos';

    protected $primaryKey = 'nis';

    protected $fillable = [
        'denominacion',
        'observaciones'];

    public $timestamps = false;
}
