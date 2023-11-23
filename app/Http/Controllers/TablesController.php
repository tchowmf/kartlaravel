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
        return view("Tables.index");
    }

    public function showTables(Request $request)
    {
        // Recupere o valor selecionado no 'select' com name 'orderby'
        $orderBy = $request->input('orderby', 'id');

        // Defina um array associativo para mapear valores do select para colunas de ordenação
        $orderByMapping = [
            'id' => 'id', // Ordenação padrão
            'mediaTempo' => 'mediaTempo',
            'numKart' => 'numKart',
            'notaKart' => 'notaKart',
            'notaPiloto' => 'notaPiloto',
            'nomePiloto' => 'nomePiloto',
            'numVoltas' => 'numVoltas',
            'melhorVolta' => 'melhorVolta',
        ];

        // Verifique se a opção selecionada está no mapeamento; caso contrário, use 'id' como padrão
        $orderByColumn = $orderByMapping[$orderBy] ?? 'numKart';

        // Recupere os dados dos karts
        $karts = Karts::all();

        $dadosCombinados = [];

        foreach ($karts as $kart) {
            $dadosVoltas = Voltas::where('numKart', $kart->numKart)->orderBy('melhorVolta')->first();

            if ($dadosVoltas) {
                $dadosCombinados[] = [
                    'numKart' => $kart->numKart,
                    'notaKart' => $dadosVoltas->notaKart,
                    'mediaTempo' => $kart->mediaTempo,
                    'numVoltas' => $kart->numVoltas,
                    'numVoltas-desc' => $kart->numVoltas,
                    'nomePiloto' => $dadosVoltas->nomePiloto,
                    'notaPiloto' => $dadosVoltas->notaPiloto,
                    'melhorVolta' => $dadosVoltas->melhorVolta,
                ];
            } else {
                $dadosCombinados[] = [
                    'numKart' => $kart->numKart,
                    'notaKart' => '',
                    'mediaTempo' => $kart->mediaTempo,
                    'numVoltas' => $kart->numVoltas,
                    'nomePiloto' => '',
                    'notaPiloto' => '',
                    'melhorVolta' => '',
                ];
            }
        }

        if (in_array($orderByColumn, ['notaPiloto', 'notaKart', 'numVoltas-desc', 'numVoltas'])) {
            $dadosCombinados = collect($dadosCombinados)->sortByDesc($orderByColumn);
        } else {
            $dadosCombinados = collect($dadosCombinados)->sortBy($orderByColumn);
        }

        return view("Tables.show", ['dadosCombinados' => $dadosCombinados]);
    }
}
