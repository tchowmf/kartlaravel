@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detalhes do Kart: {{ $numKart }}</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered dataTable">
                <thead>
                    <th>Nome do Piloto</th>
                    <th>Melhor Volta</th>
                </thead>
                <tbody>
                    @foreach ($voltas as $volta)
                        <tr>
                            <td>{{ $volta->nomePiloto }}</td>
                            <td>{{ $volta->melhorVolta }}</td>
                        </tr>
                    @endforeach
                </tbody>
                </div>
            </div>
            </table>
@endsection
