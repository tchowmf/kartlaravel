@extends('TemplateUser.index')
@section('title', "Tabela $racetrack - Kart Timer")

@section('contents')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">TABELA GERAL {{ $racetrack }}</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="dataTable" class="table table-bordered">
                <thead>
                    <th>Numero do KART</th>
                    <th>Nota do KART</th>
                    <th>Media de Tempo</th>
                    <th>Quantidade de Baterias</th>
                    <th>Nome do Piloto da Melhor Volta</th>
                    <th>Nota do Piloto</th>
                    <th>Melhor Volta</th>
                    <th>Ação</th>
                </thead>
                
                <tbody>
                    @foreach ($kartInfo as $kartData)
                        <tr>
                            <td>{{ $kartData['kart']->identifier }}</td>
                            <td>{{ $kartData['kart']->grade }}</td>
                            <td>{{ $kartData['kart']->formattedAvgLap() }}</td>
                            @if ($kartData['bestLap'])
                            <td>{{ $kartData['appearences']}}</td>
                                <td>{{ $kartData['driver']->name }}</td>
                                <td>{{ $kartData['driver']->grade }}</td>
                                <td>{{ $kartData['driver']->formattedBestLap() }}</td>
                            @endif
                            <td>
                                <a href="{{ route('get.drivergrade', ['racetrack' => $racetrack, 
                                'id' => $kartData['driver']->id]) }}" class="btn btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{ route('get.kart', ['racetrack' => $racetrack, 
                                'nKart' => $kartData['kart']->identifier]) }}" class="btn btn-info">
                                    <li class="fa fa-search"></li>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script>
        new DataTable('#dataTable', {
            pageLength: 50
        });
    </script>
@endsection
