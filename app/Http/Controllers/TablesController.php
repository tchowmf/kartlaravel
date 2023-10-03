<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karts;
use App\Models\Tables;
use App\Models\Voltas;

class TablesController extends Controller
{
    public function index()
    {
        $karts = Karts::all();
        $dadosCombinados = [];

        foreach ($karts as $kart) {
            $dadosVoltas = Voltas::where('numKart', $kart->numKart)->first();

            // Verifique se há dados de voltas para o kart atual
            if ($dadosVoltas) {
                $dadosCombinados[] = [
                    'numKart' => $kart->numKart,
                    'mediaTempo' => $kart->mediaTempo,
                    'numVoltas' => $kart->numVoltas,
                    'nomePiloto' => $dadosVoltas->nomePiloto,
                    'melhorVolta' => $dadosVoltas->melhorVolta,
                ];
            } else {
                // Caso não haja dados de voltas para o kart, preencha com valores vazios
                $dadosCombinados[] = [
                    'numKart' => $kart->numKart,
                    'mediaTempo' => $kart->mediaTempo,
                    'numVoltas' => $kart->numVoltas,
                    'nomePiloto' => '',
                    'melhorVolta' => '',
                ];
            }
        }

        return view("Tables.index", ['dadosCombinados' => $dadosCombinados]);
    }

}
