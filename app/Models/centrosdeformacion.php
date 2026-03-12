<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centrosdeformacion extends Model
{
    use HasFactory;
    /*
    * El modelo "centrosdeformacion" representa los centros de formación en la aplicación.
    * Este modelo se conecta a la tabla "tblcentrosdeformacion" en la base de datos y define los
    * atributos relacionados con los centros de formación, como el código, la denominación, la dirección,
    * las observaciones y la relación con las regionales.
    *
    * Atributos:
    * - nis: El número de identificación del centro de formación (clave primaria).
    * - codigo: El código del centro de formación.
    * - denominacion: La denominación del centro de formación.
    * - direccion: La dirección del centro de formación.    
    * - observaciones: Cualquier observación adicional sobre el centro de formación.
    * - tblregionales_nis: Clave foránea que relaciona el centro de formación con una regional específica.
    *
    * Relaciones:
    * - regional(): Define la relación de pertenencia con el modelo "regionales", indicando que cada centro de formación
    * pertenece a una regional específica.
    */
    protected $table = 'tblcentrosdeformacion';

    protected $primaryKey = 'nis';

 
    protected $fillable = [
        'codigo',
        'denominacion',
        'direccion',
        'observaciones',
        'tblregionales_nis'
    ];

    function regional(){
        return $this->belongsTo(regionales::class, 'tblregionales_nis', 'nis');
    }

    public $timestamps = false;
}
