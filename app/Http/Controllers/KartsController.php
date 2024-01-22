<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kart;
use App\Models\Voltas;
use Illuminate\View\View;

class KartsController extends Controller
{
    public function index(Request $request): View
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

        $karts = Kart::orderBy($orderBy, $direction)->get();

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
}
