<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karts;
use App\Models\Voltas;

class KartsController extends Controller
{
    public function index()
    {
        return view("Karts.index");
    }

    public function showKarts(Request $request)
    {
        $orderBy = $request->input('orderby', 'id');
        $direction = 'asc';

        if ($orderBy === 'mediaTempo-desc') {
            $direction = 'desc';
            $orderBy = 'mediaTempo'; // Altere o valor de orderBy para a coluna real
        }

        if ($orderBy === 'notaKart-desc') {
            $direction = 'desc';
            $orderBy = 'notaKart';
        }

        $karts = Karts::orderBy($orderBy, $direction)->get();

        return view("Karts.show", ['karts' => $karts]);
    }


    public function showVoltas($numKart)
    {
        $voltas = Voltas::where('numKart', $numKart)->get();
        return view("Karts.inspect", ['numKart' => $numKart, 'voltas' => $voltas]);
    }

    public function excluir($numKart, $id)
    {
        $voltas = Voltas::find($id);
        $voltas->delete();

        return redirect("/karts/{$numKart}");
    }


    public function calcularNotas()
{
    $voltas = Voltas::all();

    foreach ($voltas as $volta) {
        $tempoVolta = floatval($volta->melhorVolta);

        $mediaTempo = Voltas::avg('melhorVolta');

        $diferenca = $tempoVolta - $mediaTempo;

        if ($diferenca <= -5) {
            $nota = 'S';
        } elseif ($diferenca >= -5 && $diferenca <= -1.4) {
            $nota = 'A';
        } elseif ($diferenca > -1.5 && $diferenca <= 1) {
            $nota = 'B';
        } elseif ($diferenca > 1 && $diferenca <= 2) {
            $nota = 'C';
        } elseif ($diferenca > 2) {
            $nota = 'D';
        }

        Voltas::where('id', $volta->id)->update(['notaKart' => $nota]);
    }

    return redirect()->route('pagina_de_notas');
}

}
