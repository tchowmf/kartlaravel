@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">SISTEMA DE TROCA</h1>
    </div>

    <style>
        .checkbox-container {
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 10px;
            width: 120px; /* Largura fixa para todos os checkboxes */
        }
    </style>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>SELECIONE OS KARTS DISPONIVEIS (desmarque os que estao correndo)</span>
        </div>
        <div class="card-body">
            <table class="table table-bordered dataTable">
                <tbody>
                    <form method="post" action="">
                        @CSRF
                        <div class="checkbox-wrapper">
                            @foreach ($nKart as $numero)
                                <div class="checkbox-container">
                                    <label style="display: block;">
                                        <input type="checkbox" checked="checked" name="karts_selecionados[]" value="{{ $numero }}" style="display: inline-block; vertical-align: middle;">
                                        <span style="display: inline-block; vertical-align: middle; margin-left: 5px;">{{ $numero }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <br><button type="submit" class="btn btn-success">Enviar</button>
                    </form>
                </tbody>
            </table>
        </div>
    </div>

@endsection
