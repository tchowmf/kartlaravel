<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voltas;
use App\Controllers\KartsController;
use App\Traits\CalculosTrait;

class ResultsController extends Controller
{
    use CalculosTrait;

    public function index()
    {
        return view("Results.index");
    }

    public function showEvents()
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

    public function showEpg($ID_EVENTO)
    {

        $url = "https://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/results/{$ID_EVENTO}/epg.xml";

        $xml = simplexml_load_file($url) or die("Can't load xml");

        $attributesArray = [];

        foreach($xml as $item) {
            $attributesArray[] = $item->attributes();
        }

        return view("Results.epg", ['attributesArray' => $attributesArray, 'ID_EVENTO' => $ID_EVENTO,]);
    }

    public function showProvas($ID_EVENTO, $ID_EVENTO_PISTA_GRUPO)
    {
        $url = "https://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/results/{$ID_EVENTO}/{$ID_EVENTO_PISTA_GRUPO}/provas.xml";

        $xml = simplexml_load_file($url) or die ("Can't load xml");

        $attributesArray = [];

        foreach($xml as $item) {
            $attributesArray[] = $item->attributes();
        }

        return view("Results.prova", ['attributesArray' => $attributesArray, 'ID_EVENTO' => $ID_EVENTO, 'ID_EVENTO_PISTA_GRUPO' => $ID_EVENTO_PISTA_GRUPO]);
    }

    public function showResults($ID_EVENTO, $ID_EVENTO_PISTA_GRUPO, $ID_CORRIDA)
    {
        $url = "https://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/results/{$ID_EVENTO}/{$ID_EVENTO_PISTA_GRUPO}/{$ID_CORRIDA}.xml";

        $xml = simplexml_load_file($url) or die ("Can't load xml");

        $attributesArray = [];

        foreach($xml->CORRIDAS->COMPETIDOR as $item) {
            $attributesArray[] = $item;
        }

        return view("Results.result", ['attributesArray' => $attributesArray, 'ID_EVENTO' => $ID_EVENTO, 'ID_EVENTO_PISTA_GRUPO' => $ID_EVENTO_PISTA_GRUPO, 'ID_CORRIDA' => $ID_CORRIDA]);
    }

    public function insertData(Request $request, $ID_EVENTO, $ID_EVENTO_PISTA_GRUPO, $ID_CORRIDA)
    {
        $nKarts = $request->input("nKart");
        $nome = $request->input("nome");
        $tempos = $request->input("tempo");

        $count = count($nKarts);
        $insertionSuccessful = true;

        for ($i = 0; $i < $count; $i++) {
            $time = $tempos[$i];
            list($minutes, $seconds) = explode(':', $time);
            $totalSeconds = (floatval($minutes) * 60) + floatval($seconds);

            // Check if the same float value exists in the database's melhorVolta column
            $existingTempo = Voltas::whereRaw('CAST(melhorVolta AS DECIMAL(10, 3)) = ?', [$totalSeconds])->first();

            if ($existingTempo) {
                $insertionSuccessful = false;
                break;
            }

            // If not a duplicate, proceed with insertion
            $volta = new Voltas();
            $volta->numKart = $nKarts[$i];
            $volta->nomePiloto = $nome[$i];
            $volta->melhorVolta = $totalSeconds;
            $volta->save();
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
