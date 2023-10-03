<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voltas;

class VoltasController extends Controller
{
    public function index()
    {
        $voltas = Voltas::selectRaw('nomePiloto, MIN(melhorVolta) as melhorVolta, numKart')
        ->groupBy('nomePiloto', 'numKart')
        ->get();

        return view("Pilotos.index", ['voltas' => $voltas]);
    }
}
