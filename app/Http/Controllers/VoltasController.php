<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kart;
use App\Models\Pilot;
use App\Models\Result;
use Illuminate\View\View;

class VoltasController extends Controller
{

    public function index(): View
    {
        return view("Pilotos.index");
    }

    public function getDriverSpeedPark(): View
    {
        $drivers = Pilot::where('name', 'Terrill Leuschke')->get();

        $driverInfo = [];

        foreach($drivers as $driver) {
            $fastestLap = Result::where('pilot_id', $driver->id)->min('best_lap');

            $kartFastestLapId = Result::where('pilot_id', $driver->id)
                                ->orderBy('best_lap')
                                ->pluck('kart_id')
                                ->first();

            $kartFastestLapNumber = Kart::where('id', $kartFastestLapId)->value('identifier');

            $driverInfo[] = [
            'driverName' => $driver->name,
            'fastestLap' => $fastestLap,
            'kartFastestLap' => $kartFastestLapNumber
            ];
        }

        return view("Pilotos.show", compact(['driverInfo']));
    }

    public function inserirNota($id): View
    {
        $volta = Voltas::find($id);

        return view("Pilotos.formulario", ['volta' => $volta]);
    }

    public function salvarNota(Request $request, $id): RedirectResponse
    {
        $volta = Voltas::find($id);
        $volta->notaPiloto = $request->input("notaPiloto");
        $volta->save();

        return redirect("/pilotos/kgv");
    }

    public function excluirNota($id): RedirectResponse
    {
        $volta = Voltas::find($id);

        if ($volta) {
            $volta->notaPiloto = null; // Ou qualquer outro valor que represente uma nota ausente
            $volta->save();
        }

        return redirect("/pilotos");
    }


}
