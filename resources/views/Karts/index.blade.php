@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">KARTS</h1>

    <div class="card">
        <div class="card-header">
            Lista dos KARTS
        </div>
        <div class="card-body">
            <table class="table table-bordered dataTable">

                <thead>
                    <th>Numero do KART</th>
                    <th>Media de Tempo</th>
                    <th>Quantidade de Baterias</th>
                    <th>
                        <a href="#" class="btn btn-primary ordenar" data-ordenar="asc"><li class="fa fa-arrow-up"></li></a>
                        <a href="#" class="btn btn-primary ordenar" data-ordenar="desc"><li class="fa fa-arrow-down"></li></a>
                    </th>
                </thead>

                <tbody>
                    @foreach ($karts as $kart)
                        <tr>
                            <td>{{ $kart['numKart'] }}</td>
                            <td>{{ $kart['mediaTempo'] }}</td>
                            <td>{{ $kart['numVoltas'] }}</td>
                            <td><a href="{{ url("karts/" . $kart['numKart']) }}" class="btn btn-info"><li class="fa fa-search"></li></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
