<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolesadministrativos extends Models
{
    use HasFactory;
    protected $table = 'tblrolesadministrativos';

    protected $primaryKey = 'nis';

    protected $fillable = [
        'descripcion'];

    public $timestamps = false;
}
