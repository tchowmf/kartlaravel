@extends('TemplateUser.index')
@section('title', "Kart: $nKart - Kart Timer")

@section('contents')

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800">Detalhes do Kart nº {{ $nKart }}</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered dataTable">
                <thead>
                    <th>Nome do Piloto</th>
                    <th>Tempo de Volta</th>
                    <th>Nota do Piloto</th>
                    <th>Ação</th>
                </thead>
                <tbody>
                    @foreach ($laps as $lap)
                        <tr>
                            <td>{{ $lap->driver_name }}</td>
                            <td>{{ $lap->driver_grade }}</td>
                            <td>{{ $lap->best_lap }}</td>
                            <td>
                                <form action="{{ route('delete.lap', ['racetrack' => $racetrack, 'nKart' => $nKart, 
                                'id' => $lap->id]) }}" method="post" id="deleteForm_{{ $lap->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('get.grade', ['racetrack' => $racetrack, 
                                    'id' => $lap->driver_id]) }}" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $lap->id }}')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    function confirmDelete(id) {
        if (confirm("Tem certeza que deseja excluir esta volta?")) {
            document.getElementById('deleteForm_' + $id).submit();
        }
    }
</script>
@endsection