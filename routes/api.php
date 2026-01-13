<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\RutinaController;
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
            $server->resource('rutinas', RutinaController::class);
        });
});
