@extends('TemplateUser.index')

@section('contents')
<div class="d-flex justify-content-between mb-3">
    <h1 class="h3 mb-0 text-gray-800">CONTA</h1>
    <div class="input-group col-md-2">
        <input type="text" class="form-control" placeholder="Pesquisar LOCAL">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
        </div>
    </div>
</div>

<body>
    <div class="row">
        <div class="col-md-2">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ asset('img/undraw_profile.svg') }}" class="rounded-circle" widht="150">
                    <div class="mt-3">
                        <h3>{{ $userInfo->firstname }} {{ $userInfo->lastname }}</h3>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <a class="nav-link" href="/profile" style="color: black; text-decoration: none;">
                            Conta
                        </a>

                        <a class="nav-link" href="#" style="color: black; text-decoration: none;">
                            Suporte
                        </a>

                        <a class="nav-link" href="/profile/update-password" style="color: black; text-decoration: none;">
                            Alterar senha
                        </a>

                        <a class="nav-link" href="/profile/settings" style="color: black; text-decoration: none;">
                            Configurações gerais
                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal" style="color: black; text-decoration: none;">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-1">
            <div class="card mb-3 content">
                <h2 class="m-3 pt-3">Logado como: {{ $userInfo->firstname}}</h2>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <br><h5>Nome completo:</h5>
                        </div>
                        <span>
                            <br>{{$userInfo->firstname}} {{$userInfo->lastname}} <a href="#"><img src="{{ asset('img/edit.gif') }}" alt="Edit Value"></a>
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <br><h5>E-mail:</h5>
                        </div>
                        <span>
                            <br>{{$userInfo->email}} <a href="#"><img src="{{ asset('img/edit.gif') }}" alt="Edit Value"></a>
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <br><h5>Data de nascimento:</h5>
                        </div>
                        <span>
                            <br>{{$userInfo->email}} <a href="#"><img src="{{ asset('img/edit.gif') }}" alt="Edit Value"></a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="card mb-3 content">
                <h2 class="m-3 pt-3">Estatísticas</h2>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <br><h5>Participou de corridas:</h5>
                        </div>
                        <span>
                            <br>0
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <br><h5>Última atividade:</h5>
                        </div>
                        <span>
                            <br>{{$userInfo->updated_at->format('d/m/Y H:i:s')}}
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <br><h5>Criou a conta em:</h5>
                        </div>
                        <span>
                            <br>{{$userInfo->created_at->format('d/m/Y H:i:s')}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection



