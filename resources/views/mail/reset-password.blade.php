<!-- reset-password.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Recuperação de Senha - Kart Timer</title>
</head>
<body>
    <h1>Kart Timer</h1>
    <img src="caminho/para/logo.png" alt="Logo Kart Timer">

    <p>Olá, {{ $userDetails['name'] }},</p>

    <p>Você está recebendo esta mensagem porque solicitou a redefinição de senha do site Kart Timer.</p>

    <p>Seu nome de usuário é: {{ $userDetails['name'] }}</p>

    <p>Para redefinir sua senha, utilize o link abaixo:</p>
    <a href="{{ $resetLink }}">Redefinir Senha</a>

    <p>Lembre-se: para entrar no site, você pode utilizar o e-mail {{ $censoredEmail }} e digitar a nova senha escolhida.</p>

    <p>Caso você não tenha solicitado a recuperação de senha, por favor, responda este e-mail com essa informação.</p>

    <p>Atenciosamente,<br>Kart Timer</p>
</body>
</html>
