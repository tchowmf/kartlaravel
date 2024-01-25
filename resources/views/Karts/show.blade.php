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
                    <th>Numero do KART</th>
                    <th>Nota do KART</th>
                    <th>Media de Tempo</th>
                    <th>Quantidade de Baterias</th>
                    <th>Ação</th>
                </thead>

                <tbody>
                    @foreach ($karts as $kart)
                        <tr>
                            <td>{{ $kart['numKart'] }}</td>
                            <td>{{ $kart['notaKart'] }}</td>
                            <td>{{ $kart['mediaTempo'] }}</td>
                            <td>{{ $kart['numVoltas'] }}</td>
                            <td><a href="{{ url("karts/speedpark/". $kart['numKart']) }}" class="btn btn-info"><li class="fa fa-search"></li></a></td>
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
