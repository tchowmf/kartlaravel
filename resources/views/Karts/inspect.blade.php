@extends('TemplateUser.index')

@section('contents')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detalhes do Kart: {{ $numKart }}</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered dataTable">
                <thead>
                    <th>Nome do Piloto</th>
                    <th>Nota do Piloto</th>
                    <th>Melhor Volta</th>
                    <th>Ação</th>
                </thead>
                <tbody>
                    @foreach ($voltas as $volta)
                        <tr>
                            <td>{{ $volta->nomePiloto }}</td>
                            <td>{{ $volta->notaPiloto}}</td>
                            <td>{{ $volta->melhorVolta }}</td>
                            <td><a href="/karts/{{ $volta->numKart }}/excluir/{{ $volta->id }}" class="btn btn-danger"><li class="fa fa-trash"></li></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
