@extends('TemplateUser.index')
@section('contents')

@php
    $titulo = "Inserir/Atualizar Nota do PILOTO";
@endphp

<h1 class="h3 mb-4 text-gray-800">{{ $titulo }}</h1>
<div class="card" style="width: 30%;">
    <div class="card-header">
        {{ isset($volta) ? 'Atualizar' : 'Inserir' }} Nota do Piloto
    </div>
    <div class="card-body">
        <form method="post" action="{{ isset($volta) ? '/pilotos/salvar-nota/'.$volta->id : (isset($id) ? '/pilotos/salvar-nota/'.$id : '/pilotos/salvar-nota') }}">
            @CSRF
            <input type="hidden" name="id" value="{{ $volta->id ?? $id ?? '' }}"/>

            <label class="form-label">Nome do Piloto: @isset($volta) {{ $volta->nomePiloto }} @endisset</label><br>
            <label class="form-label">Nota do Piloto:</label>
            <select class="form-control" name='notaPiloto'>
                <option value="S" {{ isset($volta) && $volta->notaPiloto === 'S' ? 'selected' : '' }}>S</option>
                <option value="A" {{ isset($volta) && $volta->notaPiloto === 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ isset($volta) && $volta->notaPiloto === 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ isset($volta) && $volta->notaPiloto === 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ isset($volta) && $volta->notaPiloto === 'D' ? 'selected' : '' }}>D</option>
            </select>
            <br/>
            <td>
            <input type="submit" class="btn btn-success" value="Atualizar">
            <a href="{{ route('excluir.nota', ['id' => $volta->id]) }}" class="btn btn-danger"><li class="fa fa-trash"></li></a>
            <a href="/pilotos" class="btn btn-info">Voltar</a>
            </td>
        </form>
    </div>
</div>
@endsection
