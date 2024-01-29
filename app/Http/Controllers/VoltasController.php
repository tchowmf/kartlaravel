<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voltas;

class VoltasController extends Controller
{

    public function index(): View
    {
        return view("Pilotos.index");
    }

    /* -- SELECT WORKING CLEAN BUT DUPLICATED INFO
    public function showDrivers(Request $request)
    {
        $orderBy = $request->input('orderby', 'id');
        $direction = 'asc';

        if ($orderBy === 'notaPiloto') {
            $direction = 'desc';
        }

        $voltas = Voltas::selectRaw('id, nomePiloto, MIN(melhorVolta) as melhorVolta, numKart, MAX(notaPiloto) as notaPiloto')
            ->groupBy('id', 'nomePiloto', 'numKart')
            ->orderBy($orderBy, $direction)
            ->get();

        return view("Pilotos.index", ['voltas' => $voltas]);
    }*/

    public function showDrivers(Request $request): View
    {
        $orderBy = $request->input('orderby', 'id');
        $direction = 'asc';

        if ($orderBy === 'notaPiloto') {
            $direction = 'desc';
        }

        $voltas = Voltas::select('voltas.id', 'voltas.nomePiloto', 'voltas.melhorVolta', 'voltas.numKart', 'voltas.notaPiloto')
            ->join(Voltas::raw("(SELECT nomePiloto, MIN(melhorVolta) AS minMelhorVolta FROM voltas GROUP BY nomePiloto) as sub"), function($join) {
                $join->on('voltas.nomePiloto', '=', 'sub.nomePiloto');
                $join->on('voltas.melhorVolta', '=', 'sub.minMelhorVolta');
            })
            ->orderBy($orderBy, $direction)
            ->get();

        return view("Pilotos.show", ['voltas' => $voltas]);
    }

    public function inserirNota($id): View
    {
        $volta = Voltas::find($id);

        return view("Pilotos.formulario", ['volta' => $volta]);
    }

    public function salvarNota(Request $request, $id): RedirectResponse
    {
        $volta = Voltas::find($id);
        $volta->notaPiloto = $request->input("notaPiloto");
        $volta->save();

        return redirect("/pilotos/kgv");
    }

    public function excluirNota($id): RedirectResponse
    {
        $volta = Voltas::find($id);

        if ($volta) {
            $volta->notaPiloto = null; // Ou qualquer outro valor que represente uma nota ausente
            $volta->save();
        }

        return redirect("/pilotos");
    }


}
