@extends('TemplateUser.index')
@section('title', "Piloto: $driver->name - Kart Timer")

@section('contents')

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800">Tempos do piloto - {{ $driver->name }}</h2>
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
            <label class="form-label">Nota do Piloto: {{ $driver->grade }}</label>
            <table class="table table-bordered dataTable">
                <thead>
                    <th>Kart da Volta</th>
                    <th>Tempo de Volta</th>
                    <th>Nota do Kart</th>
                    <th>Ação</th>
                </thead>
                <tbody>
                    @foreach ($laps as $lap)
                        <tr>
                            <td>{{ $lap->kart_identifier }}</td>
                            <td>{{ $lap->best_lap }}</td>
                            <td>{{ $lap->kart_grade}}</td>
                            <td>
                                <form action="{{ route('delete.lap', ['racetrack' => $racetrack, 'nKart' => $lap->kart_identifier, 
                                'id' => $lap->id]) }}" method="post" id="deleteForm_{{ $lap->id }}">
                                    @csrf
                                    @method('DELETE')
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
            document.getElementById('deleteForm_' + id).submit();
        }
    }
</script>
@endsection
