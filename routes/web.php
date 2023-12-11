<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\KartsController;
use App\Http\Controllers\VoltasController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\LivesController;
use App\Http\Controllers\TrocaController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'login'], function() {
    Route::get('/', [UserController::class, 'login'])->name('login');
    Route::post('/', [UserController::class, 'doLogin']);
});

Route::group(['prefix' => 'register'], function() {
    Route::get('/', [UserController::class, 'register']);
    Route::post('/', [UserController::class, 'create']);
});

Route::group(['prefix' => 'forgot-password'], function() {
    Route::get('/', [UserController::class, 'forgot']);
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'karts', 'middleware' => 'auth'], function() {
    Route::get('/', [KartsController::class, 'index']);
    Route::get('/kgv', [KartsController::class, 'showKarts']);
    Route::get('/speedpark', [KartsController::class, 'showKarts']);
    Route::get('/speedpark/{numKart}', [KartsController::class, 'showVoltas']);
    Route::get('/speedpark/{numKart}/excluir/{id}', [KartsController::class, 'excluir']);
});


Route::group(['prefix' => 'pilotos', 'middleware' => 'auth'], function() {
    Route::get('/', [VoltasController::class, 'index']);
    Route::get('/kgv', [VoltasController::class, 'showDrivers']);
    Route::get('/speedpark', [VoltasController::class, 'showDrivers']);
    Route::get('/inserir-nota/{id}', [VoltasController::class, 'inserirNota']);
    Route::post('/salvar-nota/{id}', [VoltasController::class, 'salvarNota']);
    Route::get('/excluir-nota/{id}', [VoltasController::class, 'excluirNota'])->name('excluir.nota');
});

Route::group(['prefix' => 'tables', 'middleware' => 'auth'], function() {
    Route::get('/', [TablesController::class, 'index']);
    Route::get('/kgv', [TablesController::class, 'showTables']);
    Route::get('/speedpark', [TablesController::class, 'showTables']);
});

Route::group(['prefix' => 'results', 'middleware' => 'auth'], function() {
    Route::get('/', [ResultsController::class, 'index']);
    Route::get('/kgv', [ResultsController::class, 'showEvents']);
    Route::get('/speedpark', [ResultsController::class, 'showEvents']);
    Route::get('/speedpark/{ID_EVENTO}/epg', [ResultsController::class, 'showEpg']);
    Route::get('/speedpark/{ID_EVENTO}/{ID_EVENTO_PISTA_GRUPO}/provas', [ResultsController::class, 'showProvas']);
    Route::get('/speedpark/{ID_EVENTO}/{ID_EVENTO_PISTA_GRUPO}/{ID_CORRIDA}', [ResultsController::class, 'showResults']);
    Route::post('/speedpark/{ID_EVENTO}/{ID_EVENTO_PISTA_GRUPO}/{ID_CORRIDA}', [ResultsController::class, 'insertData']);
});

Route::group(['prefix' => 'live', 'middleware' => 'auth'], function() {
    Route::get('/', [LivesController::class, 'index']);
    Route::get('/kgv', [LivesController::class, 'showLive']);
    Route::get('/kgv/select', [LivesController::class, 'select']);
    Route::post('/kgv/select', [LivesController::class, 'saveSelect']);
    Route::get('/kgv/{numero}', [LivesController::class, 'showDetail']);
    Route::get('/liveTable', [LivesController::class, 'liveTable']);
    Route::get('/speedpark', [LivesController::class, 'live']);
    Route::get('/speedpark/select', [LivesController::class, 'select']);
    Route::post('/speedpark/select', [LivesController::class, 'saveSelect']);
    Route::get('/infoTable/{numero}', [LivesController::class, 'showDetail']);
    Route::get('/speedpark/{numero}', [LivesController::class, 'info']);
    Route::get('/speedpark/media', [LivesController::class, 'showAverage']);
    Route::get('/timer', [LivesController::class, 'timer']);
});


Route::group(['prefix' => 'troca', 'middleware' => 'auth'], function() {
    Route::get('/', [TrocaController::class, 'index']);
    Route::get('/speedpark', [TrocaController::class, 'troca']);
    Route::post('/speedpark', [TrocaController::class, 'calcularProbabilidade']);
});
