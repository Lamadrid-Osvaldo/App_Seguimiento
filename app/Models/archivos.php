<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class archivos extends Model
{
    use HasFactory;

    /*
    * El modelo "archivos" representa los archivos subidos por los aprendices en la aplicación.
    * Este modelo se conecta a la tabla "tblarchivos" en la base de datos y define los atributos
    * relacionados con los archivos, como el nombre original, la ruta, el tipo y la fecha de creación.
    * Atributos:
    * - nis: El número de identificación del archivo (clave primaria).
    * - nombre_original: El nombre original del archivo subido.
    * - ruta: La ruta donde se almacena el archivo en el servidor.
    * - tipo: El tipo de archivo (por ejemplo, PDF, imagen, etc.).
    * - created_at: La fecha y hora en que se subió el archivo.
    */

    protected $table = 'tblarchivos';

    protected $primaryKey = 'nis';

    public $timestamps = false;

    protected $fillable = [
        'nombre_original', 'ruta', 'tipo','created_at'
    ];  

    protected $casts = [
        'created_at' => 'datetime',
    ];


}
