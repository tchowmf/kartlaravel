@extends('TemplateUser.index')

@section('contents')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h2 class="h3 mb-0 text-gray-800">SELECIONAR KART</h2>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" placeholder="Pesquisar n° RESULTADO">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="/live/kgv/{{$numeroKart}}">
                @CSRF
                <tbody>
                    <label class="form-label">N KART</label>
                    <select name='id_categoria' class="form-control">
                        @foreach ($attributesArray as $index => $attributes)
                            <option value="{{ $attributes->NUMERO }}">
                                {{ $attributes->NUMERO }}
                            </option>
                        @endforeach
                    </select>
                    <br><input type="submit" class="btn btn-success" value="Selecionar Kart"><br><br>
                </tbody>
            </form>
            <a href="/live/kgv" class="btn btn-info">INICIAL</a>
            <a href="/live/kgv/select" class="btn btn-info">SELECIONAR KART</a>
            <a href="#" class="btn btn-info">PAGINA 4</a>
            <a href="/live/kgv" class="btn btn-info">Voltar</a>
        </div>
    </div>

@endsection
