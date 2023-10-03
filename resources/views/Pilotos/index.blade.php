@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">PILOTOS</h1>

    <div class="card">
        <div class = "card-header">
            Lista dos PILOTOS
        </div>
        <div class="card-body">
            <table class="table table-bordered dataTable">

                <thead>
                    <th>Nome do PILOTO</th>
                    <th>Melhor Tempo</th>
                    <th>KART do Melhor Tempo</th>
                    <th><a href="#" class="btn btn-primary"><li class="fa fa-arrow-up"></li></a>
                        <a href="#" class="btn btn-primary"><li class="fa fa-arrow-down"></li></a>
                    </th>
                </thead>

                <tbody>
                    @foreach ($voltas as $volta)
                        <tr>
                            <td>{{ $volta['nomePiloto'] }}</td>
                            <td>{{ $volta['melhorVolta'] }}</td>
                            <td>{{ $volta['numKart'] }}</td>
                            <td><a href="#" class="btn btn-info"><li class="fa fa-search"></li></a></td>
                        </tr>
                    @endforeach

                </tbody>
        </div>
    </div>
    </table>
@endsection
