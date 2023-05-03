<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VagaController;
use App\Http\Controllers\Api\CandidatoController;
use App\Http\Controllers\Api\InscricaoController;



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

Route::middleware('auth')->group(function () {
    Route::apiResource('vagas', VagaController::class);
    Route::apiResource('candidatos', CandidatoController::class);
    Route::apiResource('candidatura', InscricaoController::class);
});