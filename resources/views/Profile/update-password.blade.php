@extends('TemplateUser.index')

@section('contents')
<div class="d-flex justify-content-between mb-3">
    <h1 class="h3 mb-0 text-gray-800">CONTA</h1>
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

                        <a class="nav-link" href="/profile/support" style="color: black; text-decoration: none;">
                            Suporte
                        </a>

                        <a class="nav-link" href="/profile/update-password" style="color: black; text-decoration: none;">
                            Alterar senha
                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal" style="color: black; text-decoration: none;">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <form class="user col-md-8 mt-1" method="post" action="/profile/update-password" onsubmit="return validatePassword()">
            @CSRF
            <div class="card mb-3 content">
                <h2 class="m-3 pt-3">ALTERAR SENHA</h2>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <br><h5>Senha atual:</h5>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="password" class="form-control form-control-user"
                                name="current_password" required id="current_password" placeholder="Senha Atual...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <br><h5>Nova Senha:</h5>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="password" class="form-control form-control-user"
                                name="new_password" required id="new_password" placeholder="Nova Senha...">
                        </div>
                            <span id="password-error" style="color: red;"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <br><h5>Confirmação de Nova Senha:</h5>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="password" class="form-control form-control-user"
                                name="confirm_password" required id="confirm_password" placeholder="Confirmação de Nova Senha...">
                            <span id="password-error" style="color: red;"></span>
                        </div>
                    </div>
                    <button type="submit" class="col-md-4 btn btn-primary btn-user btn-block">
                        Alterar Senha
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>


<script>
    function validatePassword() {
        var password = document.getElementById("new_password").value;
        var confirmPassword = document.getElementsByName("confirm_password")[0].value;

        var uppercaseRegex = /^(?=.*[A-Z])/;
        var lengthRegex = /^.{8,}$/;

        var errors = [];

        if (!lengthRegex.test(password)) {
            errors.push("A senha deve ter no mínimo 8 caracteres.");
        }

        if (!uppercaseRegex.test(password)) {
            errors.push("A senha precisa ter uma letra maiúscula.");
        }

        if (password !== confirmPassword) {
            errors.push("As senhas não coincidem.");
        }

        if (errors.length > 0) {
            document.getElementById("password-error").innerHTML = errors.join("<br>");
            return false;
        } else {
            document.getElementById("password-error").innerHTML = "";
            document.getElementById("confirm-error").innerHTML = "";
            return true;
        }
    }
</script>

@endsection
