<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class usuarios extends Authenticatable
{
    use HasFactory, Notifiable;

    
    protected $table = 'tblusuarios';

    
    protected $primaryKey = 'nis';

    
    public $timestamps = true;
    const created_at = 'created_at';
    const updated_at = 'updated_at';
    
    
    protected $fillable = [
        'nombre',
        'email',
        'contrasena',
    ];

    
    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}

