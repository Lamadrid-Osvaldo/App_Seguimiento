<?php

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
    return view('welcome');
});



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
