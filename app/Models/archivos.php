<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class archivos extends Model
{
    use HasFactory;

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
