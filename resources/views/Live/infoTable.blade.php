<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kart Timer</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        @foreach ($header as $attributes)
            <h2 class="h3 mb-0 text-gray-800">{!! $attributes->TITULO !!}</h2>
            TEMPO DE PROVA: {{ $attributes->TEMPOCORRIDA }}<br>
            TEMPO RESTANTE: {{ $attributes->TEMPORESTANTE }}<br><br>
            {{$attributes->MELHORVOLTAPROVA}}
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
                    <th>Nº VOLTA</th>
                    <th>MELHOR VOLTA</th>
                    <th>TEMPO ULTIMA VOLTA</th>
                    <th>MEDIA DAS VOLTAS</th>
                    <th>DIF FRENTE</th>
                    <th>DIF ATRAS</th>
                </thead>
                <tbody>
                    @foreach ($attributesArray as $index => $attributes)
                    @if($attributes->NUMERO == $numero)
                        <tr>
                            <td>{{ $attributes->P_INI }}</td>
                            <td>{{ $attributes->POS }}º</td>
                            <td>{{ $attributes->NUMERO }}</td>
                            <td>{{ $attributes->VOLTA }}</td>
                            <td>{{ $attributes->TEMPO_MELHOR_VOLTA}} - volta: {{ $attributes->MELHOR_VOLTA}}</td>
                            <td>{{ $attributes->TEMPO_VOLTA }}</td>
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
                                            $resultado = '00:' .$resultadoSeconds. '.' .sprintf('%03d', $resultadoMilliseconds);
                                        }
                                    } else {
                                        $resultado = "Divisão por zero";
                                    }
                                @endphp
                                {{ $resultado }}
                            </td>
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

            <div>
                @foreach ($attributesArray as $index => $attributes)
                    @php
                    $totalAttributes = count($attributesArray);

                        if ($index < $totalAttributes - 1) {
                            $nextDIFA = $attributesArray[$index + 1]->DIFA;
                        } else {
                            $nextDIFA = "---";
                        }
                        if ($index < $totalAttributes - 1) {
                            $nextPOS = $attributesArray[$index + 1]->POS;
                        } else {
                            $nextPOS = "-";
                        }
                        if ($index > 0) {
                            $prevPOS = $attributesArray[$index - 1]->POS;
                        } else {
                            $prevPOS = "-"; // Ou defina um valor padrão para o primeiro elemento
                        }if ($index < $totalAttributes - 1) {
                            $nextNUM = $attributesArray[$index + 1]->NUMERO;
                        } else {
                            $nextNUM = "-";
                        }
                        if ($index > 0) {
                            $prevNUM = $attributesArray[$index - 1]->NUMERO;
                        } else {
                            $prevNUM = "-"; // Ou defina um valor padrão para o primeiro elemento
                        }

                    @endphp
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
                            <span class="text-primary" style="font-weight: bold; font-size: 50px;">{{ $nextDIFA}}</span>
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 20px;">{{ $prevPOS }} - {{ $prevNUM }}º</span> <!-- 1 nextDIFA acima ou seja sobe uma posição (se o kart esta na posicao 6 mostrar 1 a menos (5)-->
                            <span style="font-size: 20px;">{{ $nextPOS }} - {{ $nextNUM }}º</span> <!-- 1 nextDIFA abaixo ou seja desce uma posicao (se o kart esta na posicao 6 mostrar 1 a mais (7)-->
                        </div><br>

                    @endif
                @endforeach
            </div>


            <a href="/live/speedpark" class="btn btn-info">INICIAL</a>
            <a href="/live/speedpark/select" class="btn btn-info">SELECIONAR KART</a>
            <a href="/live/speedpark/media" class="btn btn-info">MEDIA das VOLTAS</a>
            <a href="/live/timer" class="btn btn-info">CRONOMETRO</a>
            <a href="/live" class="btn btn-info">Voltar</a>
        </div>
    </div>
</body>

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
