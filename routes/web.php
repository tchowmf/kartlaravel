<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\KartsController;
use App\Http\Controllers\VoltasController;

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
    Route::get('/', [KartsController::class, 'showKarts']);
    Route::get('/{numKart}', [KartsController::class, 'showVoltas']);
    Route::get('/{numKart}/excluir/{id}', [KartsController::class, 'excluir']);

});


Route::group(['prefix' => 'pilotos'], function() {
    Route::get('/', [VoltasController::class, 'showDrivers']);
    Route::get('/inserir-nota/{id}', [VoltasController::class, 'inserirNota']);
    Route::post('/salvar-nota/{id}', [VoltasController::class, 'salvarNota']);
    Route::get('/excluir-nota/{id}', [VoltasController::class, 'excluirNota'])->name('excluir.nota');
});

Route::group(['prefix' => 'tables'], function() {
    Route::get('/', [TablesController::class, 'index']);
    Route::get('/kgv', [TablesController::class, 'showTables']);
});
