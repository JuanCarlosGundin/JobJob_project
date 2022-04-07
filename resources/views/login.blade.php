<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/15d3106c42.js" crossorigin="anonymous"></script>
    <title>Login</title>
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
</head>
<body class="body-login">
    <div class="region-navbar">
        {{-- <div class="curriculum-navbar active-left">
            <button id="navbar-curriculum-icon" class="icon active-icon"><i class="fa-solid fa-file-invoice"></i></button>
        </div> --}}
        <div class="alerts-navbar">
            <button id="navbar-alerts-icon" class="icon"><i class="fa-solid fa-bell"></i></button>
        </div>
        <div class="main-navbar">
            <button id="navbar-main-icon" class="main-icon" ><i class="fa-solid fa-briefcase"></i></button>
        </div>
        {{-- <div class="chat-navbar">
           <button id="navbar-chat-icon" class="icon" onClick="window.location.href='prueba3';"><i class="fa-solid fa-comment-dots"></i></button>
        </div> --}}
        <div class="profile-navbar active">
            <button id="navbar-profile-icon" class="icon active-icon"><i class="fa-solid fa-user"></i></button>
        </div>
    
        {{-- <div class="curriculum">
            <h1 class="curriculum-title">COMING SOON...</h1>
        </div> --}}
      </div>
    <div class="logo">
        <img src="storage/uploads/icon.jpg">
    </div>
    <div class="modal-login">
        <div class="botones">
        <button class="btn-signin">Sign In</button>
        <button class="btn-register">Register</button>
        </div>
            <div class="modal-content">
            <form action="{{url('login')}}" method="POST">
                @csrf
                <h2>JobJob es innovador</h2>
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
