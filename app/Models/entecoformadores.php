<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entecoformadores extends Model
{
    use HasFactory;
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
