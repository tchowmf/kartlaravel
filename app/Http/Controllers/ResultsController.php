<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultsController extends Controller
{
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
}
