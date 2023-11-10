<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivesController extends Controller
{

    public function index()
    {
        return view("Live.index");
    }

    /* LIVETIME CONSULT WORKING*/
    public function showLive()
    {
        $url = "file:///E:/Geral/Estudos/Projetos/ProjetoKart/teste%20xml/livetime.xml";

        $xml = simplexml_load_file($url) or die ("Can't load xml");

        $attributesArray = [];

        $ignoreFirstDIFA = true;

        foreach($xml->PROVA->POSICOES as $item) {
            $attributesArray[] = $item;
        }

        $header = [];

        foreach($xml->PROVA as $teste) {
            $header[] = $teste->attributes();
        }

        return view("Live.live", ['attributesArray' => $attributesArray, 'header' => $header, 'ignoreFirstDIFA' => $ignoreFirstDIFA]);
    }

    public function select()
    {
        $url = "file:///E:/Geral/Estudos/Projetos/ProjetoKart/teste%20xml/livetime.xml";

        $xml = simplexml_load_file($url) or die ("Can't load xml");

        $attributesArray = [];

        foreach($xml->PROVA->POSICOES as $item) {
            $attributesArray[] = $item->NUMERO;
        }

        return view("Live.select", ['attributesArray' => $attributesArray]);
    }

    public function saveSelect(Request $request) {
        $numero = $request->input('numeroKart');
        var_dump($numero);
        return redirect("/live/kgv/$numero");
    }

    public function showDetail($numero) {
        $url = "file:///E:/Geral/Estudos/Projetos/ProjetoKart/teste%20xml/livetime.xml";

        $xml = simplexml_load_file($url) or die ("Can't load xml");

        $attributesArray = [];

        $ignoreFirstDIFA = true;

        foreach($xml->PROVA->POSICOES as $item) {
            $attributesArray[] = $item;
        }

        $header = [];

        foreach($xml->PROVA as $teste) {
            $header[] = $teste->attributes();
        }

        return view("Live.kartinfo", ['attributesArray' => $attributesArray, 'header' => $header, 'ignoreFirstDIFA' => $ignoreFirstDIFA, 'numero' => $numero]);
    }
}
