<?php

use App\Http\Controllers\DriversController;
use App\Http\Controllers\KartsController;
use App\Http\Controllers\LivesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\TradeController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'karts'], function() {
    Route::get('/', [KartsController::class, 'index']);
    Route::get('/{racetrack}', [KartsController::class, 'getKarts'])->name('get.karts');
    Route::get('/{racetrack}/{nKart}', [KartsController::class, 'getKart'])->name('get.kart');
    Route::delete('/{racetrack}/{nKart}/delete/{id}', [KartsController::class, 'deleteLap'])->name('delete.lap');
});


Route::group(['prefix' => 'pilotos'], function() {
    Route::get('/', [DriversController::class, 'index']);
    Route::get('/kgv', [DriversController::class, 'getDriverKgv']);
    Route::get('/{racetrack}', [DriversController::class, 'getDriverSpeedPark'])->name('get.drivers');
    Route::get('/{racetrack}/{id}', [DriversController::class, 'getDriver'])->name('get.driver');
    Route::get('/{racetrack}/inserir-nota/{id}', [DriversController::class, 'getGrade'])->name('get.grade');
    Route::post('/{racetrack}/salvar-nota/{id}', [DriversController::class, 'postGrade'])->name('post.grade');
    Route::get('/{racetrack}/excluir-nota/{id}', [DriversController::class, 'deleteGrade'])->name('delete.grade');
});

Route::group(['prefix' => 'tables'], function() {
    Route::get('/', [TablesController::class, 'index']);
    Route::get('/{racetrack}', [TablesController::class, 'getTables'])->name('get.tables');
});

Route::group(['prefix' => 'results'], function() {
    Route::get('/', [ResultsController::class, 'index']);
    Route::get('/kgv', [ResultsController::class, 'showEvents']);
    Route::get('/speedpark', [ResultsController::class, 'getEvents'])->name('results.speedpark');
    Route::get('/{racetrack}/{ID_EVENTO}/epg', [ResultsController::class, 'getEpg'])->name('get.epg');
    Route::get('/{racetrack}/{ID_EVENTO}/{ID_EVENTO_PISTA_GRUPO}/provas', [ResultsController::class, 'getProvas'])->name('get.provas');
    Route::get('/{racetrack}/{ID_EVENTO}/{ID_EVENTO_PISTA_GRUPO}/{ID_CORRIDA}', [ResultsController::class, 'getResults'])->name('get.results');
    Route::post('/{racetrack}/{ID_EVENTO}/{ID_EVENTO_PISTA_GRUPO}/{ID_CORRIDA}', [ResultsController::class, 'postResults'])->name('post.results');
});

Route::group(['prefix' => 'live'], function() {
    Route::get('/', [LivesController::class, 'index']);
    Route::get('/liveTable', [LivesController::class, 'liveTable']);
    Route::get('/speedpark', [LivesController::class, 'live']);
    Route::get('/speedpark/select', [LivesController::class, 'select']);
    Route::post('/speedpark/select', [LivesController::class, 'saveSelect']);
    Route::get('/infoTable/{numero}', [LivesController::class, 'showDetail']);
    Route::get('/speedpark/{numero}', [LivesController::class, 'info']);
    Route::get('/speedpark/media', [LivesController::class, 'showAverage']);
    Route::get('/timer', [LivesController::class, 'timer']);
});


Route::group(['prefix' => 'troca'], function() {
    Route::get('/', [TradeController::class, 'index']);
    Route::get('/speedpark', [TradeController::class, 'troca']);
    Route::post('/speedpark', [TradeController::class, 'calcularProbabilidade']);
});
require __DIR__.'/auth.php';
