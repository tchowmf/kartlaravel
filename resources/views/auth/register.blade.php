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
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container custom-container">

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
                            <form method="POST" action="{{ route('register') }}">
                                @CSRF
                                <!-- First Name -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" id="firstname" class="form-control form-control-user"
                                        name="firstname" value="{{ old('firstname') }}" required autofocus 
                                        autocomplete="firstname" placeholder="{{ __('First Name') }}" />

                                        <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="text" id="lastname" class="form-control form-control-user" 
                                        name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" 
                                        placeholder="{{ __('Last Name') }}" />

                                        <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control form-control-user" name="email" 
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail" />

                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" id="password" class="form-control from-control-user" 
                                        name="password" required autocomplete="new-password" 
                                        placeholder="{{ __('Password') }}"/>
                                        
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" id="password" class="form-control form-controll-user" 
                                        name="password_confirmation" required autocomplete="new-password" 
                                        placeholder="{{ __('Confirm Password') }}" />

                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Invitation code-->
                                <div class="form-group">
                                    <input type="text" id="invite" class="form-control form-control-user" required 
                                        name="invite" placeholder="Código de Invite">
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Register') }}
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Já tem uma conta? Login!</a>
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
</body>
</html>
