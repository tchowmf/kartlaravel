<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register - Kart Timer</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crie sua conta!</h1>
                            </div>
                            <form class="user" method="post" action="/register" onsubmit="return validatePassword()">
                                @CSRF
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="firstname"
                                            name="firstname" required placeholder="Primeiro Nome">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="lastname"
                                            name="lastname" required placeholder="Sobrenome">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email"
                                        name="email" required placeholder="E-mail">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            name="password" required id="password" placeholder="Senha">
                                        <span id="password-error" style="color: red;"></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="password_confirmation" required placeholder="Confirmação de senha">
                                        <span id="confirm-error" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" required id="invite"
                                        name="invite" placeholder="Código de Invite">
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Registrar Conta
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/forgot-password">Esqueceu a senha?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/login">Já tem uma conta? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementsByName("password_confirmation")[0].value;

            var uppercaseRegex = /^(?=.*[A-Z])/;
            var lengthRegex = /^.{8,}$/;

            var errors = [];

            if (!lengthRegex.test(password)) {
                errors.push("A senha deve ter no mínimo 8 caracteres.");
            }

            if (!uppercaseRegex.test(password)) {
                errors.push("A senha deve conter pelo menos uma letra maiúscula.");
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

</body>

</html>
