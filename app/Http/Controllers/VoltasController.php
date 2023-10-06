<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voltas;

class VoltasController extends Controller
{

    public function index()
    {
        $votla = Votlas::all();

        return view("Pilotos.index", ['voltas' => $volta]);
    }

    public function showDrivers()
    {
        $voltas = Voltas::selectRaw('nomePiloto, MIN(melhorVolta) as melhorVolta, numKart')
        ->groupBy('nomePiloto', 'numKart')
        ->get();

        return view("Pilotos.index", ['voltas' => $voltas]);
    }
}
