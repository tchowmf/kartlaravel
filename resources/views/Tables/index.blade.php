@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tabela</h1>

    <div class="card">
        <div class = "card-header">
            Lista dos Tempos
        </div>
        <div class="card-body">
            <table id="tabela-kart" class="table table-bordered dataTable">

                <thead>
                    <td>Numero do KART</td>
                    <td>Media de Tempo</td>
                    <td>Quantidade de Baterias</td>
                    <td><a href="#" class="btn btn-primary ordenar" data-ordenar="asc"><li class="fa fa-arrow-up"></li></a>
                        <a href="#" class="btn btn-primary ordenar" data-ordenar="desc"><li class="fa fa-arrow-down"></li></a></td>
                </thead>

                <tbody>
                    @foreach ($tables as $linha)
                        <tr>
                            <td>{{ $linha['numKart'] }}</td>
                            <td>{{ $linha['mediaTempo'] }}</td>
                            <td>{{ $linha['numVoltas'] }}</td>
                            <td><a href="#" class="btn btn-info"><li class="fa fa-search"></li></a></td>
                        </tr>
                    @endforeach

                </tbody>
        </div>
    </div>
    </table>

@endsection

