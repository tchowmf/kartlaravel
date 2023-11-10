@extends('TemplateUser.index')

@section('contents')
        <!-- Page Heading -->
        <div class="d-flex justify-content-between mb-3">
            @foreach ($header as $attributes)
                <h2 class="h3 mb-0 text-gray-800">{!! $attributes->TITULO !!}</h2>
                TEMPO DE PROVA: {{ $attributes['TEMPOCORRIDA'] }}<br>
                TEMPO RESTANTE: {{ $attributes['TEMPORESTANTE'] }}<br><br>
                {{$attributes['MELHORVOLTAPROVA']}}
            @endforeach
        </div>

    <!-- Page Body -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered dataTable">
                <thead>
                    <th>POSIÇÃO REAL</th>
                    <th>POSIÇÃO PISTA</th>
                    <th>KART</th>
                    <th>N VOLTA</th>
                    <th>MELHOR VOLTA</th>
                    <th>TEMPO ULTIMA VOLTA</th>
                    <th>TEMPO DE PROVA</th>
                    <th>MEDIA DAS VOLTAS</th>
                    <th>POS MEDIA</th>
                    <th>DIF FRENTE</th>
                    <th>DIF ATRAS</th>
                </thead>
                <tbody>
                    @foreach ($attributesArray as $index => $attributes)
                    @if($attributes->NUMERO == $numero)
                        <tr>
                            <td>{{ $attributes->POS }}</td>
                            <td>{{ $attributes->P_INI }}</td>
                            <td>{{ $attributes->NUMERO }}</td>
                            <td>{{ $attributes->VOLTA }}</td>
                            <td>{{ $attributes->TEMPO_MELHOR_VOLTA}}</td>
                            <td>{{ $attributes->TEMPO_VOLTA }}</td>
                            <td>{{ $attributes->TEMPO_TOTAL }}</td>
                            <td>
                                @php
                                    $tempoTotalParts = explode(':', $attributes->TEMPO_TOTAL);
                                    $horas = intval($tempoTotalParts[0]);
                                    $minutos = intval($tempoTotalParts[1]);
                                    $segundos = floatval($tempoTotalParts[2]);
                                    $tempoTotalInSeconds = $horas * 3600 + $minutos * 60 + $segundos;
                                    $volta = $attributes->VOLTA;

                                    if ($volta != 0) {
                                        $resultadoInSeconds = $tempoTotalInSeconds / $volta;
                                        $resultadoMinutes = floor($resultadoInSeconds / 60);
                                        $resultadoSeconds = floor($resultadoInSeconds % 60);
                                        $resultadoMilliseconds = round(($resultadoInSeconds - floor($resultadoInSeconds)) * 1000);

                                        if ($resultadoMinutes > 0) {
                                            $resultado = $resultadoMinutes. ':' .sprintf('%02d', $resultadoSeconds). '.' .sprintf('%03d', $resultadoMilliseconds);
                                        } else {
                                            $resultado = $resultadoSeconds. '.' .sprintf('%03d', $resultadoMilliseconds);
                                        }
                                    } else {
                                        $resultado = "Divisão por zero";
                                    }
                                @endphp
                                {{ $resultado }}

                            </td>
                            <td>3</td>
                            <td>{{ $attributes->DIFA}}</td>
                            <td>
                                @php
                                $totalAttributes = count($attributesArray);

                                    if ($index < $totalAttributes - 1) {
                                        $nextDIFA = $attributesArray[$index + 1]->DIFA;
                                    } else {
                                        $nextDIFA = "---";
                                    }
                                @endphp
                                {{ $nextDIFA }}
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
                @foreach ($attributesArray as $index => $attributes)
                    @if($attributes->NUMERO == $numero)

                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 20px;">POSIÇÃO</span>
                            <span style="font-size: 20px;">VOLTA</span>
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="text-primary" style="font-weight: bold; font-size: 50px;">{{ $attributes->POS }}</span>
                            <span class="text-primary" style="font-weight: bold; font-size: 50px;">{{ $attributes->TEMPO_VOLTA }}</span>
                            <span class="text-primary" style="font-weight: bold; font-size: 50px;">{{ $attributes->VOLTA }}</span>
                        </div>

                        <div id="cronometro{{$index}}">
                            <br><br><br><br><span class="text-primary" style="font-weight: bold; font-size: 100px; display: flex; justify-content: center;">00:00.000</span><br><br><br><br><br>
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="text-primary" style="font-weight: bold; font-size: 50px;">{{ $attributes->DIFA}}</span>
                            <span class="text-primary" style="font-weight: bold; font-size: 50px;">{{ $attributes->VOLTA }}</span>
                            <span class="text-primary" style="font-weight: bold; font-size: 50px;">{{ $nextDIFA}}</span>
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 20px;">5° - 27</span>
                            <span style="font-size: 20px;">7° - 22</span>
                        </div><br>

                    @endif
                @endforeach

            <a href="/live/kgv" class="btn btn-info">INICIAL</a>
            <a href="/live/kgv/select" class="btn btn-info">SELECIONAR KART</a>
            <a href="#" class="btn btn-info">PAGINA 4</a>
            <a href="/live/kgv" class="btn btn-info">Voltar</a>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var voltasAnteriores = {}; // Para rastrear voltas anteriores

    // Função para iniciar o cronômetro
    function iniciarCronometro(index) {
        var cronometroElement = document.getElementById('cronometro' + index).querySelector('span');
        var startTime = new Date().getTime(); // Tempo de início em milissegundos

        function atualizarCronometro() {
            var currentTime = new Date().getTime();
            var elapsedTime = (currentTime - startTime) / 1000; // Tempo decorrido em segundos

            // Atualiza o formato hh:mm:ss
            var minutos = Math.floor(elapsedTime / 60);
            var segundos = Math.floor(elapsedTime % 60);
            var milissegundos = Math.floor((elapsedTime % 1) * 1000);

            // Formatação do cronômetro
            var formattedTime = minutos.toString().padStart(2, '0') +
                ':' + segundos.toString().padStart(2, '0') +
                '.' + milissegundos.toString().padStart(3, '0');

            // Atualiza o texto no span, mantendo a formatação
            cronometroElement.innerHTML = formattedTime;
        }

        // Limpar o cronômetro se já estiver em execução
        clearInterval(voltasAnteriores[index]);

        // Iniciar o cronômetro
        voltasAnteriores[index] = setInterval(atualizarCronometro, 1);
    }

    // Reinicia o cronômetro quando a VOLTA mudar
    function reiniciarCronometro(index) {
        clearInterval(voltasAnteriores[index]);
        iniciarCronometro(index);
    }

    // Inicie o cronômetro quando a página carregar
    window.onload = function () {
        @foreach ($attributesArray as $index => $attributes)
            @if($attributes->NUMERO == $numero)
                iniciarCronometro({{ $index }});
            @endif
        @endforeach
    }
</script>

@endsection

