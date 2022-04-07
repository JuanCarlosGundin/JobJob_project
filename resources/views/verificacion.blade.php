<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d5e6cb8fd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>
    <body class="body-login">
        <div class="logo">
            <img src="storage/uploads/jobjob_logo.png">
        </div>
        <div id="main" class="modal-login">
            <div class="modal-content">
                <form method="POST" onsubmit="verificar(); return false;"  id="loginP">
                    <h2>Introduce tus datos para verificar tu cuenta</h2>
                    <input class="inputlogin" type="text" name="mail" id="mail_login" placeholder="Introduce tu correo"><br><br>
                    <input class="inputlogin" type="password" name="contra" id="contra_login" placeholder="Introduce tu contraseña"><br>
                    <button class= "botonlogin" type="submit" value="register">Verificar</button>
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="js/verificar.js"> </script>
    </body>
</html>
