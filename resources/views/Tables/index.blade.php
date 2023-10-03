@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tabela</h1>

   <div class="card">
        <div class = "card-header">
            Lista de Marcas
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
@endsection
