<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6d5e6cb8fd.js" crossorigin="anonymous"></script>
    <title>JobJob</title>
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>
<body class="body-login">

    <div class="logo">
        <img src="storage/uploads/jobjob_logo.png">
    </div>
    <div class="modal-login">
        <div class="botones-registrar">
                <button class="btn-signin" onclick="login()">Sign In</button>
                <button class="btn-register" onclick="registrar()">Register</button>
        </div>
            <div id="main" class="modal-content-register-cuadrados">
                <h3>¿Cómo vas a usar JobJob?</h3>
                <div class="cuadrados">
                <button class="cuadrado" onclick="trabajador()"><i class="fa-solid fa-user"></i><br><br><p>Usuario</p></button>
                </div>
                <div class="cuadrados">
                <button class="cuadrado" onclick="empresa()"><i class="fa-solid fa-building"></i><br><br><p>Empresa</p></button>
                </div>
            </div>
    </div>
    <script src="js/ajaxusuario.js"></script>
</body>
</html>
