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
            'driver' => $driver,
            'driverName' => $driver->name,
            'grade' => $driver->grade,
            'kartFastestLap' => $kartFastestLapNumber
            ];
        }

        return view("Pilotos.getDrivers", compact(['driverInfo', 'racetrack']));
    }

    public function getDriver($racetrack, $id)
    {
        $racetrackId = RaceTrack::where('name', $racetrack)->value('id');

        $driver = Driver::find($id);

        $laps = Result::with('kart')
              ->where('driver_id', $id)
              ->where('racetrack_id', $racetrackId)
              ->get(['id', 'kart_id', 'best_lap']);

        
        return view("Pilotos.inspectDriver", compact(['racetrack', 'laps', 'driver']));
    }

    public function getDriverGrade($racetrack, $id): View
    {
        $racetrackId = RaceTrack::where('name', $racetrack)->value('id');

        $driver = Driver::find($id);

        return view("Pilotos.formulario", compact('racetrack', 'driver'));
    }

    public function postDriverGrade(Request $request, $racetrack, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'driverGrade' => 'required|string|size:1|in:S,A,B,C,D',
        ]);

        $driver = Driver::find($id);
        $driver->grade = $validatedData['driverGrade'];
        $driver->save();

        return redirect(route('get.drivers', $racetrack));
    }

    public function deleteDriverGrade($racetrack, $id): RedirectResponse
    {
        $driver = Driver::find($id);

        if ($driver) {
            $driver->grade = null; // Ou qualquer outro valor que represente uma nota ausente
            $driver->save();
        }

        return redirect(route('get.drivers', $racetrack));
    }


}
