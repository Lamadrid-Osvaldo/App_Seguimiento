<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class usuarios extends Authenticatable
{
    use HasFactory, Notifiable;

    // 1. Nombre de la tabla que recreaste en SQL
    protected $table = 'tblusuarios';

    // 2. Tu llave primaria personalizada
    protected $primaryKey = 'nis';

    // 3. Activamos los timestamps con tus nombres de columna
    public $timestamps = true;
    const created_at = 'created_at';
    const updated_at = 'updated_at';
    
    // 4. Campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre',
        'email',
        'contrasena',
    ];

    // 5. Campos ocultos (para que no salgan en consultas JSON)
    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    /**
     * IMPORTANTE: Laravel busca por defecto la columna 'password'.
     * Como la tuya se llama 'contrasena', este método le dice a Laravel dónde mirar.
     */
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}

