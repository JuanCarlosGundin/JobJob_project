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

    {{------------------------------------------------- VER USUARIO --------------------------------------------}}
    
    <div class="user-vista">
        {{-- Foto --}}
        <div class="user-ver-foto">
            <img class="user-profilefoto" src="https://www.altheis.es/wp-content/uploads/2019/01/massada-men.jpg">
            <div class="user-edit-div">
                <button class="user-edit-btn"><i class="fa-solid fa-pen"></i></button>
            </div>
            <div class="logout">
                <button class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i></button>
            </div>
        </div>
        {{-- Inputs para editar el usuario --}}
        <div class="user-ver">
            {{-- Nombre, apellido y edad --}}
            <div class="user-div-name">
                <div class="divs-name">
                    <span class="p-name">Juan</span>
                    <span class="p-surname">Garcia,</span>
                    <span class="p-age"> 23</span>
                </div>
            </div>
            <hr>
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
            <hr>
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

    <div class="user-edit">
        <div class="return">
            <button class="return-btn">
                <i class="fa-solid fa-angle-left"></i>
            </button>
        </div>  
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
                {{-- Idioma --}}
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
                {{-- Correo --}}
                <div class="contenedor">
                    <div class="user-input-idioma">
                        <div class="user-icon-idioma">
                            <i class="fa-solid fa-at"></i>
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
                {{-- Password --}}
                <div class="contenedor">
                    <div class="user-input-idioma">
                        <div class="user-icon-idioma">
                            <i class="fa-solid fa-key"></i>
                        </div>
                        <div class="inputs-idioma">
                            <input class="input-idioma" type="password">
                        </div>
                    </div>
                    <div class="user-icon-more">
                        <button class="user-icon-more-button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                {{-- Foto --}}
                <div class="contenedor">
                    <div class="user-input-idioma">
                        <div class="user-icon-idioma">
                            <i class="fa-solid fa-image"></i>
                        </div>
                        <div class="inputs-idioma">
                            <input class="input-idioma" type="file">
                        </div>
                    </div>
                    <div class="user-icon-more">
                        <button class="user-icon-more-button">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
                {{-- Sector --}}
                <div class="contenedor">
                    <div class="user-input-idioma">
                        <div class="user-icon-idioma">
                            <i class="fa-solid fa-building"></i>
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
                {{-- Jornada --}}
                <div class="contenedor">
                    <div class="user-input-idioma">
                        <div class="user-icon-idioma">
                            <i class="fa-solid fa-business-time"></i>
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
                {{-- Descripcion --}}
                <div class="user-input-desc">
                    <div class="user-icon-desc">
                        <span class="sobre-mi">Sobre mi</span>
                    </div>
                    <div class="inputs-desc">
                        <input class="input-desc" type="text">
                    </div>
                </div>
                {{-- activar/desactivar --}}
                <div class="contenedor">
                    <div class="user-input-desactivar">
                        <div class="user-icon-desactivar">
                            <p>Desactivar/Activar cuenta: <p>
                        </div>
                        <div class="inputs-desactivar">
                            <input class="input-desactivar" type="checkbox">
                        </div>
                    </div>
                </div> 
            </div>
        </form>
        {{-- Realizar cambios --}}
        <div class="aceptar-cuenta-edit">
            <button class="aceptar-cuenta-btn">
                <p class="button"><i class="fa-solid fa-check"></i> Realizar cambios</p>
            </button>
        </div>
        {{-- Eliminar cuenta --}}
        <div class="eliminar-cuenta-edit">
            <button class="eliminar-cuenta-btn">
                <p class="button"><i class="fa-solid fa-trash-can"></i> Eliminar cuenta</p>
            </button>
        </div>
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
      
    {{------------------------------------------------- VER EMPRESA --------------------------------------------}}

    <div class="empresa-vista">
        {{-- Logo --}}
        <div class="empresa-ver-foto">
            <img class="empresa-profilefoto" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWQFl_RA0jVMP-_Bxb8xScQ7wyLRTWkoGq04dvJtR4mEc4Tn4xLJTrtGWtyUlCeoIDB8I&usqp=CAU">
            <div class="empresa-edit-div">
                <button class="empresa-edit-btn"><i class="fa-solid fa-pen"></i></button>
            </div>
            <div class="logout">
                <button class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i></button>
            </div>
        </div>
        {{-- Ver empresa --}}
        <div class="empresa-ver">
            {{-- Nombre --}}
            <div class="empresa-div-name">
                <div class="divs-name">
                    <span class="p-name">Samsung</span>
                </div>
            </div>
            {{-- Sede --}}
            <hr>
            <div class="empresa-div-house">
                <div class="empresa-icon-name">
                    <i class="fa-solid fa-building"></i>
                </div>
                <div class="divs-house">
                    <span class="p-house">Barcelona</span>
                </div>
            </div>
            {{-- Campo --}}
            <div class="empresa-div-house">
                <div class="empresa-icon-name">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <div class="divs-house">
                    <span class="p-house">Tecnologia</span>
                </div>
            </div>
            {{-- Que busca --}}
            <div class="empresa-div-house">
                <div class="empresa-icon-name">
                    <i class="fa-solid fa-file-signature"></i>
                </div>
                <div class="divs-house">
                    <span class="p-house">Buscamos informatico</span>
                </div>
            </div>
            {{-- Vacante --}}
            <div class="empresa-div-house">
                <div class="empresa-icon-name">
                    <i class="fa-solid fa-handshake"></i>
                </div>
                <div class="divs-house">
                    <span class="p-house">Vacante</span>
                </div>
            </div>
            <hr>
            {{-- Descripcion --}}
            <div class="empresa-div-desc">
                <div class="empresa-icon-desc">
                    <span class="sobre-mi-desc">Acerca de:</span>
                </div>
                <div class="divs-desc">
                    <span class="p-desc">Empresa dedicada a la tecnologia</span>
                </div>
            </div>
        </div> 
    </div>

    {{------------------------------------------------- EDITAR EMPRES --------------------------------------------}}

    <div class="empresa-edit">
        <div class="return">
            <button class="return-btn">
                <i class="fa-solid fa-angle-left"></i>
            </button>
        </div>    
        <form>
            {{-- Inputs para editar la empresa --}}
            <div class="empresa-input">
                {{-- Nombre --}}
                <div class="empresa-input-name">
                    <div class="empresa-icon-name">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <div class="inputs-name">
                        <input class="input-name" type="text">
                    </div>
                </div>
                {{-- Sede --}}
                <div class="empresa-input-sede">
                    <div class="empresa-icon-sede">
                        <i class="fa-solid fa-building"></i>
                    </div>
                    <div class="inputs-sede">
                        <input class="input-sede" type="text">
                    </div>
                </div>
                {{-- Campo --}}
                <div class="contenedor">
                    <div class="empresa-input-campo">
                        <div class="empresa-icon-campo">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div class="inputs-campo">
                            <input class="input-campo" type="text">
                        </div>
                    </div>
                </div>
                {{-- Buscamos --}}
                <div class="contenedor">
                    <div class="empresa-input-buscando">
                        <div class="empresa-icon-buscando">
                            <i class="fa-solid fa-file-signature"></i>
                        </div>
                        <div class="inputs-buscando">
                            <input class="input-buscando" type="text">
                        </div>
                    </div>
                </div>
                {{-- Vacante --}}
                <div class="contenedor">
                    <div class="empresa-input-vacante">
                        <div class="empresa-icon-vacante">
                            <i class="fa-solid fa-handshake"></i>
                        </div>
                        <div class="inputs-vacante">
                            <input class="input-vacante" type="text">
                        </div>
                    </div>
                </div>
                {{-- Descripcion --}}
                <div class="empresa-input-desc">
                    <div class="empresa-icon-desc">
                        <span class="sobre-mi">Información</span>
                    </div>
                    <div class="inputs-desc">
                        <input class="input-desc" type="text">
                    </div>
                </div>
                {{-- activar/desactivar --}}
                <div class="contenedor">
                    <div class="empresa-input-desactivar">
                        <div class="empresa-icon-desactivar">
                            <p>Desactivar/Activar cuenta: <p>
                        </div>
                        <div class="inputs-desactivar">
                            <input class="input-desactivar" type="checkbox">
                        </div>
                    </div>
                </div> 
            </div>
        </form>
        {{-- Realizar cambios --}}
        <div class="aceptar-empresa-edit">
            <button class="aceptar-empresa-btn">
                <p class="button"><i class="fa-solid fa-check"></i> Realizar cambios</p>
            </button>
        </div>
        {{-- Eliminar cuenta --}}
        <div class="eliminar-empresa-edit">
            <button class="eliminar-empresa-btn">
                <p class="button"><i class="fa-solid fa-trash-can"></i> Eliminar cuenta</p>
            </button>
        </div>
    </div>
    {{-- Eliminar cuenta modalbox --}}
    <div id="modal-eliminar-empresa" class="modal-eliminar-empresa">
        <div class="modal-content">
            <h2 class="modal-title">¿Seguro que quieres eliminar la cuenta?</h2>
            <div class="eliminar-empresa-butons">
                <button class="cancelar-eliminar">Cancelar</button>
                <button class="aceptar-eliminar">Eliminar</button>
            </div>
        </div>
    </div>

</body>

</html>