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
        <div class="alerts-navbar">
            <button class="icon" onClick="window.location.href='prueba1';"><i class="fa-solid fa-bell"></i></button>
        </div>
        <div class="main-navbar">
            <button class="main-icon" onClick="window.location.href='prueba2';"><i class="fa-solid fa-briefcase"></i></button>
        </div>
        {{-- <div class="chat-navbar">
           <button class="icon" onClick="window.location.href='prueba3';"><i class="fa-solid fa-comment-dots"></i></button>
        </div> --}}
        <div class="profile-navbar active-right">
            <button class="icon active-icon"><i class="fa-solid fa-user"></i></button>
        </div>
    </div>
    <div class="user-edit">
        {{-- Foto --}}
        <div class="edit-foto">
            <button>
                <i class="fa-solid fa-pen"></i>
            </button>
        </div>
        <div class="user-edit-foto">
            <img class="user-edit-profilefoto" src="https://www.altheis.es/wp-content/uploads/2019/01/massada-men.jpg">   
        </div>
        {{-- Inputs para editar el usuario --}}
        <div class="user-input">
            {{-- Nombre, apellido y edad --}}
            <div class="user-input-name">
                <div class="user-icon-name">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="inputs-name">
                    <input class="input-name" type="text">
                    <input class="input-surname" type="text">
                    <input class="input-age" type="number">
                </div>
            </div>
            {{-- Vivienda --}}
            <div class="user-input-house">
                <div class="user-icon-name">
                    <i class="fa-solid fa-user"></i>
                </div>
                <input class="input-house" type="text">
                <input class="input-house-number" type="number">
            </div>
            {{-- Estudios y cursos --}}
            <div class="user-input-studies">
                <div class="user-icon-studies">
                    <i class="fa-solid fa-user"></i>
                </div>
                <input class="input-studies" type="text">
            </div>
            <div class="user-icon-more">
                <i class="fa-solid fa-user"></i>
            </div>
            {{-- Experiencia --}}
            <div class="user-input-experience">
                <div class="user-icon-experience">
                    <i class="fa-solid fa-user"></i>
                </div>
                <input class="input-experience" type="text">
                <p class="p-tiempo">Tiempo:</p>
                <input class="input-years" type="number">
            </div>
            <div class="user-icon-more">
                <i class="fa-solid fa-user"></i>
            </div>
            {{-- Conocimientos --}}
            <div class="user-input-conocimientos">
                <div class="user-icon-conocimientos">
                    <i class="fa-solid fa-user"></i>
                </div>
                <input class="input-studies" type="text">
            </div>
            <div class="user-icon-more">
                <i class="fa-solid fa-user"></i>
            </div>
            {{-- Idiomas --}}
            <div class="user-input-idiom">
                <div class="user-icon-idiom">
                    <i class="fa-solid fa-user"></i>
                </div>
                <input class="input-idiom" type="text">
            </div>
            <div class="user-icon-more">
                <i class="fa-solid fa-user"></i>
            </div>
        </div>
        {{-- Eliminar cuenta --}}
        <div class="eliminar-cuenta-edit">
            <button>
                <p><i class="fa-solid fa-trash-can"></i>Eliminar cuenta</p>
            </button>
        </div>
    </div>
</body>

</html>