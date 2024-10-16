<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Email</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
    <h1>{{ $saudacao }} {{ $nom_usuario }},</h1> 
    <p>Segue abaixo o link para redefinir a senha:</p>
    <a href="{{ $link }}"> {{ $link }}</a>
    <br>
    <p>Att, Equipe SecureClient.</p>
    </body>
</html>
