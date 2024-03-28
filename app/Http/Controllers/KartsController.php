<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kart;
use App\Models\Driver;
use App\Models\Result;
use App\Models\RaceTrack;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
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
                'kart' => $kart,
                'nKart' => $kart->identifier,
                'grade' => $kart->grade,
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
                        ->select('race_statistics.*', 'drivers.id as driver_id', 'drivers.name as driver_name', 'drivers.grade as driver_grade')
                        ->get();
        
        return view("Karts.inspectKart", compact(['nKart', 'laps', 'racetrack']));
    }

    public function deleteLap($racetrack, $nKart, $id)
    {
        $lap = Result::find($id);
        if (!$lap) {
            return redirect()->back()->with('error', 'Tempo de volta não encontrado.');
        }
        
        $lap->delete();
    
        return redirect()->route('get.kart', ['racetrack' => $racetrack, 'nKart' => $nKart])->with('success', 'Tempo de volta excluído com sucesso.');
    }

    public function getKartGrade($racetrack, $nKart): View
    {
        $racetrackId = RaceTrack::where('name', $racetrack)->value('id');

        $kart = Kart::where('identifier', $nKart)->first();

        return view("Karts.formulario", compact('racetrack', 'kart'));
    }

    public function postKartGrade(Request $request, $racetrack, $nKart): RedirectResponse
    {
        $validatedData = $request->validate([
            'kartGrade' => 'required|string|size:1|in:S,A,B,C,D',
        ]);
        
        $kart = Kart::where('identifier', $nKart)->first();
        $kart->grade = $validatedData['kartGrade'];
        $kart->save();

        return redirect(route('get.karts', $racetrack));
    }

    public function deleteKartGrade($racetrack, $nKart): RedirectResponse
    {
        $kart = Kart::where('identifier', $nKart)->first();

        if ($kart) {
            $kart->grade = null; // Ou qualquer outro valor que represente uma nota ausente
            $kart->save();
        }

        return redirect(route('get.karts', $racetrack));
    }
}
