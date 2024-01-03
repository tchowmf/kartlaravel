@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h2 class="h3 mb-0 text-gray-800">RESULTADO</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="dataTable" class="table table-bordered">
                <thead>
                    <th>POSIÇÃO</th>
                    <th>KART</th>
                    <th>NOME PILOTO</th>
                    <th>TEMPO MELHOR VOLTA</th>
                    <th>N MELHOR VOLTA</th>
                    <th>N VOLTAS</th>
                    <th>TEMPO TOTAL</th>
                    <th>DIF LIDER</th>
                    <th>DIF FRENTE</th>
                </thead>
                <tbody>
                    @foreach ($attributesArray as $attributes)
                        <tr>
                            <form method="post" action="">
                                @CSRF
                                <td>{{ $attributes->NM_POSICAO }}</td>
                                <td>{{ $attributes->NM_NUMERO }}</td>
                                <td>
                                    {{ $attributes->ST_NOME }}
                                    {{ $attributes->ST_SOBRENOME }}
                                    <input type="hidden" name="nome[]" value="{{ $attributes->ST_NOME }} {{ $attributes->ST_SOBRENOME }}">
                                </td>
                                <td>{{ $attributes->TEMPO_MELHOR_VOLTA }}</td>
                                <td>{{ $attributes->NM_MELHOR_VOLTA }}</td>
                                <td>{{ $attributes->VOLTAS }}</td>
                                <td>{{ $attributes->TEMPO_TOTAL }}</td>
                                <td>{{ $attributes->DIF_PRIMEIRO }}</td>
                                <td>{{ $attributes->DIF_ANTERIOR }}</td>
                                <!-- Input fields for data submission -->
                                <input type="hidden" name="nKart[]" value="{{ $attributes->NM_NUMERO }}">
                                <input type="hidden" name="tempo[]" value="{{ $attributes->TEMPO_MELHOR_VOLTA }}">
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <a href="/results/speedpark/{{$ID_EVENTO}}/{{$ID_EVENTO_PISTA_GRUPO}}/provas" class="btn btn-info">Voltar</a>
                <input type="submit" class="btn btn-success" value="Inserir Tempos">
            </div>
        </form>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        new DataTable('#dataTable');
    </script>

    @if(Session::has('success'))
        <script>
            alert("{{ Session::get('success') }}")
        </script>
    @endif

    @if(Session::has('danger'))
        <script>
            alert("{{ Session::get('danger') }}")
        </script>
    @endif

    @if(Session::has('error'))
        <script>
            alert("{{ Session::get('error') }}");
        </script>
    @endif

@endsection
