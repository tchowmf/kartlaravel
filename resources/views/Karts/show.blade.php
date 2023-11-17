@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h2 class="h3 mb-0 text-gray-800">KARTS</h2>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" placeholder="Pesquisar n° KART">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>Lista dos KARTS</span>
            <div>
                <form method="get">
                    <select class="form-control" name="orderby" id="orderby" aria-label="Ordenar por" style="max-width: 250px">
                        <option value="id" selected="selected">Ordenação padrão</option>
                        <option value="numKart">Ordenar por número do kart</option>
                        <option value="notaKart">Ordenar por nota do kart: menor para maior</option>
                        <option value="notaKart-desc">Ordenar por nota do kart: maior para menor</option>
                        <option value="mediaTempo">Ordenar por melhor tempo: menor para maior</option>
                        <option value="mediaTempo-desc">Ordenar por melhor tempo: maior para menor</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered dataTable">

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
                            <td><a href="{{ url("karts/birigui/". $kart['numKart']) }}" class="btn btn-info"><li class="fa fa-search"></li></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('orderby').addEventListener('change', function() {
            const selectedValue = this.value;
            const currentUrl = window.location.href;

            // Analisar a URL atual
            const url = new URL(currentUrl);

            // Adicionar ou atualizar o parâmetro "orderby" na URL
            url.searchParams.set('orderby', selectedValue);

            // Redirecionar para a URL com o novo parâmetro
            window.location.href = url.toString();
        });
    </script>

@endsection
