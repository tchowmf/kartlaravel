<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kart;
use App\Models\Pilot;
use App\Models\Result;
use App\Models\RaceTrack;
use App\Controllers\KartsController;
use App\Traits\CalculosTrait;
use Illuminate\View\View;

class ResultsController extends Controller
{
    use CalculosTrait;

    public function index(): View
    {
        return view("Results.index");
    }

    public function showEvents(): View
    {

        $url = "https://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/results/eventos.xml";

        $xml = simplexml_load_file($url) or die("Can't load xml");

        $attributesArray = [];

        foreach($xml as $item) {
            $attributesArray[] = $item->attributes();

        }
        usort($attributesArray, function ($a, $b) {return $b['ID_EVENTO'] - $a['ID_EVENTO'];});
        return view("Results.show", ['attributesArray' => $attributesArray]);
    }

    public function showEpg($ID_EVENTO): View
    {

        $url = "https://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/results/{$ID_EVENTO}/epg.xml";

        $xml = simplexml_load_file($url) or die("Can't load xml");

        $attributesArray = [];

        foreach($xml as $item) {
            $attributesArray[] = $item->attributes();
        }

        return view("Results.epg", ['attributesArray' => $attributesArray, 'ID_EVENTO' => $ID_EVENTO,]);
    }

    public function showProvas($ID_EVENTO, $ID_EVENTO_PISTA_GRUPO): View
    {
        $url = "https://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/results/{$ID_EVENTO}/{$ID_EVENTO_PISTA_GRUPO}/provas.xml";

        $xml = simplexml_load_file($url) or die ("Can't load xml");

        $attributesArray = [];

        foreach($xml as $item) {
            $attributesArray[] = $item->attributes();
        }

        return view("Results.prova", ['attributesArray' => $attributesArray, 'ID_EVENTO' => $ID_EVENTO, 'ID_EVENTO_PISTA_GRUPO' => $ID_EVENTO_PISTA_GRUPO]);
    }

    public function showResults($ID_EVENTO, $ID_EVENTO_PISTA_GRUPO, $ID_CORRIDA): View
    {
        $url = "https://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/results/{$ID_EVENTO}/{$ID_EVENTO_PISTA_GRUPO}/{$ID_CORRIDA}.xml";

        $xml = simplexml_load_file($url) or die ("Can't load xml");

        $attributesArray = [];

        foreach($xml->CORRIDAS->COMPETIDOR as $item) {
            $attributesArray[] = $item;
        }

        return view("Results.result", ['attributesArray' => $attributesArray, 'ID_EVENTO' => $ID_EVENTO, 'ID_EVENTO_PISTA_GRUPO' => $ID_EVENTO_PISTA_GRUPO, 'ID_CORRIDA' => $ID_CORRIDA]);
    }

    public function insertData(Request $request, $ID_EVENTO, $ID_EVENTO_PISTA_GRUPO, $ID_CORRIDA): RedirectResponse
    {
        $nKart = $request->input("nKart");
        $nome = $request->input("nome");
        $tempo = $request->input("tempo");

        $count = count($nKart);
        $insertionSuccessful = true;

        $existingTempo = Results::whereRaw('CAST(best_lap AS DECIMAL(10, 3)) = ?', [$totalSeconds])->first();

        if ($existingTempo) {
            $insertionSuccessful = false;
        }

        for ($i = 0; $i < $count; $i++) {
            $time = $tempo[$i];
            list($minutes, $seconds) = explode(':', $time);
            $totalSeconds = (floatval($minutes) * 60) + floatval($seconds);

            // If not a duplicate, proceed with insertion
            $volta = new Result();
            $volta->best_lap = $totalSeconds;
            $volta->save();

            $kart = new Kart();
            $kart->kart_id = $nKart[$i];
            $kart->save();

            $driver = new Pilot();
            $driver->pilot_id = $nome[$i];
            $driver->save();

            $racetrack = new RaceTrack();
            $racetrack->racetrack_id = 2;
            $racetrack->save();
        }

        if ($insertionSuccessful) {
            $this->calcularNotas();
            $this->calcularTempo();
            return back()->with('success', 'TEMPOS INSERIDOS COM SUCESSO!!');

        } else {
            return back()->with('danger', 'TEMPOS DUPLICADOS OU ERRO NA INSERÇÃO!!');
        }
    }

}
