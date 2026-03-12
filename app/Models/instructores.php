<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instructores extends Model
{
    use HasFactory;

    /*
    * El modelo "instructores" representa a los instructores en la aplicación.
    * Este modelo se conecta a la tabla "tblinstructores" en la base de datos y
    * define los atributos relacionados con los instructores, como el número de documento, los nombres,
    * los apellidos, la dirección, el teléfono, los correos institucional y personal, el sexo, la fecha
    * de nacimiento, y las relaciones con los tipos de documentos, las EPS y los roles administrativos.
    *
    * Atributos:
    * - nis: El número de identificación del instructor (clave primaria).
    * - numdoc: El número de documento del instructor.
    * - nombres: Los nombres del instructor.
    * - apellidos: Los apellidos del instructor.
    * - direccion: La dirección del instructor.
    * - telefono: El número de teléfono del instructor.
    * - correoinstitucional: El correo institucional del instructor.
    * - correopersonal: El correo personal del instructor.
    * - sexo: El sexo del instructor.
    * - fechanac: La fecha de nacimiento del instructor.
    * - tbltiposdocumentos_nis: La relación con el tipo de documento del instructor.
    * - tbleps_nis: La relación con la EPS del instructor.
    * - tblrolesadministrativos_nis: La relación con el rol administrativo del instructor.
    *
    * Relaciones:
    * - tiposdocumentos: La relación con el modelo "tiposdocumentos" que representa el tipo de documento del instructor.
    * - eps: La relación con el modelo "eps" que representa la EPS del instructor.
    * - rolesadministrativos: La relación con el modelo "rolesadministrativos" que representa el rol administrativo del instructor.
    */
    protected $table = 'tblinstructores';

    protected $primaryKey = 'nis';

    protected $casts = [
        'fechanac' => 'date',];

    protected $fillable = [
        'numdoc', 'nombres', 'apellidos', 'direccion', 'telefono', 'correoinstitucional',
         'correopersonal', 'sexo', 'fechanac',
         'tbltiposdocumentos_nis', 'tbleps_nis', 'tblrolesadministrativos_nis'];


    public function tiposdocumentos()
    {
        
        return $this->belongsTo(tiposdocumentos::class, 'tbltiposdocumentos_nis');
    }           
    
    public function eps()
    {
        return $this->belongsTo(eps::class, 'tbleps_nis');  

    }
    public function rolesadministrativos()
    {
        return $this->belongsTo(rolesadministrativos::class, 'tblrolesadministrativos_nis');
    }

    public $timestamps = false;
}
