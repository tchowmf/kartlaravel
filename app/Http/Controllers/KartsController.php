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
                'currentRaceTrack' => $racetrack
            ];
        }

        return view("Karts.getKarts", compact(['kartInfo']));
    }

    public function getKart($racetrack, $nKart): View
    {
        $racetrackId = RaceTrack::where('name', $racetrack)->value('id');

        $laps = Result::where('racetrack_id', $racetrackId)
                        ->where('kart_id', $nKart)
                        ->get();

        foreach($laps as $lap) {
            $driver = Driver::find($lap->driver_id);
            $driverName = $driver->name;
            $driverGrade = $driver->grade;
        }
        
        return view("Karts.inspect", compact(['nKart', 'laps', 'driverName', 'driverGrade']));
    }

    public function excluir($numKart, $id)
    {
        $voltas = Driver::find($id);
        $voltas->delete();

        return redirect("/karts/{$numKart}");
    }
}
