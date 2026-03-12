<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash; 
use App\Models\usuarios;

class RecuperarPassController extends Controller
{
    /**
     * Controlador para gestionar el proceso de recuperación de contraseña, incluyendo:
     * 1. Enviar un enlace de restablecimiento al correo del usuario.
     * 2. Mostrar un formulario para que el usuario ingrese su nueva contraseña.
     * 3. Validar y actualizar la nueva contraseña en la base de datos.
     * 
     * Cada método corresponde a una acción específica en el proceso de recuperación de contraseña.
     * 
     * - enviarEnlace(): Valida el correo del usuario, genera un token y envía un enlace de restablecimiento.
     * - mostrarFormularioReset(): Muestra el formulario para que el usuario ingrese su nueva contraseña.
     * - actualizarClave(): Valida el token y el correo, actualiza la contraseña en la base de datos y elimina el token.
     * 
     */


    // 1. Enviar el correo con el link
    public function enviarEnlace(Request $request)
    {
        // Validar que el correo exista en tu tabla de usuarios
        $request->validate([
            'email' => 'required|email|exists:tblusuarios,email'
        ], [
            'email.exists' => 'Este correo no está registrado en nuestro sistema.'
        ]);

        // Crear un token aleatorio de 64 caracteres
        $token = Str::random(64);

        // Guardar el token 
        DB::table('tblolvide_contrasena_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token,
             'created_at' => now()]
        );

        // Enviar el correo
        Mail::send('emails.recuperar', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Restablecer Contraseña - Sistema SENA');
        });

        return back()->with('status', '¡Te hemos enviado un enlace a tu correo!');
    }

    // 2. Mostrar el formulario para escribir la NUEVA clave
    public function mostrarFormularioReset($token)
    {
        return view('usuarios.newPass', ['token' => $token]);
    }

    // 3. Guardar la nueva clave en la base de datos
    public function actualizarClave(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:tblusuarios,email',
            'password' => 'required|confirmed|min:6', 
            'token' => 'required'
        ]);

        // Verificar si el token y el email coinciden 
        $registro = DB::table('tblolvide_contrasena_tokens')
            ->where(['email' => $request->email, 'token' => $request->token])
            ->first();

        if (!$registro) {
            return back()->withErrors(['email' => 'El enlace es inválido o ya expiró.']);
        }

        // Actualizar la contraseña del usuario (Encriptada)
        usuarios::where('email', $request->email)
            ->update(['contrasena' => Hash::make($request->password)]);

        // Borrar el token para que no se pueda usar dos veces
        DB::table('tblolvide_contrasena_tokens')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('status', '¡Contraseña actualizada con éxito! Ya puedes iniciar sesión.');
    }
}