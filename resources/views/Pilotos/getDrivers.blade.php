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
                    <th data-searchable="true">Nome do PILOTO</th>
                    <th data-searchable="false">Nota do Piloto</th>
                    <th data-searchable="false">Melhor Tempo</th>
                    <th data-searchable="true">KART do Melhor Tempo</th>
                    <th data-searchable="false">Ação</th>
                </thead>

                <tbody>
                    @foreach ($driverInfo as $driver)
                        <tr>
                            <td>{{ $driver['driverName'] }}</td>
                            <td>S</td>
                            <td>{{ $driver['fastestLap'] }}</td>
                            <td>{{ $driver['kartFastestLap'] }}</td>
                            <td>
                                <a href="/pilotos/inserir-nota/{{ $driver['driverName'] }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
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
