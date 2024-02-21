@extends('TemplateUser.index')
@section('contents')

<h2 class="h3 mb-4 text-gray-800">{{ isset($driver->grade) ? 'Atualizar' : 'Inserir' }} nota do PILOTO</h2>
<div class="card" style="width: 30%;">
    <div class="card-body">
        <form method="post" action="{{ route('post.grade', ['racetrack' => $racetrack, 'id' => $driver->id]) }}">
            @CSRF
            <input type="hidden" name="id" value="{{ $driver->id ?? $id ?? '' }}"/>

            <label class="form-label">Nome do Piloto: {{ $driver->name }}</label><br>
            <label class="form-label">Nota do Piloto:</label>
            <select class="form-control" name="driverGrade" id="driverGrade">
                <option value="S" {{ $driver->grade === 'S' ? 'selected' : '' }}>S</option>
                <option value="A" {{ $driver->grade === 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ $driver->grade === 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ $driver->grade === 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ $driver->grade === 'D' ? 'selected' : '' }}>D</option>
            </select>
            <br/>
            <td>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <a href="{{ route('get.drivers', ['racetrack' => $racetrack]) }}" class="btn btn-info">Voltar</a>
                    <a href="{{ route('delete.grade', ['racetrack' => $racetrack, 'id' => $driver->id]) }}" class="btn btn-danger"><li class="fa fa-trash"></li></a>
                    <input type="submit" class="btn btn-success" value="Atualizar">
                </div>
            </td>
        </form>
    </div>
</div>
@endsection
