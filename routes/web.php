<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\SiteController::class, "index"])->name("home");

Route::get('/login', [\App\Http\Controllers\SiteController::class, "login"]);
Route::post('/login', [\App\Http\Controllers\SiteController::class, "loginPost"]);
Route::get('/logout', [\App\Http\Controllers\SiteController::class, "logout"]);
Route::get('/inicio', [\App\Http\Controllers\SiteController::class, "home"]);
Route::get('/consultar', [\App\Http\Controllers\SiteController::class, "consultar"]);
Route::get('/administrar', [\App\Http\Controllers\SiteController::class, "administrar"])->middleware("auth");
Route::get('/administrar/actualizar', [\App\Http\Controllers\SiteController::class, "actualizar"])->middleware("auth");

Route::get('alergias', [\App\Http\Controllers\AlergiasController::class, "index"]);
Route::get('diagnostico', [\App\Http\Controllers\DiagnosticoController::class, "index"]);
Route::get('encuentro', [\App\Http\Controllers\EncuentroController::class, "index"]);
Route::get('imagenes', [\App\Http\Controllers\ImagenesController::class, "index"]);
Route::get('medicamento', [\App\Http\Controllers\MedicamentoController::class, "index"]);
Route::get('observacion', [\App\Http\Controllers\ObservacionController::class, "index"]);
Route::get('organizacion', [\App\Http\Controllers\OrganizacionController::class, "index"]);
Route::get('paciente', [\App\Http\Controllers\PacienteController::class, "index"]);

Route::get('descargar', [\App\Http\Controllers\DownloadController::class, "index"]);
Route::get('descargar/organizacion/{org}', [\App\Http\Controllers\DownloadController::class, "organizacion"]);
Route::get('descargar/organizacion', [\App\Http\Controllers\DownloadController::class, "organizacionForm"]);
Route::get('descargar/estado/{estado}', [\App\Http\Controllers\DownloadController::class, "estado"]);
Route::get('descargar/estado', [\App\Http\Controllers\DownloadController::class, "estadoForm"]);
Route::get('descargar/todo', [\App\Http\Controllers\DownloadController::class, "todo"]);