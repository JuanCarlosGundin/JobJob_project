<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}"></head>
    <body class="body-login">
        <div class="logo">
            <img src="storage/uploads/icon.jpg">
        </div>
        <div class="modal-login">
            <div class="botones">
                <form action="{{url('login')}}" method="GET">
                    <button class="btn-signin">Sign In</button>
                </form>
                <form action="{{url('registrar')}}" method="GET">
                    <button class="btn-register">Register</button>
                </form>
            </div>
                <div class="modal-content">
                <form action="{{url('login')}}" method="POST">
                    @csrf
                    <h2>Bienvenido a JobJob</h2>
                        <input class="inputlogin" type="text" name="mail" placeholder="Introduce tu correo"><br>
                        <input class="inputlogin" type="password" name="contra" placeholder="Introduce tu contraseña"><br>
                        <button class= "botonlogin" type="submit" value="register">Iniciar Sesión</button>
                        <p>¿contraseña olvidada?</p>
                        <div class="linea"></div>
                        <button class="google-login"><img class="google-img" src="storage/uploads/google.png">Conéctate con Google</button>
                </form>
                </div>
        </div>
    </body>
</html>
