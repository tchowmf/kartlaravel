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

Route::get('/tables', [TablesController::class, 'index']);

Route::group(['prefix' => 'karts'], function() {
    Route::get('/', [KartsController::class, 'index']);
    Route::get('/{numKart}', [KartsController::class, 'showVoltas']);
    //Route::get('/excluir/{id}',[KartsController::class,'excluir']);
    Route::get('/{numKart}/excluir/{id}', [KartsController::class, 'excluir']);

});

Route::get('/pilotos', [VoltasController::class, 'showDrivers']);

//Route::group(['prefix' => 'karts'])
