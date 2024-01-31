<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kart;
use App\Models\Result;
use App\Models\RaceTrack;
use Illuminate\View\View;

class KartsController extends Controller
{
    public function index(): View
    {
        return view("Karts.index");
    }

    public function getKarts($racetrack): View
    {
        //alterar funcao para identificar kartodromo
        $racetrackId = RaceTrack::where('name', $racetrack)->value('id');

        $karts = Kart::where('racetrack_id', $racetrackId)->get();

        $kartInfo = [];

        foreach ($karts as $kart) {
            $avgBestLap = Result::where('kart_id', $kart->id)->avg('best_lap');

            $numAppearences = Result::where('kart_id', $kart->id)->count();

            $kartInfo[] = [
                'nKart' => $kart->identifier,
                'avgLap' => $avgBestLap,
                'appearences' => $numAppearences,
                'currentRaceTrack' => $racetrack
            ];
        }

        return view("Karts.show", compact(['kartInfo']));
    }

    public function getKart($nKart): View
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
