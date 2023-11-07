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

        $ignoreFirstDIFA = true;

        foreach($xml->PROVA->POSICOES as $item) {
            $attributesArray[] = $item;
        }

        $numeroKart = [];

        foreach($xml->PROVA->POSICOES as $item) {
            $numeroKart = $item->NUMERO;
            var_dump($numeroKart);
        }

        return view("Live.select", ['attributesArray' => $attributesArray, 'ignoreFirstDIFA' => $ignoreFirstDIFA, 'numeroKart' => $numeroKart]);
    }

    public function showDetail($numeroKart) {
        return view("Live.kartinfo");
    }
}
