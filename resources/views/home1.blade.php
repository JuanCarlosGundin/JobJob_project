<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/15d3106c42.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
    <title>JobJob</title>
</head>

<body>
    <div class="region-navbar">
        {{-- <div class="curriculum-navbar">
            <button class="icon" onClick="window.location.href='prueba';"><i class="fa-solid fa-file-invoice"></i></button>
        </div> --}}
        <div class="alerts-navbar active-left">
            <button class="icon active-icon"><i class="fa-solid fa-bell"></i></button>
        </div>
        <div class="main-navbar">
            <button class="main-icon" onClick="window.location.href='prueba2';"><i class="fa-solid fa-briefcase"></i></button>
        </div>
        {{-- <div class="chat-navbar">
           <button class="icon" onClick="window.location.href='prueba3';"><i class="fa-solid fa-comment-dots"></i></button>
        </div> --}}
        <div class="profile-navbar">
            <button class="icon" onClick="window.location.href='prueba4';"><i class="fa-solid fa-user"></i></button>
        </div>
    </div>
    <div class="alerts">
        <div class="filter">
            <div class="buscador">
                <input class="input-buscar" type="text" id="filter" name="filter" placeholder="Buscar">
            </div>
            <div class="buscador-icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
        <div class="alert">
            <div class="alert-foto">
                <img class="alert-profilefoto" src="https://www.altheis.es/wp-content/uploads/2019/01/massada-men.jpg">
            </div>
            <div class="alert-mensaje">
                <p class="alert-mensaje-text">¡Le interesas a rodrigo!</p>
            </div>
            <div class="alert-user">
                <button class="alert-user-btn">
                    <i class="fa-solid fa-user"></i>
                </button>
            </div>
            <div class="alert-chat">
                <button class="alert-chat-btn">
                    <i class="fa-solid fa-comments"></i>
                </button>
            </div>
        </div>
        <hr class="alert-linea">
    </div>
</body>

</html>