<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kart;
use App\Models\Driver;
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
        $racetrackId = RaceTrack::where('name', $racetrack)
                                ->value('id');

        $karts = Kart::where('racetrack_id', $racetrackId)->get();

        $kartInfo = [];

        foreach ($karts as $kart) {
            $avgBestLap = Result::where('kart_id', $kart->id)
                                ->avg('best_lap');

            $numAppearences = Result::where('kart_id', $kart->id)
                                    ->count();

            $kartInfo[] = [
                'nKart' => $kart->identifier,
                'grade' => $kart->grade,
                'avgLap' => number_format($avgBestLap, 3),
                'appearences' => $numAppearences,
            ];
        }

        return view("Karts.getKarts", compact(['kartInfo', 'racetrack']));
    }

    public function getKart($racetrack, $nKart): View
    {
        $racetrackId = RaceTrack::where('name', $racetrack)->value('id');

        $laps = Result::join('karts', 'race_statistics.kart_id', '=', 'karts.id')
              ->join('drivers', 'race_statistics.driver_id', '=', 'drivers.id')
              ->where('race_statistics.racetrack_id', $racetrackId)
              ->where('karts.identifier', $nKart)
              ->select('race_statistics.*', 'drivers.name as driver_name', 'drivers.grade as driver_grade')
              ->get();

        
        return view("Karts.inspect", compact(['nKart', 'laps', 'racetrack']));
    }

    public function deleteLap($racetrack, $nKart, $id)
    {
        $lap = Result::find($id);
        if (!$lap) {
            return redirect()->back()->with('error', 'Tempo de volta não encontrado.');
        }
        
        $lap->delete();
    
        return redirect()->route('getKart', ['racetrack' => $racetrack, 'nKart' => $nKart])->with('success', 'Tempo de volta excluído com sucesso.');
    }
}
