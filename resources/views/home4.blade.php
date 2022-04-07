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

    {{------------------------------------------------- EDITAR USUARIO --------------------------------------------}}

    <div class="user-edit">
        {{-- Foto --}}
        {{-- <div class="edit-foto">
            <button>
                <i class="fa-solid fa-pen"></i>
            </button>
        </div>
        <div class="user-edit-foto">
            <img class="user-edit-profilefoto" src="https://www.altheis.es/wp-content/uploads/2019/01/massada-men.jpg">   
        </div> --}}
    <form>
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
                    <i class="fa-solid fa-cake-candles"></i>
                    <input class="input-age" type="number">
                </div>
            </div>
            {{-- Vivienda --}}
            <div class="user-input-house">
                <div class="user-icon-house">
                    <i class="fa-solid fa-house-chimney"></i>
                </div>
                <div class="inputs-house">
                    <input class="input-house" type="text">
                </div>
            </div>
            {{-- Estudios y cursos --}}
            <div class="contenedor">
                <div class="user-input-studies">
                    <div class="user-icon-studies">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <div class="inputs-studies">
                        <input class="input-studies" type="text">
                    </div>
                </div>
                <div class="user-icon-more">
                    <button class="user-icon-more-button">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
            {{-- Modal añadir mas Estudios y cursos --}}
            {{-- Experiencia --}}
            <div class="contenedor">
                <div class="user-input-experience">
                    <div class="user-icon-experience">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <div class="inputs-experience">
                        <input class="input-experience" type="text">
                        <span class="p-tiempo">Tiempo:</span>
                        <input class="input-years" type="number">
                    </div>
                </div>
                <div class="user-icon-more">
                    <button class="user-icon-more-button">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
            {{-- Modal añadir mas experiencia --}}
            {{-- Conocimientos --}}
            <div class="contenedor">
                <div class="user-input-conocimientos">
                    <div class="user-icon-conocimientos">
                        <i class="fa-solid fa-brain"></i>
                    </div>
                    <div class="inputs-conocimientos">
                        <input class="input-conocimientos" type="text">
                    </div>
                </div>
                <div class="user-icon-more">
                    <button class="user-icon-more-button">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
            {{-- Modal añadir mas conocimiento --}}
            {{-- Idiomas --}}
            <div class="contenedor">
                <div class="user-input-idioma">
                    <div class="user-icon-idioma">
                        <i class="fa-solid fa-language"></i>
                    </div>
                    <div class="inputs-idioma">
                        <input class="input-idioma" type="text">
                    </div>
                </div>
                <div class="user-icon-more">
                    <button class="user-icon-more-button">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
            {{-- Modal añadir mas idiomas --}}
            {{-- Descripcion --}}
            <div class="user-input-desc">
                <div class="user-icon-desc">
                    <span class="sobre-mi">Sobre mi</span>
                </div>
                <div class="inputs-desc">
                    <input class="input-desc" type="text">
                </div>
            </div>
        </div>
    </form>
        {{-- Eliminar cuenta --}}
        <div class="eliminar-cuenta-edit">
            <button class="eliminar-cuenta-btn">
                <p id="two" class="button"><i class="fa-solid fa-trash-can"></i> Eliminar cuenta</p>
            </button>
        </div>
    </div>

    {{-- Eliminar cuenta modalbox --}}
    <div id="modal-eliminar-user" class="modal-eliminar-user">
        <div class="modal-content">
            <span class="close-modal-eliminar-user">&times;</span>
            <h2 class="modal-title">¿Seguro que quieres eliminar el usuario?</h2>
            <div class="eliminar-user-butons">
                <button class="cancelar-eliminar">Cancelar</button>
                <button class="aceptar-eliminar">Eliminar</button>
            </div>
        </div>
    </div>
      

    <hr>
    {{------------------------------------------------- EDITAR EMPRESA --------------------------------------------}}
    <hr>

    <div class="empresa-edit">
    <form>
        {{-- Inputs para editar empresa --}}
        <div class="empresa-input">
            {{-- Nombre de la empresa --}}
            <div class="empresa-input-name">
                <div class="empresa-icon-name">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <div class="inputs-name">
                    <input class="input-name" type="text">
                </div>
            </div>
            {{-- Ubicacion --}}
            <div class="user-input-ubi">
                <div class="user-icon-ubi">
                    <i class="fa-solid fa-house-chimney"></i>
                </div>
                <div class="inputs-ubi">
                    <input class="input-ubi" type="text">
                </div>
            </div>
            {{-- Tipo --}}
            <div class="contenedor">
                <div class="user-input-tipo">
                    <div class="user-icon-tipo">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <div class="inputs-tipo">
                        <input class="input-tipo" type="text">
                    </div>
                </div>
                <div class="user-icon-more">
                    <button class="user-icon-more-button">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
            {{-- Descripcion --}}
            <div class="user-input-desc">
                <div class="user-icon-desc">
                    <span class="sobre-mi">Sobre mi</span>
                </div>
                <div class="inputs-desc">
                    <input class="input-desc" type="text">
                </div>
            </div>
        </div>
    </form>
        {{-- Eliminar empresa --}}
        <div class="eliminar-empresa-edit">
            <button class="eliminar-empresa-btn">
                <p><i class="fa-solid fa-trash-can"></i> Eliminar cuenta</p>
            </button>
        </div>
    </div>

    {{-- Eliminar cuenta empresa --}}
    <div id="modal-eliminar-empresa" class="modal-eliminar-empresa">
        <div class="modal-content">
            <span class="close-modal-eliminar-empresa">&times;</span>
            <h2 class="modal-title">¿Seguro que quieres eliminar la empresa?</h2>
            <div class="eliminar-empresa-butons">
                <button class="cancelar-eliminar">Cancelar</button>
                <button class="aceptar-eliminar">Eliminar</button>
            </div>
        </div>
    </div>

</body>

</html>