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

    {{------------------------------------------------- VER USUARIO --------------------------------------------}}
    <div id="contenidoajax">
        
    </div>

    {{-- Foto --}}

    <div class="user-vista">
        <div class="user-ver-foto">
            <div class="container-foto">
                <img class="user-profilefoto" src="https://www.altheis.es/wp-content/uploads/2019/01/massada-men.jpg">
                <div class="user-edit-div">
                    <button class="user-edit-btn"><i class="fa-solid fa-pen"></i></button>
                </div>
            </div>
        </div>
        {{-- Inputs para editar el usuario --}}
        <div class="user-ver">
            {{-- Nombre, apellido y edad --}}
            <div class="user-div-name">
                <div class="user-icon-name">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="divs-name">
                    <span class="p-name">Juan</span>
                    <span class="p-surname">Garcia</span>
                    <i class="fa-solid fa-cake-candles"></i>
                    <span class="p-age"> 23</span>
                </div>
            </div>
            {{-- Correo --}}
            <div class="user-div-house">
                <div class="user-icon-name">
                    <i class="fa-solid fa-at"></i>
                </div>
                <div class="divs-house">
                    <span class="p-house">email@email.com</span>
                </div>
            </div>
            {{-- Vivienda --}}
            <div class="user-div-house">
                <div class="user-icon-name">
                    <i class="fa-solid fa-house-chimney"></i>
                </div>
                <div class="divs-house">
                    <span class="p-house">Bellvitge</span>
                </div>
            </div>
            {{-- Estudios y cursos --}}
            <div class="user-div-house">
                <div class="user-icon-name">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div class="divs-house">
                    <span class="p-house">DAW</span>
                </div>
            </div>
            {{-- Experiencia --}}
            <div class="user-div-house">
                <div class="user-icon-name">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <div class="divs-house">
                    <span class="p-house">Timtul</span>
                </div>
            </div>
            {{-- Conocimientos --}}
            <div class="user-div-house">
                <div class="user-icon-name">
                    <i class="fa-solid fa-brain"></i>
                </div>
                <div class="divs-house">
                    <span class="p-house">Python</span>
                </div>
            </div>
            {{-- Idioma --}}
            <div class="user-div-house">
                <div class="user-icon-name">
                    <i class="fa-solid fa-language"></i>
                </div>
                <div class="divs-house">
                    <span class="p-house">Castellano</span>
                </div>
            </div>
            {{-- Sector --}}
            <div class="user-div-house">
                <div class="user-icon-name">
                    <i class="fa-solid fa-building"></i>
                </div>
                <div class="divs-house">
                    <span class="p-house">Informatico</span>
                </div>
            </div>
            {{-- Jornada --}}
            <div class="user-div-house">
                <div class="user-icon-name">
                    <i class="fa-solid fa-business-time"></i>
                </div>
                <div class="divs-house">
                    <span class="p-house">Completa</span>
                </div>
            </div>
            {{-- Descripcion --}}
            <div class="user-div-desc">
                <div class="user-icon-desc">
                    <span class="sobre-mi-desc">Sobre mi:</span>
                </div>
                <div class="divs-desc">
                    <span class="p-desc">Me gusta cantar, bailar, salir de fiesta y el furbo</span>
                </div>
            </div>
        </div> 
    </div>

    {{------------------------------------------------- EDITAR USUARIO --------------------------------------------}}

    <div class="user-edit" id="zonaperfil">
        {{-- Contenido ajax --}} 
    </div>

    {{-- Eliminar cuenta modalbox --}}
    <div id="modal-eliminar-user" class="modal-eliminar-user">
        <div class="modal-content">
            <h2 class="modal-title">¿Seguro que quieres eliminar el usuario?</h2>
            <div class="eliminar-user-butons">
                <button class="cancelar-eliminar">Cancelar</button>
                <button class="aceptar-eliminar">Eliminar</button>
            </div>
        </div>
    </div>
    <script src="js/perfil.js"></script>
</body>
</html>