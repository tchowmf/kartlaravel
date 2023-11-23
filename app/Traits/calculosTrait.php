<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\Voltas;
use App\Models\Karts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

trait calculosTrait
{
    public function calcularNotas()
    {
        $voltas = Voltas::all();

        foreach ($voltas as $volta) {
            $tempoVolta = floatval($volta->melhorVolta);

            $mediaTempo = Voltas::avg('melhorVolta');

            $diferenca = $tempoVolta - $mediaTempo;

            if ($diferenca <= -5) {
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

            Voltas::where('id', $volta->id)->update(['notaKart' => $nota]);
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
                $kart = Karts::firstOrNew(['numKart' => $kartId]);

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