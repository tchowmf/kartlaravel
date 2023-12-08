@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">SISTEMA DE TROCA</h1>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>PROBABILIDADES</span>
        </div>
        <div class="card-body">
            <table class="table table-bordered dataTable">
                <thead>
                    <th>KART nota S</th>
                    <th>KART nota A</th>
                    <th>KART nota B</th>
                    <th>KART nota C</th>
                    <th>KART nota D</th>
                </thead>
                <tbody>
                    @foreach($probabilidadePorNota as $porcentagem)
                        <td>{{number_format($porcentagem, 2)}}%</td>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
