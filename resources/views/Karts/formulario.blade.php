@extends('TemplateUser.index')
@section('title', "Nota Kart $kart->identifier - Kart Timer")

@section('contents')

<h2 class="h3 mb-4 text-gray-800">{{ isset($kart->grade) ? 'Atualizar' : 'Inserir' }} nota do KART: {{ $kart->identifier}}</h2>
<div class="card" style="width: 30%;">
    <div class="card-body">
        <form method="post" action="{{ route('post.kartgrade', ['racetrack' => $racetrack, 'nKart' => $kart->identifier]) }}">
            @CSRF
            <input type="hidden" name="id" value="{{ $kart->id ?? $id ?? '' }}"/>

            <label class="form-label">Atribuir Nota do Kart:</label>
            <select class="form-control" name="kartGrade" id="kartGrade">
                <option value="S" {{ $kart->grade === 'S' ? 'selected' : '' }}>S</option>
                <option value="A" {{ $kart->grade === 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ $kart->grade === 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ $kart->grade === 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ $kart->grade === 'D' ? 'selected' : '' }}>D</option>
            </select>
            <br/>
            <td>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <a href="{{ route('get.karts', ['racetrack' => $racetrack]) }}" class="btn btn-info">Voltar</a>
                    
                    <a href="{{ route('delete.kartgrade', ['racetrack' => $racetrack, 'nKart' => $kart->identifier]) }}"
                         class="btn btn-danger">
                         <li class="fa fa-trash"></li>
                    </a>
                    <input type="submit" class="btn btn-success" value="Atualizar">
                </div>
            </td>
        </form>
    </div>
</div>
@endsection
