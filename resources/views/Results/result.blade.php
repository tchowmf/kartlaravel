@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h2 class="h3 mb-0 text-gray-800">RESULTADO</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered dataTable">
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
                            <td>{{ $attributes->NM_POSICAO }}</td>
                            <td>{{ $attributes->NM_NUMERO }}</td>
                            <td>{{ $attributes->ST_NOME }}
                                {{ $attributes->ST_SOBRENOME }}</td>
                            <td>{{ $attributes->TEMPO_MELHOR_VOLTA }}</td>
                            <td>{{ $attributes->NM_MELHOR_VOLTA }}</td>
                            <td>{{ $attributes->VOLTAS }}</td>
                            <td>{{ $attributes->TEMPO_TOTAL }}</td>
                            <td>{{ $attributes->DIF_PRIMEIRO }}</td>
                            <td>{{ $attributes->DIF_ANTERIOR }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="/results/kgv/{{$ID_EVENTO}}/{{$ID_EVENTO_PISTA_GRUPO}}/provas" class="btn btn-info">Voltar</a>
        </div>
    </div>

@endsection
