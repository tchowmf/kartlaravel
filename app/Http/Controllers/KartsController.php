<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Karts;
use App\Models\Voltas;

class KartsController extends Controller
{
    public function index(): View
    {
        return view("Karts.index");
    }

    public function showKarts(Request $request): View
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

        return view("Karts.show", compact(['karts']));
    }

    public function showVoltas($numKart): View
    {
        $voltas = Voltas::where('numKart', $numKart)->get();
        return view("Karts.inspect", compact(['numKart', 'voltas']));
    }

    public function excluir($numKart, $id): RedirectResponse
    {
        $voltas = Voltas::find($id);
        $voltas->delete();

        return redirect("/karts/{$numKart}");
    }
}
