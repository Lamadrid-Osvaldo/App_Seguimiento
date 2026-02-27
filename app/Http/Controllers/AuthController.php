<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Muestra el formulario de login
    public function showLogin()
    {
        return view('login'); // Esto busca el archivo resources/views/login.blade.php
    }

    // Procesa el intento de login
    public function login(Request $request)
    {
        // Validamos los datos que vienen del formulario
        $credentials = $request->validate([
            'email' => 'required|email',
            'contrasena' => 'required', // El nombre que usaste en tu tabla
        ]);

        // Intentamos autenticar. 
        // IMPORTANTE: Laravel siempre espera la llave 'password' para el intento,
        // pero usará tu columna 'contrasena' gracias al modelo que configuramos.
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['contrasena']])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        // Si falla, volvemos atrás con error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // Cierra la sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}