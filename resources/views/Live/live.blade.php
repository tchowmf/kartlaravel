@extends('TemplateUser.index')

@section('contents')

    <!-- Page Body -->
    <div class="justify-content-between mb-3" id=dados-container>

    </div>

@endsection

@section('scripts')

<script>

setInterval(function() {
    /*
    $.ajax({
        url: 'liveTable',
        method: 'GET',
        success: function(data) {
            // Atualiza o conteúdo da div com os novos dados recebidos
            $('#dados-container').html(data);
        },
        error: function(xhr, status, error) {
            console.error('Erro ao buscar os dados:', error);
        }
        */
        $.get('http://127.0.0.1:8000/live/liveTable').then(retorno => {
    //$('.teste').innerHTML = retorno
    $('#dados-container').html(retorno);
})

}, 5000); // Atualiza em ms

</script>

@endsection
