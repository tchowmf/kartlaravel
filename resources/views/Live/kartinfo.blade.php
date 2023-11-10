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
            <a href="/live/kgv" class="btn btn-info">INICIAL</a>
            <a href="/live/kgv/select" class="btn btn-info">SELECIONAR KART</a>
            <a href="#" class="btn btn-info">PAGINA 4</a>
            <a href="/live/kgv" class="btn btn-info">Voltar</a>
        </div>
    </div>

@endsection
