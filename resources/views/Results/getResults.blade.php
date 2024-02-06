@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h2 class="h3 mb-0 text-gray-800">CORRIDAS - RESULTADOS</h2>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" placeholder="Pesquisar n° RESULTADO">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>


    <table style="width: 100%;">
        <style>
            table {
                width: 100%;
                border-collapse: separate;
                border-spacing: 10px;
                page-break-inside: avoid; /* Evita que a tabela seja dividida entre páginas */
            }

            th, td {
                width: 50%;
                height: calc(1.5em + 0.75rem + 2px);
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #6e707e;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #d1d3e2;
                border-radius: 0.35rem;
            }
        </style>


        <tbody>
                <tr>
                    @foreach($attributesArray as $attributes)
                        <td onclick="location.href='/results/speedpark/{{$attributes['ID_EVENTO']}}/epg';" style="cursor: pointer; width: 25%; padding: 10px;">
                            <div>
                                <span style="font-weight: bold;">{{ $attributes['NOME'] }}</span><br>
                                <div style="float: left; height: 80px; width: 10px;"></div>
                                <span style="font-size: 12px">@ Birigui</span><br>
                                <span style="font-size: 12px">{{ $attributes['DATA'] }}</span><br>
                                <a style="font-size: 12px" href='{{ $attributes['link'] }}'></a>
                            </div>
                        </td>
                        @if($loop->iteration % 4 == 0)
                            </tr><tr>
                        @endif
                    @endforeach
                </tr>
            </table>
            <a href="/results/" class="btn btn-info">Voltar</a>
        </tbody>

@endsection
