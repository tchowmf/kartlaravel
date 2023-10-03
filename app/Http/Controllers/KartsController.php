<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karts;
use App\Models\Voltas;

class KartsController extends Controller
{
    public function index()
    {
        $kart = Karts::all();

        return view("Karts.index", ['karts' => $kart]);
    }

    public function showVoltas($numKart)
    {
        $voltas = Voltas::where('numKart', $numKart)->get();
        return view("Karts/inspect", ['numKart' => $numKart, 'voltas' => $voltas]);
    }

}
