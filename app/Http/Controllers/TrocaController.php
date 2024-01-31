<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kart;

class TrocaController extends Controller
{
    public function index()
    {
        return view("Troca.index");
    }

    public function troca(): View
    {
        $karts = Kart::all();

        $nKarts = [];

        foreach($karts as $kart){
            $nKarts[] = $kart->numKart;
        }

        return view("Troca.show", ["nKart" => $nKarts]);
    }

    public function calcularProbabilidade(Request $request): View
    {
        $kartsSelecionados = $request->input('karts_selecionados');

        // Contagem inicial de todos os karts disponíveis
        $totalKarts = Kart::count();
        $kartsDisponiveis = Kart::whereIn('numKart', $kartsSelecionados)->count();

        // Contagem de karts por nota
        $kartsPorNota = [];
        $notas = ['S', 'A', 'B', 'C', 'D'];

        foreach ($notas as $nota) {
            $kartsPorNota[$nota] = Kart::where('notaKart', $nota)
                                        ->whereIn('numKart', $kartsSelecionados)
                                        ->count();
        }

        // Cálculo da porcentagem de chance por nota
        $probabilidadePorNota = [];

        foreach ($kartsPorNota as $nota => $quantidade) {
            $probabilidadePorNota[$nota] = ($quantidade / $kartsDisponiveis) * 100;
        }

        return view('Troca.chance', [
            'probabilidadePorNota' => $probabilidadePorNota,
        ]);
    }

}
