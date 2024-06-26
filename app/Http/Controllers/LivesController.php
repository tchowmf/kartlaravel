<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LivesController extends Controller
{

    public function index(): View
    {
        return view("Live.index");
    }

    public function live(): View
    {
        return view("Live.live");
    }

    public function info($numero): View
    {
        $url = "http://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/livetime.xml";

        $xml = simplexml_load_file($url) or die ("Can't load xml");

        $attributesArray = [];

        $ignoreFirstDIFA = true;

        foreach($xml->PROVA->POSICOES as $item) {
            $attributesArray[] = $item;
        }

        return view("Live.info", ['attributesArray' => $attributesArray, 'numero' => $numero]);
    }

    public function timer(): View
    {
        return view("Live.timer");
    }


    /* LIVETIME CONSULT WORKING*/
    public function liveTable(): View
    {
        $url = "http://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/livetime.xml";

        $xml = simplexml_load_file($url) or die ("Can't load xml");

        $attributesArray = [];

        foreach($xml->PROVA->POSICOES as $item) {
            $attributesArray[] = $item;
        }

        $header = [];

        foreach($xml->PROVA as $teste) {
            $header[] = $teste->attributes();
        }

        return view("Live.liveTable", ['attributesArray' => $attributesArray, 'header' => $header]);


        // Faz a requisição para o arquivo XML
        /*$response = Http::get('https://www.mylaptime.com/laptime/clientes/221140117X058667009C3BP47/livetime.xml');

        // Verifica se a resposta foi bem-sucedida
        if ($response->successful()) {
            // Obtém o corpo da resposta como texto
            $xmlContent = $response->body();

            // Converte o XML em um array associativo
            $xmlData = simplexml_load_string($xmlContent);
            $json = json_encode($xmlData);
            $dataArray = json_decode($json, true);

            $attributesArray = [];


            if (isset($dataArray['PROVA']['POSICOES'])) {
                $posicoes = $dataArray['PROVA']['POSICOES'];

                foreach ($posicoes as $posicao) {
                    $attributesArray[] = $posicao;
                }
            }

            // Retorna os dados processados
            return view("Live.live", ['dados' => $attributesArray]);
        } else {
            // Retorna uma resposta de erro em caso de falha na requisição
            return response()->json(['error' => 'Falha ao buscar os dados XML'], 500);
        }*/

    }

    public function select(): View
    {
        $url = "http://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/livetime.xml";

        $xml = simplexml_load_file($url) or die ("Can't load xml");

        $attributesArray = [];

        foreach($xml->PROVA->POSICOES as $item) {
            $attributesArray[] = $item->NUMERO;
        }

        return view("Live.select", ['attributesArray' => $attributesArray]);
    }

    public function saveSelect(Request $request) {
        $numero = $request->input('numeroKart');

        return redirect("/live/speedpark/$numero");
    }

    public function showDetail($numero): View
    {
        $url = "http://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/livetime.xml";

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

        return view("Live.infoTable", ['attributesArray' => $attributesArray, 'header' => $header, 'ignoreFirstDIFA' => $ignoreFirstDIFA, 'numero' => $numero]);
    }

    public function showAverage(): View
    {
        $url = "http://www.mylaptime.com/laptime/clientes/01B8502PX0650661AC69772LB/livetime.xml";

        $xml = simplexml_load_file($url) or die ("Can't load xml");

        $attributesArray = [];

        foreach($xml->PROVA->POSICOES as $item) {
            $attributesArray[] = $item;
        }

        $header = [];

        foreach($xml->PROVA as $teste) {
            $header[] = $teste->attributes();
        }

        return view("Live.average", ['attributesArray' => $attributesArray, 'header' => $header]);
    }
}
