<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolesadministrativos extends Models
{
    use HasFactory;
        /*
    * El modelo "rolesadministrativos" representa los roles administrativos en la aplicación.
    * Este modelo se conecta a la tabla "tblrolesadministrativos" en la base de datos y define los atributos relacionados con los roles administrativos, como la descripción.
    * Atributos:
    * - nis: El número de identificación del rol administrativo (clave primaria).
    * - descripcion: La descripción del rol administrativo.
    */
    protected $table = 'tblrolesadministrativos';

    protected $primaryKey = 'nis';

    protected $fillable = [
        'descripcion'];

    public $timestamps = false;
}
