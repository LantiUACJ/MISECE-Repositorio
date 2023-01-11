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

Route::get('/', [\App\Http\Controllers\SiteController::class, "index"]);
Route::get('/consultar', [\App\Http\Controllers\SiteController::class, "consultar"]);

Route::get('alergias', [\App\Http\Controllers\AlergiasController::class, "index"]);
Route::get('diagnostico', [\App\Http\Controllers\DiagnosticoController::class, "index"]);
Route::get('encuentro', [\App\Http\Controllers\EncuentroController::class, "index"]);
Route::get('imagenes', [\App\Http\Controllers\ImagenesController::class, "index"]);
Route::get('medicamento', [\App\Http\Controllers\MedicamentoController::class, "index"]);
Route::get('observacion', [\App\Http\Controllers\ObservacionController::class, "index"]);
Route::get('organizacion', [\App\Http\Controllers\OrganizacionController::class, "index"]);
Route::get('paciente', [\App\Http\Controllers\PacienteController::class, "index"]);

