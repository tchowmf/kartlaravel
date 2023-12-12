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
    </div>
</body>

@endsection
