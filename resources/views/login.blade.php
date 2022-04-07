<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/6d5e6cb8fd.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/15d3106c42.js" crossorigin="anonymous"></script>
        <title>Login</title>
        <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
        <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
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
            <img src="storage/uploads/jobjob_logo.png">
        </div>
        <div class="modal-login">
            <div class="botones">
                <button class="btn-signin">Sign In</button>
                <button class="btn-register">Register</button>
            </div>
            <div id="main" class="modal-login">
                {{-- <div class="botones-registrar">
                    <button class="btn-signin" onclick="login()">Sign In</button>
                    <button class="btn-register" onclick="registrar()">Register</button>
                </div>
                    <div id="main" class="modal-content">
                    </div>--}}
            </div>
        </div>
        <script src="js/ajaxusuario.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>
