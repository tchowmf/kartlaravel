<!-- email-confirmation.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Confirmação de E-mail - Kart Timer</title>
</head>
<body>
    <h1>Kart Timer</h1>
    <img src="caminho/para/logo.png" alt="Logo Kart Timer">

    <p>Olá, {{ $userDetails['name'] }},</p>

    <p>Você está recebendo esta mensagem para confirmar seu e-mail no site Kart Timer.</p>

    <p>Para confirmar seu e-mail, utilize o link abaixo:</p>
    <a href="{{ $verificationLink }}">Confirmar E-mail</a>

    <p>Lembre-se: este link é válido por um determinado período. Após esse tempo, será necessário solicitar um novo link.</p>

    <p>Se você não realizou esta solicitação, por favor, ignore este e-mail ou entre em contato conosco.</p>

    <p>Atenciosamente,<br>Kart Timer</p>
</body>
</html>
