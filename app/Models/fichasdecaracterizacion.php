<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fichasdecaracterizacion extends Model
{
    use HasFactory;

    /*
    * El modelo "fichasdecaracterizacion" representa las fichas de caracterización en la aplicación.
    * Este modelo se conecta a la tabla "tblfichasdecaracterizacion" en la base de datos y define
    * los atributos relacionados con las fichas de caracterización, como el código, la denominación,
    * el cupo, las fechas de inicio y fin de la ficha, las observaciones, y las relaciones con los
    * centros de formación y los programas de formación.

    * Atributos:
    * - nis: El número de identificación de la ficha de caracterización (clave primaria).
    * - codigo: El código de la ficha de caracterización.
    * - denominacion: La denominación (nombre) de la ficha de caracterización.
    * - cupo: El cupo disponible para la ficha de caracterización.
    * - fechainicio: La fecha de inicio de la ficha de caracterización.
    * - fechafin: La fecha de fin de la ficha de caracterización.
    * - observaciones: Cualquier observación adicional relacionada con la ficha de caracterización.
    * - tblcentrosdeformacion_nis: La relación con el centro de formación asociado a la ficha de caracterización.
    * - tblprogramasdeformacion_nis: La relación con el programa de formación asociado a la ficha de caracterización.
    *
    * Relaciones:
    * - centrosdeformacion: La relación con el modelo "centrosdeformacion" que representa el centro de formación
    * asociado a la ficha de caracterización.
    * - programasdeformacion: La relación con el modelo "programasdeformacion" que representa el programa de 
    * formación asociado a la ficha de caracterización.
    */

    protected $table = 'tblfichasdecaracterizacion';

    protected $primaryKey = 'nis';

    protected $casts = [
        'fechainicio' => 'date',
        'fechafin' => 'date',
    ];

    protected $fillable = [
        'codigo', 'denominacion', 'cupo', 'fechainicio', 'fechafin',
         'observaciones', 'tblcentrosdeformacion_nis', 'tblprogramasdeformacion_nis'];

         public function centrosdeformacion()
    {
        // El segundo parámetro es la llave foránea real en tu tabla
        return $this->belongsTo(centrosdeformacion::class, 'tblcentrosdeformacion_nis');
    }

    // Relación con Programas de Formación
    public function programasdeformacion()
    {
        return $this->belongsTo(programasdeformacion::class, 'tblprogramasdeformacion_nis');
    }

    public $timestamps = false;
}
