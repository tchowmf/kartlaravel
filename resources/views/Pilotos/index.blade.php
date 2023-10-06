@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">PILOTOS</h1>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" placeholder="Pesquisar nome PILOTO">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>Lista dos PILOTOS</span>
            <div>
                <a href="#" class="btn btn-primary"><i class="fa fa-arrow-up"></i></a>
                <a href="#" class="btn btn-primary"><i class="fa fa-arrow-down"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered dataTable">

                <thead>
                    <th>Nome do PILOTO</th>
                    <th>Melhor Tempo</th>
                    <th>KART do Melhor Tempo</th>
                    <th>Ação</th>
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
