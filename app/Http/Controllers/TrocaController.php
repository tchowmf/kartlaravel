<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karts;

class TrocaController extends Controller
{
    public function index()
    {
        return view("Troca.index");
    }

    public function troca()
    {
        $karts = Karts::all();

        $nKarts = [];

        foreach($karts as $kart){
            $nKarts[] = $kart->numKart;
        }

        return view("Troca.show", ["nKart" => $nKarts]);
    }

    public function calcularProbabilidade(Request $request) {
        $kartsSelecionados = $request->input('karts_selecionados');

        // Contagem inicial de todos os karts disponíveis
        $totalKarts = Karts::count();
        $kartsDisponiveis = Karts::whereIn('numKart', $kartsSelecionados)->count();

        // Contagem de karts por nota
        $kartsPorNota = [];
        $notas = ['S', 'A', 'B', 'C', 'D'];

        foreach ($notas as $nota) {
            $kartsPorNota[$nota] = Karts::where('notaKart', $nota)
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
            // Você pode enviar outras informações necessárias para a view aqui
        ]);
    }

}
