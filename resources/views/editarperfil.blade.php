@if (!Session::get('nombre_trabajador'))
    <?php
        //Si la session no esta definida te redirige al login.
        return redirect()->to('/')->send();
    ?>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PERFIL</title>
    <script src="js/ajaxperfil.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>
<body>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        
        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        
        /* Modal Content */
        .modal-content {
          background-color: #fefefe;
          margin: auto;
          padding: 20px;
          border: 1px solid #888;
          width: 80%;
        }
        
        /* The Close Button */
        .close {
          color: #aaaaaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
        }
        </style>
        <div>
          <form action="{{url('logout')}}" method="GET">
              <div class="form-group">
                  <span><i class="fas fa-sign-out-alt"></i></span>
                  <button type="submit" value="logout" class="botoncPanel">LOGOUT</button><br><br>
              </div>
          </form>
      </div>
        <h2>Mi perfil</h2>

        <!-- Trigger/Open The Modal -->
        
        <!-- The Modal -->
        <div id="myModal" class="modal">
        
          <!-- Modal content -->
          <div class="modal-content">
            <span class="close">&times;</span>
              <form action="" id="formulario" onsubmit="editartrabajadorJS(); return false">
                {{-- Inputs para editar el usuario --}}
                <div class="user-input">
                    {{-- Nombre, apellido y edad --}}
                    <div class="user-input-name">
                        <div class="user-icon-name">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="inputs-name">
                            <input class="input-name" type="text" name="modnombre" id="modnombre">
                            <input class="input-surname" type="text" name="modapellido" id="modapellido">
                            <i class="fa-solid fa-cake-candles"></i>
                            {{-- <input class="input-age" type="number" name="modedad" id="modedad"> --}}
                        </div>
                    </div>
                    {{-- Vivienda --}}
                    {{-- <div class="user-input-house">
                        <div class="user-icon-house">
                            <i class="fa-solid fa-house-chimney"></i>
                        </div>
                        <div class="inputs-house">
                            <input class="input-house" type="text">
                        </div>
                    </div> --}}
                    {{-- Estudios y cursos --}}
                    <div class="contenedor">
                        <div class="user-input-studies">
                            <div class="user-icon-studies">
                                <i class="fa-solid fa-book-open"></i>
                            </div>
                            <div class="inputs-studies">
                                <input class="input-studies" type="text" name="modestudios" id="modestudios">
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
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <input class="input-experience" type="text" name="modexperiencia" id="modexperiencia">
                            {{-- <p class="p-tiempo">Tiempo:</p>
                            <input class="input-years" type="text" > --}}
                        </div>
                        <div class="user-icon-more">
                            <button class="user-icon-more-button">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    {{-- Modal añadir mas experiencia --}}
                    {{-- campo user --}}
                    <div class="contenedor">
                        <div class="user-input-conocimientos">
                            <div class="user-icon-conocimientos">
                                <i class="fa-solid fa-brain"></i>
                            </div>
                            <div class="inputs-conocimientos">
                                <input class="input-conocimientos" type="text" name="modcampo_user" id="modcampo_user">
                            </div>
                        </div>
                        <div class="user-icon-more">
                            <button class="user-icon-more-button">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    {{-- Modal añadir mas campo user --}}
                    {{-- Idiomas --}}
                    <div class="contenedor">
                        <div class="user-input-idioma">
                            <div class="user-icon-idioma">
                                <i class="fa-solid fa-language"></i>
                            </div>
                            <div class="inputs-idioma">
                                <input class="input-idioma" type="text" name="modidiomas" id="modidiomas">
                            </div>
                        </div>
                        <div class="user-icon-more">
                            <button class="user-icon-more-button">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    {{-- Modal añadir mas idiomas --}}
                    {{-- disponibilidad --}}
                    <div class="contenedor">
                      <div class="user-input-idioma">
                          <div class="user-icon-idioma">
                              <i class="fa-solid fa-language"></i>
                          </div>
                          <div class="inputs-idioma">
                              <input class="input-idioma" type="text" name="moddisponibilidad" id="moddisponibilidad">
                          </div>
                      </div>
                      <div class="user-icon-more">
                          <button class="user-icon-more-button">
                              <i class="fa-solid fa-plus"></i>
                          </button>
                      </div>
                  </div>
                  {{-- Modal añadir mas disponibilidad --}}
                    {{-- Descripcion --}}
                    <div class="user-input-desc">
                        <div class="user-icon-desc">
                            <p>Sobre mi</p>
                        </div>
                        <input class="input-desc" type="text" name="modabout_user" id="modabout_user">
                    </div>
                </div>
                <input type="submit" value="modificar">
                <input type="hidden" name="id" id="modid" value="">
            </form>
          
            {{-- <form action="" id="formulario" onsubmit="editartrabajadorJS(); return false">
                <input type="text" name="modnombre" id="modnombre">
                <input type="text" name="moddescripcion" id="moddescripcion">
                <input type="text" name="moddireccion" id="moddireccion">
                <input type="file" name="modfoto" id="modfoto">
                <input type="hidden" name="id" id="idModificar" value="">
                <input type="submit" value="modificar">
            </form> --}}
          </div>
        
        </div>
    <hr>
    <table id="main">
    </table>
    <hr>
    
    <p id="mensaje"></p>
    
</body>
</html>