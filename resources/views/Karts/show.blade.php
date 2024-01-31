@extends('TemplateUser.index')
@section('title', 'Karts Speed Park - Kart Timer')

@section('contents')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h2 class="h3 mb-0 text-gray-800">KARTS</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="dataTable" class="table table-bordered">

                <thead>
                    <th data-searchable="true">Numero do KART</th>
                    <th data-searchable="false">Nota do KART</th>
                    <th data-searchable="false">Media de Tempo</th>
                    <th data-searchable="false">Quantidade de Baterias</th>
                    <th data-searchable="false">Ação</th>
                </thead>

                <tbody>
                    @foreach ($kartInfo as $kart)
                        <tr>
                            <td>{{ $kart['nKart'] }}</td>
                            <td>S</td>
                            <td>{{ $kart['avgLap'] }}</td>
                            <td>{{ $kart['appearences'] }}</td>
                            <td>
                                <a href="{{ route("getKart", ['racetrack' => $kart['currentRaceTrack'], 'nKart' => $kart['nKart']]) }}" class="btn btn-info">
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
        new DataTable('#dataTable');
    </script>

@endsection
