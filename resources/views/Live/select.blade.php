@extends('TemplateUser.index')
@section('contents')

<!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h2 class="h3 mb-0 text-gray-800">SELECIONAR KART</h2>
    </div>

    <!-- Page Body -->
    <div class="card">
        <div class="card-body">
            <form method="post" action="/live/kgv/select">
                @CSRF
                <input type="hidden" id="numeroKart" name="numeroKart" value="">
                <tbody>
                    <label class="form-label">N KART</label>
                    <select id='numero' name='numero'  class="form-control select">
                            <option value="" selected></option>
                        @foreach ($attributesArray as $attributes)
                            <option value="{{ $attributes }}">
                                {{ $attributes }}
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

@section('scripts')

<script>
    $(document).ready(function(){
        $('.select').on('change', function() {
            $('#numeroKart').val(this.value)
        });
    })
</script>

@endsection
