@extends('TemplateUser.index')

@section('contents')

    <!-- Page Body -->
    <div class="justify-content-between mb-3" id=dados-container>

    </div>


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

@endsection

@section('scripts')

<script>
setInterval(function() {
    var numeroKart = '{{ $numero }}'
    $.ajax({
        url: '/live/infoTable/' + numeroKart,
        method: 'GET',
        success: function(data) {
            // Atualiza o conteúdo da div com os novos dados recebidos
            $('#dados-container').html(data);
        },
        error: function(xhr, status, error) {
            console.error('Erro ao buscar os dados:', error);
        }
    });
}, 5000); // Atualiza em ms
</script>

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
