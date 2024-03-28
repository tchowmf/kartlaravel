@extends('TemplateUser.index')
@section('title', "Karts $racetrack - Kart Timer")

@section('contents')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h2 class="h3 mb-0 text-gray-800">KARTS {{ $racetrack }}</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="dataTable" class="table table-bordered">

                <thead>
                    <th>Numero do KART</th>
                    <th>Nota do KART</th>
                    <th>Media de Tempo</th>
                    <th>Quantidade de Baterias</th>
                    <th>Ação</th>
                </thead>

                <tbody>
                    @foreach ($kartInfo as $kart)
                        <tr>
                            <td>{{ $kart['nKart'] }}</td>
                            <td>{{ $kart['grade']}}</td>
                            <td>{{ $kart['kart']->formattedAvgLap() }}</td>
                            <td>{{ $kart['appearences'] }}</td>
                            <td>
                                <a href="{{ route('get.kartgrade', ['racetrack' => $racetrack, 'nKart' => $kart['nKart']]) }}" 
                                    class="btn btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{ route("get.kart", ['racetrack' => $racetrack, 'nKart' => $kart['nKart']]) }}" 
                                    class="btn btn-info">
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
        });('#dataTable');
    </script>

@endsection
