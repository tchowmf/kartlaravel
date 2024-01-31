<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\Kart;
use App\Models\Voltas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

trait calculosTrait
{
    public function calcularNotas()
    {
        $karts = Voltas::select('numKart', DB::raw('AVG(melhorVolta) AS media'))->groupBy('numKart')->get();

        foreach ($karts as $kart) {
            $voltas = Voltas::where('numKart', $kart->numKart)->get();
            $mediaKart = $kart->media;

            foreach ($voltas as $volta) {
                $mediaTempo = Voltas::avg('melhorVolta');

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

                Kart::where('numKart', $kart->numKart)->update(['notaKart' => $nota]);

                //Quando a tabela estiver sem registros, usar:
                //Karts::updateOrInsert(['numKart' => $kart->numKart], ['notaKart' => $nota]);

            }
        }
    }

    public function calcularTempo()
    {
        $resultados = DB::table('voltas')
            ->select('numKart', DB::raw('AVG(melhorVolta) AS mediaTempo'), DB::raw('COUNT(*) AS numVoltas'))
            ->groupBy('numKart')
            ->get();

        foreach ($resultados as $resultado) {
            $kartId = $resultado->numKart;
            $mediaTempo = number_format($resultado->mediaTempo, 3);

            // Aqui você pode formatar o tempo como necessário
            $mediaTempoFormatado = $this->formatarTempo($mediaTempo);

            try {
                // Tente encontrar ou criar um Kart existente
                $kart = Kart::firstOrNew(['numKart' => $kartId]);

                // Preencha os valores do Kart
                $kart->numKart = $kartId;
                $kart->mediaTempo = $mediaTempoFormatado;
                $kart->numVoltas = $resultado->numVoltas;
                $kart->save();

            } catch (\Exception $e) {
                // Tratar o erro aqui
                if ($e->getCode() == '23000') {
                    // Trate a duplicação de chave
                    Session::flash('error', "Erro: Duplicação de chave para Kart com ID " . $kartId);
                } else {
                    // Outro tipo de erro
                    Session::flash('error', "Erro ao salvar Kart com N: " . $kartId . ": " . $e->getMessage());
                }
            }
        }
    }

    private function formatarTempo($tempoEmSegundos)
    {
        $minutos = floor($tempoEmSegundos / 60);
        $segundos = floor($tempoEmSegundos % 60);
        $milissegundos = ($tempoEmSegundos - floor($tempoEmSegundos)) * 1000;

        return sprintf('%02d:%02d.%03d', $minutos, $segundos, $milissegundos);
    }
}
