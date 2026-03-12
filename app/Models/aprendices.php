<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aprendices extends Model
{
    use HasFactory;

    /*
    * El modelo "aprendices" representa a los aprendices en la aplicación.
    * Este modelo se conecta a la tabla "tblaprendices" en la base de datos y define las relaciones con
    * otros modelos como "tiposdocumentos", "eps" y "fichasdecaracterizacion".
        * 
        * Atributos:
        * - nis: Número de identificación del aprendiz (clave primaria).
        * - numdoc: Número de documento del aprendiz.
        * - nombres: Nombres del aprendiz.
        * - apellidos: Apellidos del aprendiz.
        * - direccion: Dirección del aprendiz.
        * - telefono: Teléfono del aprendiz.
        * - correoinstitucional: Correo institucional del aprendiz.
        * - correopersonal: Correo personal del aprendiz.
        * - sexo: Sexo del aprendiz.
        * - fechanac: Fecha de nacimiento del aprendiz.
        * - tbltiposdocumentos_nis: Clave foránea que relaciona con el tipo de documento.
        * - tbleps_nis: Clave foránea que relaciona con la EPS.
        * - tblfichasdecaracterizacion_nis: Clave foránea que relaciona con la ficha de caracterización.

    * Relaciones:
    * - tiposdocumentos(): Define la relación de pertenencia con el modelo "tiposdocumentos".
    * - eps(): Define la relación de pertenencia con el modelo "eps".
    * - fichasdecaracterizacion(): Define la relación de pertenencia con el modelo "fichasdecaracterizacion".
    */

    protected $table = 'tblaprendices';

    protected $primaryKey = 'nis';

    protected $casts = [
        'fechanac' => 'date',];

    protected $fillable = [ 
        'numdoc', 'nombres', 'apellidos', 'direccion', 'telefono', 'correoinstitucional', 'correopersonal', 'sexo',
         'fechanac', 'tbltiposdocumentos_nis',
         'tbleps_nis', 'tblfichasdecaracterizacion_nis'];

          public function tiposdocumentos()
    {
        // El segundo parámetro es la llave foránea real en tu tabla
        return $this->belongsTo(tiposdocumentos::class, 'tbltiposdocumentos_nis');
    }

    // Relación con EPS
    public function eps()
    {
        return $this->belongsTo(eps::class, 'tbleps_nis');
       
    }

    public function fichasdecaracterizacion() 
{
    return $this->belongsTo(fichasdecaracterizacion::class, 'tblfichasdecaracterizacion_nis');
}


    public $timestamps = false;
}
