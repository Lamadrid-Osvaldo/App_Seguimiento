<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class usuarios extends Authenticatable
{
    use HasFactory, Notifiable;

    /*
    * El modelo "usuarios" representa a los usuarios en la aplicación.
    * Este modelo se conecta a la tabla "tblusuarios" en la base de datos y define
    * los atributos relacionados con los usuarios, como el nombre, el correo electrónico y la contraseña.
    * Atributos:
    * - nis: El número de identificación del usuario (clave primaria).
    * - nombre: El nombre del usuario.
    * - email: El correo electrónico del usuario.
    * - contrasena: La contraseña del usuario (almacenada de forma segura).
    * - created_at: La fecha y hora de creación del registro del usuario.
    * - updated_at: La fecha y hora de la última actualización del registro del usuario.
    * Además, el modelo implementa la autenticación utilizando el campo "contrasena" como la contraseña del usuario.
    * El método getAuthPassword() se sobrescribe para indicar que la contraseña del usuario se encuentra en el campo 
    * "contrasena" en lugar del campo predeterminado "password".
    */
    
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

