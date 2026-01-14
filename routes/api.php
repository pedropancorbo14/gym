<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Ejercicio;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\RutinaEjercicio;
use App\Http\Controllers\RutinaEjercicioSemana;
use App\Http\Controllers\RutinaEjercicioSerie;
use App\Http\Controllers\SemanaEntrenamiento;
use Illuminate\Support\Facades\Route;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {
    JsonApiRoute::server('v1')
        ->prefix('v1')
        ->resources(function ($server) {
            $server->resource('rutinas', RutinaController::class)
                ->relationships(function ($relations) {
                    $relations->hasMany('ejercicios');
                    $relations->hasMany('plantillaEjercicios');
                    $relations->hasMany('registrosSemanales');
                });
            $server->resource('ejercicios', Ejercicio::class)
                ->relationships(function ($relations) {
                    $relations->hasMany('rutinas');
                    $relations->hasMany('plantillaRutinas');
                    $relations->hasMany('registrosSemanales');
                });
            $server->resource('rutina-ejercicios', RutinaEjercicio::class)
                ->relationships(function ($relations) {
                    $relations->hasOne('rutina');
                    $relations->hasOne('ejercicio');
                });
            $server->resource('rutina-ejercicio-semanas', RutinaEjercicioSemana::class)
                ->relationships(function ($relations) {
                    $relations->hasOne('rutina');
                    $relations->hasOne('ejercicio');
                    $relations->hasOne('semanaEntrenamiento');
                    $relations->hasMany('series');
                });
            $server->resource('rutina-ejercicio-series', RutinaEjercicioSerie::class)
                ->relationships(function ($relations) {
                    $relations->hasOne('rutinaEjercicioSemana');
                });
            $server->resource('semana-entrenamientos', SemanaEntrenamiento::class)
                ->relationships(function ($relations) {
                    $relations->hasMany('registrosEjercicios');
                });
        });
});
