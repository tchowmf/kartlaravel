@extends('TemplateUser.index')
@section('contents')

<!-- Page Heading -->
    <div class="d-flex justify-content-between mb-3">
        <h2 class="h3 mb-0 text-gray-800">SELECIONAR KART</h2>
    </div>

    <!-- Page Body -->
    <div class="card">
        <div class="card-body">
            <form method="post" action="/live/speedpark/select">
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
            <a href="/live/speedpark" class="btn btn-info">INICIAL</a>
            <a href="/live/speedpark/select" class="btn btn-info">SELECIONAR KART</a>
            <a href="/live/speedpark/media" class="btn btn-info">MEDIA das VOLTAS</a>
            <a href="/live/timer" class="btn btn-info">CRONOMETRO</a>
            <a href="/live" class="btn btn-info">Voltar</a>
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
