<?php

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
    return view('pages.index');
});

Route::get('/servicos', function () {
    return view('pages.servicos');
});

Route::get('/quemsomos', function () {
    return view('pages.quemsomos');
});

Route::get('/galeria', function () {
    return view('pages.galeria');
});