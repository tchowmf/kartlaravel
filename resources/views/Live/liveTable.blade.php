<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kart Timer</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        @foreach ($header as $attributes)
            <h2 class="h3 mb-0 text-gray-800">{!! $attributes->TITULO !!}</h2>
            TEMPO DE PROVA: {{ $attributes->TEMPOCORRIDA }}<br>
            TEMPO RESTANTE: {{ $attributes->TEMPORESTANTE }}<br><br>
            {{$attributes->MELHORVOLTAPROVA}}
        @endforeach
    </div>

    <!-- Page Body -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered dataTable">
                <thead>
                    <th>POSIÇÃO</th>
                    <th>KART</th>
                    <th>NOME PILOTO</th>
                    <th>Nº VOLTA</th>
                    <th>MELHOR VOLTA</th>
                    <th>TEMPO ULTIMA VOLTA</th>
                </thead>
                <tbody>
                    @foreach ($attributesArray as $index => $attributes)
                        <tr>
                            <td>{{ $attributes->POS }}º</td>
                            <td>{{ $attributes->NUMERO }}</td>
                            <td>{{ $attributes->NOME }}</td>
                            <td>{{ $attributes->VOLTA }}</td>
                            <td>{{ $attributes->TEMPO_MELHOR_VOLTA}} - volta: {{ $attributes->MELHOR_VOLTA}}</td>
                            <td>{{ $attributes->TEMPO_VOLTA }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="/live/speedpark" class="btn btn-info">INICIAL</a>
            <a href="/live/speedpark/select" class="btn btn-info">SELECIONAR KART</a>
            <a href="/live/speedpark/media" class="btn btn-info">MEDIA das VOLTAS</a>
            <a href="/live/timer" class="btn btn-info">CRONOMETRO</a>
            <a href="/live" class="btn btn-info">Voltar</a>
        </div>
    </div>
