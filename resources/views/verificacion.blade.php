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
                    <h2>Verifícate</h2>
                    <input class="inputlogin" type="text" name="mail" id="mail_login" placeholder="Introduce tu correo"><br><br>
                    <input class="inputlogin" type="password" name="contra" id="contra_login" placeholder="Introduce tu contraseña"><br>
                    <button class= "botonlogin" type="submit" value="register">Verificar</button>
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script> function verificar() {
            let mail_login = document.getElementById('mail_login').value;
            let contra_login = document.getElementById('contra_login').value;

            if (mail_login == '' || contra_login == '') {
                swal.fire({
                    title: "Error",
                    text: "Tienes que rellenar todos los datos",
                    icon: "error",
                });
                return false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(mail_login)) {
                swal.fire({
                    title: "Error",
                    text: "Introduce un email correcto",
                    icon: "error",
                });
                return false;
            }else if(contra_login.length > 50){
                swal.fire({
                    title: "Error",
                    text: "La contraseña no puede ser más larga de 50 caracteres",
                    icon: "error",
                });
                return false;
            }else if(mail_login.length > 100){
                swal.fire({
                    title: "Error",
                    text: "El email no puede ser más largo de 100 caracteres",
                    icon: "error",
                });
                return false;
            } else {
                return true;
            }
        }</script>
    </body>
</html>
