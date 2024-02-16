@extends('TemplateUser.index')
@section('title', "Kart: $nKart - Kart Timer")

@section('contents')

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800">Detalhes do Kart nº {{ $nKart }}</h2>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered dataTable">
                <thead>
                    <th>Nome do Piloto</th>
                    <th>Nota do Piloto</th>
                    <th>Tempo de Volta</th>
                    <th>Ação</th>
                </thead>
                <tbody>
                    @foreach ($laps as $lap)
                        <tr>
                            <td>{{ $driverName }}</td>
                            <td>{{ $driverGrade }}</td>
                            <td>{{ $lap->best_lap }}</td>
                            <td>
                                <a href="/karts/{{ $lap->numKart }}/excluir/{{ $lap->id }}" class="btn btn-danger">
                                    <li class="fa fa-trash"></li>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
