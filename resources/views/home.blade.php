<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://kit.fontawesome.com/15d3106c42.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js" integrity="sha512-UXumZrZNiOwnTcZSHLOfcTs0aos2MzBWHXOHOuB0J/R44QB0dwY5JgfbvljXcklVf65Gc4El6RjZ+lnwd2az2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.js" integrity="sha512-qRj8N7fxOHxPkKjnQ9EJgLJ8Ng1OK7seBn1uk8wkqaXpa7OA13LO6txQ7+ajZonyc9Ts4K/ugXljevkFTUGBcw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <title>Home</title>
</head>
<body class="page-home">
    <div class="region-navbar"></div>
    <div class="region-content row">
        {{-- EMPIEZA TINDER --}}
        <div class="swiper">
            <div class="swiper--status">
              <i class="fa fa-remove"></i>
              <i class="fa fa-briefcase"></i>
            </div>
            <div class="swiper--cards">
              {{-- <div class="swiper--card" id="mainCard">
                <img src="https://www.enter.co/wp-content/uploads/2012/08/logoms_660.jpg">
                <div class="content--card content--empresa">
                  <input type="hidden" id="userID" value="2">
                  <div class="misc--card">
                    <h2 class="vacante--empresa">Programador web (Back-End)</h2>
                    <h5 class="campo--empresa">Informática</h5>
                  </div>
                  <div class="cuerpo--card">
                    <p class="searching--empresa">Buscamos a un programador/a web con 2 años de experiencia en el sector, preparado para llevar proyectos y en un futuro tener a gente a su cargo.</p>
                  </div>
                  <div class="titulo--card">
                    <h3 class="nombre--usuario">Microsoft</h3>
                    <h5 class="ubicacion--usuario">Barcelona</h5>
                  </div>
                </div>
              </div> --}}
              <div class="swiper--card" id="mainCard">
                <div class="content--card content--trabajador">
                  <input type="hidden" id="userID" value="2">
                  <div class="cv--card">
                    <div class="objetivo--card">
                      <h2 class="titulo--objetivo">Objetivo Profesional</h2>
                      <p class="content--objetivo">Mi principal objetivo es formar parte de un equipo profesional, en el que los logros y éxitos de cada uno sean reconocidos en un ambiente de trabajo óptimo y agradable.</p>
                    </div>
                    <div class="formacion--card">
                      <h2 class="titulo--formacion">Formación</h2>
                      <p class="content--formacion">Grado en ingeniería informática - UPC - 2017 -> 2022</p>
                    </div>
                    <div class="experiencia--card">
                      <h2 class="titulo--experiencia">Experiencia</h2>
                      <p class="content--experiencia">Programador Junior Back-End - Amazon - 2021 -> 2022</p>
                    </div>
                  </div>
                  <div class="titulo--card">
                    <h2 class="nombreEdad--usuario">Juan Pérez, 23</h2>
                    <h5 class="ubicacion--usuario">Barcelona</h5>
                  </div>
                </div>
              </div>
              <div class="swiper--card">
                <img src="img/jobjob_tarjeta.png">
              </div>
              <div class="swiper--card">
                <img src="img/jobjob_tarjeta.png">
              </div>
              <div class="swiper--card">
                <img src="img/jobjob_tarjeta.png">
              </div>
              <div class="swiper--card">
                <img src="img/jobjob_tarjeta.png">
              </div>
            </div>
          
        </div>
          {{-- ACABA TINDER --}}
        <div class="botones-home row swiper--buttons">
            <div class="boton-cruz">
                <button class="icono-cruz" id="nope"><i class="fa-solid fa-remove"></i></button>
            </div>
            <div class="boton-info">
                <button class="icono-info" id="info"><i class="fa-solid fa-info"></i></button>
            </div>
            <div class="boton-maletin">
                <button class="icono-maletin" id="love"><i class="fa-solid fa-briefcase"></i></button>
            </div>
        </div>
    </div>
    <script src="js/swiper.js"></script>
    {{-- <script src="js/principal.js"></script> --}}
</body>
</html>