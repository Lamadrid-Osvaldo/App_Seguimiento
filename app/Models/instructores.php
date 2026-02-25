<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instructores extends Model
{
    use HasFactory;
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
