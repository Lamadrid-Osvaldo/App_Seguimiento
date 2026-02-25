<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiposdocumentos extends Model
{
    use HasFactory;
    protected $table = 'tbltiposdocumentos';

    protected $primaryKey = 'nis';

    protected $fillable = [
        'denominacion',
        'observaciones'];

    public $timestamps = false;
}
