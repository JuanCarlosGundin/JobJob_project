<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/15d3106c42.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
    <title>PERFIL</title>
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
    <div id="contenidoajax">
        {{-- contenido ajax --}}
    </div>
    {{-- Eliminar cuenta modalbox --}}
    <div id="modal-eliminar" class="modal-eliminar-user">
        <div class="modal-content" id="modal_content">
        </div>
    </div>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script src="js/perfil.js"></script>
</body>
</html>