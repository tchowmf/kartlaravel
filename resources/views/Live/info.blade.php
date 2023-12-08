@extends('TemplateUser.index')

@section('contents')

    <!-- Page Body -->
    @foreach($attributesArray as $index => $attributes)
    @if($attributes->NUMERO == $numero)
    <div class="mb-3" id="cronometro{{$index}}">
        <span class="text-primary" style="font-weight: bold; font-size: 100px; display: flex; position: absolute;">00:00.000</span><br>

        <div class="justify-content-between mb-3" id=dados-container>

        </div>
    </div>
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

@endsection
