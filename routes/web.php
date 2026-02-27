<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArchivosController;
use App\Http\Controllers\TiposdocumentosController;
use App\Http\Controllers\RegionalesController;
use App\Http\Controllers\ProgramasdeformacionController;
use App\Http\Controllers\InstructoresController;
use App\Http\Controllers\FichasdecaracterizacionController;
use App\Http\Controllers\EntecoformadoresController;
use App\Http\Controllers\CentrosdeformacionController;
use App\Http\Controllers\AprendicesController;
use App\Http\Controllers\RolesadministrativosController;
use App\Http\Controllers\EpsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('principal'); 
})->middleware('auth');



// --- RUTAS PÚBLICAS (Cualquiera puede verlas) ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// --- RUTAS PROTEGIDAS (Solo si pasas por el Login) ---
Route::middleware(['auth'])->group(function () {
    
    // Aquí es donde debes poner la ruta de EPS
    Route::resource('rolesadministrativos', RolesadministrativosController::class);

Route::resource('aprendices', AprendicesController::class);

Route::resource('centrosdeformacion', CentrosdeformacionController::class);

Route::resource('entecoformadores', EntecoformadoresController::class);

Route::resource('fichasdecaracterizacion', FichasdecaracterizacionController::class);

Route::resource('instructores', InstructoresController::class);

Route::resource('tiposdocumentos', TiposdocumentosController::class);

Route::resource('programasdeformacion', ProgramasdeformacionController::class);

Route::resource('eps', EpsController::class);

Route::resource('regionales',RegionalesController::class);

Route::resource('archivos', ArchivosController::class);

    // También tus otras rutas privadas
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

