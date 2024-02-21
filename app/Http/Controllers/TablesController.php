<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use App\Models\Kart;
use App\Models\RaceTrack;
use App\Models\Result;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Foreach_;

class TablesController extends Controller
{
    public function index(): View
    {
        return view("Tables.index");
    }

    public function getTables($racetrack): View
    {
        // Recupera qual pista usuario esta
        $racetrackId = RaceTrack::where('name', $racetrack)->value('id');

        // Recupera todos os karts associados ao kartódromo
        $karts = Kart::where('racetrack_id', $racetrackId)->get();

        // Array para armazenar todas as informações de cada kart
        $kartInfo = [];

        // Para cada kart, obter as informações relevantes
        foreach ($karts as $kart) {
            // Recupera as estatísticas de corrida para a melhor volta do kart
            $bestLap = Result::where('kart_id', $kart->id)
                                                ->orderBy('best_lap', 'asc')
                                                ->first();

            $numAppearences = Result::where('kart_id', $kart->id)->count();

            $avgLap = Result::where('kart_id', $kart->id)->avg('best_lap');
            
            // Se encontrarmos estatísticas para a melhor volta
            if ($bestLap) {
                // Recupera o piloto associado a essas estatísticas
                $driver = Driver::findOrFail($bestLap->driver_id);
            } else {
                // Se não houver estatísticas para a melhor volta, define o piloto como null
                $driver = null;
            }

            // Armazena as informações do kart em um array
            $kartInfo[] = [
                'kart' => $kart,
                'bestLap' => $bestLap,
                'driver' => $driver,
                'appearences' => $numAppearences,
                'avgLap' => number_format($avgLap, 3),
            ];
        }

        return view('Tables.getTables', compact(['kartInfo']));
    }
}
