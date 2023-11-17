<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\Voltas;
use App\Models\Karts;
use Illuminate\Support\Facades\DB;

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

        return redirect('karts/birigui');
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

            // Atualizar o modelo Kart com os valores calculados
            $kart = new Karts();

            if ($kart) {
                $kart->numKart = $kartId;
                $kart->mediaTempo = $mediaTempoFormatado;
                $kart->numVoltas = $resultado->numVoltas;
                $kart->save();

                // Exibir informações (pode ser log ou saída para console)
                echo "Kart " . $kartId . " - Média de Tempo: " . $mediaTempoFormatado . " - Número de Voltas: " . $resultado->numVoltas . "\n";
            } else {
                // Tratar a situação em que o kart não foi encontrado
                echo "Kart com ID " . $kartId . " não encontrado\n";
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
