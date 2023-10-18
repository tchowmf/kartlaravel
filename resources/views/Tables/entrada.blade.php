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

@endsection
