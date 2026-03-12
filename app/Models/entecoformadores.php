<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entecoformadores extends Model
{
    use HasFactory;

    /*
    * El modelo "entecoformadores" representa los entes coformadores en la aplicación.
    * Este modelo se conecta a la tabla "tblentecoformadores" en la base de datos y define los atributos
    * relacionados con los entes coformadores, como el tipo de documento, el número de documento, la razón social,
    * la dirección, el teléfono y el correo institucional.
    *
    * Atributos:
    * - nis: El número de identificación del ente coformador (clave primaria).
    * - tdoc: El tipo de documento del ente coformador.
    * - numdoc: El número de documento del ente coformador.
    * - razonsocial: La razón social (Nombre) del ente coformador.
    * - direccion: La dirección del ente coformador.
    * - telefono: El número de teléfono del ente coformador.
    * - correoinstitucional: El correo institucional del ente coformador.
    *
    */
    protected $table = 'tblentecoformadores';

    protected $primaryKey = 'nis';

    protected $fillable = [
        'tdoc',
        'numdoc',
        'razonsocial',
        'direccion',
        'telefono',
        'correoinstitucional'];

    public $timestamps = false;
}
