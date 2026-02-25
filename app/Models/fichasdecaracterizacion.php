<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fichasdecaracterizacion extends Model
{
    use HasFactory;
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
