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
                    <th>POSIÇÃO</th>
                    <th>KART</th>
                    <th>NOME PILOTO</th>
                    <th>N VOLTA</th>
                    <th>MELHOR VOLTA</th>
                    <th>NA VOLTA</th>
                    <th>TEMPO ULTIMA VOLTA</th>
                </thead>
                <tbody>
                    @foreach ($attributesArray as $index => $attributes)
                        <tr>
                            <td>{{ $attributes->POS }}</td>
                            <td>{{ $attributes->NUMERO }}</td>
                            <td>{{ $attributes->NOME }}</td>
                            <td>{{ $attributes->VOLTA }}</td>
                            <td>{{ $attributes->TEMPO_MELHOR_VOLTA}}</td>
                            <td>{{ $attributes->MELHOR_VOLTA}}</td>
                            <td>{{ $attributes->TEMPO_VOLTA }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="/live/kgv" class="btn btn-info">INICIAL</a>
            <a href="/live/kgv/select" class="btn btn-info">SELECIONAR KART</a>
            <a href="/live/media" class="btn btn-info">MEDIA das VOLTAS</a>
            <a href="/live" class="btn btn-info">Voltar</a>
        </div>
    </div>

@endsection
