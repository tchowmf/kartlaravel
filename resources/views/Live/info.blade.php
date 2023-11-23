@extends('TemplateUser.index')

@section('contents')

    <!-- Page Body -->
    <div class="justify-content-between mb-3" id=dados-container>

    </div>

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
