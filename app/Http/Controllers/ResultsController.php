<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kart;
use App\Models\Pilot;
use App\Models\Result;
use App\Models\RaceTrack;
use App\Controllers\KartsController;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ResultsController extends Controller
{
    public function index(): View
    {
        return view("Results.index");
    }

    public function getEvents(): View
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

    public function getEpg($racetrack, $ID_EVENTO): View
    {

        $url = "https://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/results/{$ID_EVENTO}/epg.xml";

        $xml = simplexml_load_file($url) or die("Can't load xml");

        $attributesArray = [];

        foreach($xml as $item) {
            $attributesArray[] = $item->attributes();
        }

        return view("Results.epg", ['attributesArray' => $attributesArray, 'ID_EVENTO' => $ID_EVENTO,]);
    }

    public function getProvas($racetrack, $ID_EVENTO, $ID_EVENTO_PISTA_GRUPO): View
    {
        $url = "https://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/results/{$ID_EVENTO}/{$ID_EVENTO_PISTA_GRUPO}/provas.xml";

        $xml = simplexml_load_file($url) or die ("Can't load xml");

        $attributesArray = [];

        foreach($xml as $item) {
            $attributesArray[] = $item->attributes();
        }

        return view("Results.prova", ['attributesArray' => $attributesArray, 'ID_EVENTO' => $ID_EVENTO, 'ID_EVENTO_PISTA_GRUPO' => $ID_EVENTO_PISTA_GRUPO]);
    }

    public function getResults($racetrack, $ID_EVENTO, $ID_EVENTO_PISTA_GRUPO, $ID_CORRIDA): View
    {
        $url = "https://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/results/{$ID_EVENTO}/{$ID_EVENTO_PISTA_GRUPO}/{$ID_CORRIDA}.xml";

        $xml = simplexml_load_file($url) or die ("Can't load xml");

        $attributesArray = [];

        foreach($xml->CORRIDAS->COMPETIDOR as $item) {
            $attributesArray[] = $item;
        }

        return view("Results.result", ['attributesArray' => $attributesArray, 'ID_EVENTO' => $ID_EVENTO, 'ID_EVENTO_PISTA_GRUPO' => $ID_EVENTO_PISTA_GRUPO, 'ID_CORRIDA' => $ID_CORRIDA]);
    }

    public function postResults(Request $request, $racetrack, $ID_EVENTO, $ID_EVENTO_PISTA_GRUPO, $ID_CORRIDA)
    {
        $nome = $request->input("nome");
        $nKart = $request->input("nKart");
        $tempo = $request->input("tempo");

        $racetrackId = RaceTrack::where('name', $racetrack)->value('id');

        $count = count($nKart);

        for ($i = 0; $i < $count; $i++) {
            $time = $tempo[$i];
            list($minutes, $seconds) = explode(':', $time);
            $totalSeconds = (floatval($minutes) * 60) + floatval($seconds);

            // cadastro de novo kart
            $kart = new Kart();
            $kart->racetrack_id = $racetrackId;
            $kart->identifier = $nKart[$i];
            $kart->save();
            
            // cadastro de novo piloto
            $driver = new Pilot();
            $driver->racetrack_id = $racetrackId;
            $driver->name = $nome[$i];
            $driver->save();

            // cadastro de novo tempo relacionando as tabelas
            $volta = new Result();
            $volta->kart_id = $kart->id;
            $volta->pilot_id = $driver->id;
            $volta->racetrack_id = $racetrackId;
            $volta->best_lap = $totalSeconds;
            $volta->save();
        }

        if (0 == 0) {
            $this->grades();
            return back()->with('success', 'TEMPOS INSERIDOS COM SUCESSO!!');
        } else {
            return back()->with('danger', 'TEMPOS DUPLICADOS OU ERRO NA INSERÇÃO!!');
        }
    }

    private function grades()
    {
        $karts = Result::select('kart_id', DB::raw('AVG(best_lap) AS media'))->groupBy('kart_id')->get();
        
        foreach ($karts as $kart) {
            $voltas = Kart::where('id', $kart->kart_id)->get();
            $mediaKart = $kart->media;
            
            foreach ($voltas as $volta) {
                $mediaTempo = Result::avg('best_lap');

                $diferenca = $mediaKart - $mediaTempo;
                
                if ($diferenca <= -3) {
                    $nota = 'S';
                } elseif ($diferenca >= -5 && $diferenca <= -1.4) {
                    $nota = 'A';
                } elseif ($diferenca > -1.5 && $diferenca <= 1) {
                    $nota = 'B';
                } elseif ($diferenca > 1 && $diferenca <= 2) {
                    $nota = 'C';
                } elseif ($diferenca > 2) {
                    $nota = 'D';
                }

                Kart::where('id', $kart->kart_id)->update(['grade' => $nota]);

                //Quando a tabela estiver sem registros, usar:
                //Kart::updateOrInsert(['id' => $kart->kart_id], ['grade' => $nota]);

            }
        }
    }

}
