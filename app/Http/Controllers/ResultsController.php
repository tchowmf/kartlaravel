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

        $xml = simplexml_load_file("https://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/results/eventos.xml") or die("Can't load xml");

        $attributesArray = [];

        foreach($xml as $item) {
            $attributesArray[] = $item->attributes();

        }
        usort($attributesArray, function ($a, $b) {return $b['ID_EVENTO'] - $a['ID_EVENTO'];});
        return view("Results.show", ['attributesArray' => $attributesArray]);
    }
}
