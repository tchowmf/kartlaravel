@extends('TemplateUser.index')
@section('title', 'Suporte - Kart Timer')

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

        <div class="col-md-8 mt-1">
            <div class="card mb-3 content">
                <h2 class="m-3 pt-3">SUPORTE</h2>
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
                <form class="user" method="post" action="/support" onsubmit="return validatePassword()">
                    @CSRF
                    <div class="card-body">

                        <!-- Nome -->
                        <div class="row">
                            <div class="col-md-3">
                                <br><h5>Nome para Contato:</h5>
                            </div>
                            <div class="form-group" style="width: 250px">
                                <input type="text" class="form-control form-control-user"
                                    name="nomectt" required id="nomectt" placeholder="Nome para Contato">
                            </div>
                        </div>

                        <!-- email -->
                        <div class="row">
                            <div class="col-md-3">
                                <br><h5>E-mail para contato:</h5>
                            </div>
                            <div class="form-group" style="width: 250px">
                                <input type="email" class="form-control form-control-user"
                                    name="email" required id="email" placeholder="{{$userInfo->email}}">
                            </div>
                        </div>

                        <!-- telefone -->
                        <div class="row">
                            <div class="col-md-3">
                                <br><h5>Telefone para Contato:</h5>
                            </div>
                            <div class="form-group" style="width: 250px">
                                <input type="tel" class="form-control form-control-user"
                                    name="phone" required id="phone" placeholder="Telefone para Contato">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" name="wpp" id="wpp">
                                <label class="custom-control-label" for="wpp">Receber resposta pelo whatsapp? (tempo de resposta menor)</label>
                            </div>
                        </div>

                        <!-- espacador -->
                        <div class="row">
                            <div class="col-md-3">
                                <br>
                            </div>
                        </div>

                        <!-- text area -->
                        <label class="form-label"><h5>Pergunte-nos Qualquer Coisa!</h5></label>

                        <textarea class="form-control" name="descricao" id="descricao"
                        placeholder="Precisa de Ajuda? Dúvidas? Pergunte-nos Qualquer Coisa, Estamos Aqui para Ajudar!">
                        </textarea>

                        <br><button type="submit" class="btn btn-success">Enviar!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection


@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#descricao' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
    $(document).ready(function() {
        $('#phone').on('input', function() {
            let phoneNumber = $(this).val().replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            if (phoneNumber.length > 0) {
                // Formatação do número de telefone (exemplo: (XX) XXXXX-XXXX)
                phoneNumber = '(' + phoneNumber.substring(0, 2) + ') ' + phoneNumber.substring(2, 7) + '-' + phoneNumber.substring(7, 11);
            }
            $(this).val(phoneNumber); // Define o valor formatado no campo de entrada
        });
    });
</script>
@endsection
