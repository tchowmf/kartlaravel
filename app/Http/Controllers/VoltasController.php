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
        $voltas = Voltas::selectRaw('id, nomePiloto, MIN(melhorVolta) as melhorVolta, numKart, MAX(notaPiloto) as notaPiloto')
            ->groupBy('id', 'nomePiloto', 'numKart')
            ->get();

        return view("Pilotos.index", ['voltas' => $voltas]);
    }


    public function inserirNota($id)
    {
        $volta = Voltas::find($id);

        return view("Pilotos.formulario", ['volta' => $volta]);
    }

    public function salvarNota(Request $request, $id)
    {
        $volta = Voltas::find($id);
        $volta->notaPiloto = $request->input("notaPiloto");
        $volta->save();

        return redirect("/pilotos");
    }

    public function excluirNota($id)
    {
        $volta = Volta::find($id);

        if ($volta) {
            $volta->notaPiloto = null; // Ou qualquer outro valor que represente uma nota ausente
            $volta->save();
        }

        return redirect("/pilotos");
    }


}
