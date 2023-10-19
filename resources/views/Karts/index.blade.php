@extends('TemplateUser.index')

@section('contents')
<!-- Page Heading -->
<div class="d-flex justify-content-between mb-3">
    <h2 class="h3 mb-0 text-gray-800">KARTÓDROMOS DISPONÍVEIS</h2>
    <div class="input-group col-md-2">
        <input type="text" class="form-control" placeholder="Pesquisar LOCAL">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
        </div>
    </div>
</div>


<table style="width: 50%;">
    <style>
        table {
            width: 100%;
            border-collapse: separate; /* Use "separate" para permitir espaçamento */
            border-spacing: 10px; /* Adicione o espaçamento desejado em pixels */
        }

        th, td {
            width: 50%; /* Distribua igualmente o espaço entre as duas colunas */
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
            <td onclick="location.href='/karts/birigui';" style="cursor: pointer;">
                <div>
                    <span style="font-weight: bold;">Speed Park - Birigui</span><br>
                    <div style="float: left; height: 80px; width: 10px;"></div>
                    <!--<a>@ Autodromo XRP</a><br>-->
                    <span style="font-size: 12px">@ Birigui</span>
                </div>
            </td>

            <td onclick="location.href='/karts/kgv';" style="cursor: pointer;">
                <div>
                    <span style="font-weight: bold;">KGV - Kartodromo Granja Viana</span><br>
                    <div style="float: left; height: 80px; width: 10px;"></div>
                    <!--<a>@ Kartodromo Granja Viana</a><br>-->
                    <span style="font-size: 12px">@ São Paulo</span>
                </div>
            </td>
        </tr>
    </tbody>
</table>
@endsection
