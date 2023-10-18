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

        return view("Karts.index", ['karts' => $karts]);
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
