<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\KartsController;
use App\Http\Controllers\VoltasController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\LivesController;

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

Route::get('/', function () {
    return view('TemplateUser.index');
});


Route::group(['prefix' => 'karts'], function() {
    Route::get('/', [KartsController::class, 'index']);
    Route::get('/kgv', [KartsController::class, 'showKarts']);
    Route::get('/birigui', [KartsController::class, 'showKarts']);
    Route::get('/{numKart}', [KartsController::class, 'showVoltas']);
    Route::get('/{numKart}/excluir/{id}', [KartsController::class, 'excluir']);

});


Route::group(['prefix' => 'pilotos'], function() {
    Route::get('/', [VoltasController::class, 'index']);
    Route::get('/kgv', [VoltasController::class, 'showDrivers']);
    Route::get('/birigui', [VoltasController::class, 'showDrivers']);
    Route::get('/inserir-nota/{id}', [VoltasController::class, 'inserirNota']);
    Route::post('/salvar-nota/{id}', [VoltasController::class, 'salvarNota']);
    Route::get('/excluir-nota/{id}', [VoltasController::class, 'excluirNota'])->name('excluir.nota');
});

Route::group(['prefix' => 'tables'], function() {
    Route::get('/', [TablesController::class, 'index']);
    Route::get('/kgv', [TablesController::class, 'showTables']);
    Route::get('/birigui', [TablesController::class, 'showTables']);
});

Route::group(['prefix' => 'results'], function() {
    Route::get('/', [ResultsController::class, 'index']);
    Route::get('/kgv', [ResultsController::class, 'showEvents']);
    Route::get('/birigui', [ResultsController::class, 'showEvents']);
    Route::get('/kgv/{ID_EVENTO}/epg', [ResultsController::class, 'showEpg']);
    Route::get('/kgv/{ID_EVENTO}/{ID_EVENTO_PISTA_GRUPO}/provas', [ResultsController::class, 'showProvas']);
    Route::get('/kgv/{ID_EVENTO}/{ID_EVENTO_PISTA_GRUPO}/{ID_CORRIDA}', [ResultsController::class, 'showResults']);
    Route::post('/kgv/{ID_EVENTO}/{ID_EVENTO_PISTA_GRUPO}/{ID_CORRIDA}', [ResultsController::class, 'insertData']);
});

Route::group(['prefix' => 'live'], function() {
    Route::get('/', [LivesController::class, 'index']);
    Route::get('/kgv', [LivesController::class, 'showLive']);
    Route::get('/kgv/select', [LivesController::class, 'select']);
    Route::post('/kgv/select', [LivesController::class, 'saveSelect']);
    Route::get('/kgv/{numero}', [LivesController::class, 'showDetail']);
    Route::get('/birigui', [LivesController::class, 'showLive']);
});
