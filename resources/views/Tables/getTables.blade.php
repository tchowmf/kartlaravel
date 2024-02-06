@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Tabelas</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="dataTable" class="table table-bordered">
                <thead>
                    <th>Numero do KART</th>
                    <th>Nota do KART</th>
                    <th>Media de Tempo</th>
                    <th>Quantidade de Baterias</th>
                    <th>Nome do Piloto</th>
                    <th>Nota do Piloto</th>
                    <th>Melhor Volta</th>
                    <th>Ação</th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>


    <script>
        new DataTable('#dataTable');
    </script>
@endsection
