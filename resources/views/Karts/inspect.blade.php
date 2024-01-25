@extends('TemplateUser.index')
@section('title', "Kart $numKart - Kart Timer")

@section('contents')

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800">Detalhes do Kart: {{ $numKart }}</h2>

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
