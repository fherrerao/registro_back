<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\DocenteController;
use App\Http\Controllers\Api\CompaniaController;
use App\Http\Controllers\Api\SeccionController;
use App\Http\Controllers\Api\AnioController;
use App\Http\Controllers\Api\DestrezasController;
use App\Http\Controllers\Api\PelotonController;
use App\Http\Controllers\Api\CadeteController;
use App\Http\Controllers\Api\CalificacionesController;
use App\Http\Controllers\Api\AsistenciasController;
use App\Http\Controllers\Api\ParametrosController;
use App\Http\Controllers\Api\PruebasController;
use App\Http\Controllers\Api\RegistrosController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('roles', [RolesController::class, 'index']);
Route::post('roles', [RolesController::class, 'store']);
Route::put('roles/{id}', [RolesController::class, 'update']);
Route::delete('roles/{id}', [RolesController::class, 'destroy']);
Route::get('roles/{id}', [RolesController::class, 'show']);

Route::get('docentes', [DocenteController::class, 'index']);
Route::post('docentes', [DocenteController::class, 'store']);
Route::put('docentes/{id}', [DocenteController::class, 'update']);
Route::delete('docentes/{id}', [DocenteController::class, 'destroy']);
Route::get('docentes/{id}', [DocenteController::class, 'show']);

Route::get('companias', [CompaniaController::class, 'index']);
Route::post('companias', [CompaniaController::class, 'store']);
Route::put('companias/{id}', [CompaniaController::class, 'update']);
Route::delete('companias/{id}', [CompaniaController::class, 'destroy']);
Route::get('companias/{id}', [CompaniaController::class, 'show']);

Route::get('secciones', [SeccionController::class, 'index']);
Route::post('secciones', [SeccionController::class, 'store']);
Route::put('secciones/{id}', [SeccionController::class, 'update']);
Route::delete('secciones/{id}', [SeccionController::class, 'destroy']);
Route::get('secciones/{id}', [SeccionController::class, 'show']);

Route::get('anio', [AnioController::class, 'index']);
Route::post('anio', [AnioController::class, 'store']);
Route::put('anio/{id}', [AnioController::class, 'update']);
Route::delete('anio/{id}', [AnioController::class, 'destroy']);
Route::get('anio/{id}', [AnioController::class, 'show']);

Route::get('destrezas', [DestrezasController::class, 'index']);
Route::post('destrezas', [DestrezasController::class, 'store']);
Route::put('destrezas/{id}', [DestrezasController::class, 'update']);
Route::delete('destrezas/{id}', [DestrezasController::class, 'destroy']);
Route::get('destrezas/{id}', [DestrezasController::class, 'show']);

Route::get('peloton', [PelotonController::class, 'index']);
Route::post('peloton', [PelotonController::class, 'store']);
Route::put('peloton/{id}', [PelotonController::class, 'update']);
Route::delete('peloton/{id}', [PelotonController::class, 'destroy']);
Route::get('peloton/{id}', [PelotonController::class, 'show']);

Route::get('cadetes', [CadeteController::class, 'index']);
Route::post('cadetes', [CadeteController::class, 'store']);
Route::put('cadetes/{id}', [CadeteController::class, 'update']);
Route::delete('cadetes/{id}', [CadeteController::class, 'destroy']);
Route::get('cadetes/{cedula}', [CadeteController::class, 'show']);
Route::get('cadetes_edad/{anio}', [CadeteController::class, 'find']);
Route::get('cadetes/calificaciones/{idpeloton}/{idparametros}/{bimestre}', [CadeteController::class, 'getByPeloton']);

Route::get('calificaciones', [CalificacionesController::class, 'index']);
Route::post('calificaciones', [CalificacionesController::class, 'store']);
Route::put('calificaciones/{id}', [CalificacionesController::class, 'update']);
Route::delete('calificaciones/{id}', [CalificacionesController::class, 'destroy']);
Route::get('calificaciones/{id}', [CalificacionesController::class, 'show']);

Route::get('asistencias', [AsistenciasController::class, 'index']);
Route::post('asistencias', [AsistenciasController::class, 'store']);
Route::put('asistencias/{id}', [AsistenciasController::class, 'update']);
Route::delete('asistencias/{id}', [AsistenciasController::class, 'destroy']);
Route::get('asistencias/{id}', [AsistenciasController::class, 'show']);

Route::get('parametros', [ParametrosController::class, 'index']);
Route::post('parametros', [ParametrosController::class, 'store']);
Route::put('parametros/{id}', [ParametrosController::class, 'update']);
Route::delete('parametros/{id}', [ParametrosController::class, 'destroy']);
Route::get('parametros/{id}', [ParametrosController::class, 'show']);

Route::get('pruebas', [PruebasController::class, 'index']);
Route::post('pruebas', [PruebasController::class, 'store']);
Route::put('pruebas/{id}', [PruebasController::class, 'update']);
Route::delete('pruebas/{id}', [PruebasController::class, 'destroy']);
Route::get('pruebas/{id}', [PruebasController::class, 'show']);

Route::get('registros', [RegistrosController::class, 'index']);
Route::post('registros', [RegistrosController::class, 'store']);
Route::put('registros/{id}', [RegistrosController::class, 'update']);
Route::delete('registros/{id}', [RegistrosController::class, 'destroy']);
Route::get('registros/{id}', [RegistrosController::class, 'show']);
