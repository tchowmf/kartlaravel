@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Tabelas</h1>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" placeholder="Pesquisar...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>Ranking geral</span>
            <div>
                <a href="#" class="btn btn-primary"><i class="fa fa-arrow-up"></i></a>
                <a href="#" class="btn btn-primary"><i class="fa fa-arrow-down"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered dataTable">
                <thead>
                    <th>Numero do KART</th>
                    <th>Media de Tempo</th>
                    <th>Quantidade de Baterias</th>
                    <th>Nome do Piloto</th>
                    <th>Melhor Volta</th>
                    <th>Ação</th>
                </thead>
                <tbody>
                    @foreach ($dadosCombinados as $dados)
                        <tr>
                            <td>{{ $dados['numKart'] }}</td>
                            <td>{{ $dados['mediaTempo'] }}</td>
                            <td>{{ $dados['numVoltas'] }}</td>
                            <td>{{ $dados['nomePiloto'] }}</td>
                            <td>{{ $dados['melhorVolta'] }}</td>
                            <td><a href="#" class="btn btn-info"><li class="fa fa-search"></li></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
