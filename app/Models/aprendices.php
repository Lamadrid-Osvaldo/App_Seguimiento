<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aprendices extends Model
{
    use HasFactory;
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
