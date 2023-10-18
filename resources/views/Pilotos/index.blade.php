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
                <form method="get">
                    <select class="form-control" name="orderby" id="orderby" aria-label="Ordenar por">
                        <option value="id" selected="selected">Ordenação padrão</option>
                        <option value="melhorVolta">Ordenar por melhor tempo</option>
                        <option value="nomePiloto">Ordenar por nome do piloto</option>
                        <option value="numKart">Ordenar por número do kart</option>
                        <option value="notaPiloto">Ordenar por nota do piloto</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered dataTable">

                <thead>
                    <th>Nome do PILOTO</th>
                    <th>Nota do Piloto</th>
                    <th>Melhor Tempo</th>
                    <th>KART do Melhor Tempo</th>
                    <th>Ação</th>
                </thead>

                <tbody>
                    @foreach ($voltas as $volta)
                        <tr>
                            <td>{{ $volta->nomePiloto }}</td>
                            <td>{{ $volta->notaPiloto }}</td>
                            <td>{{ $volta->melhorVolta }}</td>
                            <td>{{ $volta->numKart }}</td>
                            <td>
                                <a href="/pilotos/inserir-nota/{{ $volta->id }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-info"><i class="fa fa-search"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
    </table>

    <script>
        document.getElementById('orderby').addEventListener('change', function() {
            var selectedValue = this.value;
            var currentUrl = window.location.href;
            var newUrl = updateQueryStringParameter(currentUrl, 'orderby', selectedValue);
            window.location.href = newUrl;
        });

        // Função para atualizar parâmetros na URL
        function updateQueryStringParameter(uri, key, value) {
            var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
            var separator = uri.indexOf('?') !== -1 ? "&" : "?";
            if (uri.match(re)) {
                return uri.replace(re, '$1' + key + "=" + value + '$2');
            } else {
                return uri + separator + key + "=" + value;
            }
        }
    </script>
@endsection
