@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h2 class="h3 mb-0 text-gray-800">PILOTOS</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="dataTable" class="table table-bordered">

                <thead>
                    <th>Nome do PILOTO</th>
                    <th>Nota do Piloto</th>
                    <th>Melhor Tempo</th>
                    <th>KART do Melhor Tempo</th>
                    <th>Ação</th>
                </thead>

                <tbody>
                    @foreach ($driverInfo as $driver)
                        <tr>
                            <input type="hidden" value="{{ $driver['id'] }}"/>
                            <td>{{ $driver['driverName'] }}</td>
                            <td>{{ $driver['grade']}}</td>
                            <td>{{ $driver['fastestLap'] }}</td>
                            <td>{{ $driver['kartFastestLap'] }}</td>
                            <td>
                                <a href="{{ route('get.grade', ['racetrack' => $racetrack, 'id' => $driver['id']]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-info"><i class="fa fa-search"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
    </table>

    <script>
        new DataTable('#dataTable');
    </script>
@endsection
