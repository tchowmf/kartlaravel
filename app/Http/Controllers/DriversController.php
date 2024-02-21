<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kart;
use App\Models\Driver;
use App\Models\Result;
use App\Models\RaceTrack;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DriversController extends Controller
{

    public function index(): View
    {
        return view("Pilotos.index");
    }

    public function getDriverSpeedPark($racetrack): View
    {
        $racetrackId = RaceTrack::where('name', $racetrack)->value('id');

        $drivers = Driver::where('racetrack_id', $racetrackId)->get();

        $driverInfo = [];

        foreach($drivers as $driver) {
            $fastestLap = Result::where('driver_id', $driver->id)->min('best_lap');

            $kartFastestLapId = Result::where('driver_id', $driver->id)
                                ->orderBy('best_lap')
                                ->pluck('kart_id')
                                ->first();

            $kartFastestLapNumber = Kart::where('id', $kartFastestLapId)->value('identifier');

            $driverInfo[] = [
            'id' => $driver->id,
            'driverName' => $driver->name,
            'grade' => $driver->grade,
            'fastestLap' => number_format($fastestLap, 3),
            'kartFastestLap' => $kartFastestLapNumber
            ];
        }

        return view("Pilotos.getDrivers", compact(['driverInfo', 'racetrack']));
    }

    public function getGrade($racetrack, $id): View
    {
        $racetrackId = RaceTrack::where('name', $racetrack)->value('id');
    
        $driver = Driver::find($id);
    
        return view("Pilotos.formulario", compact('racetrack', 'driver'));
    }

    public function postGrade(Request $request, $racetrack, $id)
    {
        $driver = Driver::find($id);
        if (!$driver) {
            return response()->json(['error' => 'Driver not found', $id], 404);
        }
        $driver->grade = $request->input("driverGrade");
        $driver->save();

        return redirect(route('get.drivers', $racetrack));
    }

    public function excluirNota($id): RedirectResponse
    {
        $volta = Kart::find($id);

        if ($volta) {
            $volta->notaPiloto = null; // Ou qualquer outro valor que represente uma nota ausente
            $volta->save();
        }

        return redirect("/pilotos");
    }


}
