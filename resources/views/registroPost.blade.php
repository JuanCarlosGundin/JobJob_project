<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6d5e6cb8fd.js" crossorigin="anonymous"></script>
    <title>JobJob</title>
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
</head>
<body class="body-login">
    <div class="logo">
        <img src="storage/uploads/jobjob_logo.png">
    </div>
    <div class="modal-login">
        <div class="botones">
        <button class="btn-signin">Sign In</button>
        <button class="btn-register">Register</button>
        </div>
    <div class="modal-content-register">
        <div class="scrollbar">
        <h3>¡Regístrate en JobJob!</h3>
        <form action="{{url("registroPost")}}" method="POST">
        @csrf
        {{method_field('POST')}}
            <div class="column-2">
            <p>Email</p>    
            <input type="text" class="inputregister" id="mail" name="mail" placeholder="Introduce el email..." required><br><br>
            </div>
            <div class="column-2">
            <p>Contraseña</p>
            <input type="password" class="inputregister" id="contra" name="contra" placeholder="Introduce la contraseña..." required><br><br>
            </div>
            <div class="column-2">
            <p>Nombre</p>
            <input type="text" class="inputregister" id="nombre" name="nombre" placeholder="Introduce el nombre..." required><br><br>
            </div>
            <div class="column-2">
            <p>Apellido</p>
            <input type="text" class="inputregister" id="apellido" name="apellido" placeholder="Introduce el apellido..." required><br><br>
            </div>
            <div class="column-2">
            <p>Foto</p>
            <input type="file" class="foto" name="foto_perfil" id="foto_perfil" required><br><br>
            </div>
            <div class="column-2">
            <p>Sector</p>
            <input type="text" class="inputregister" id="campo_user" name="campo_user" placeholder="Introduce tu sector..." required><br><br>
            </div>
            <div class="column-2">
            <p>Experiencia</p>
            <input type="text" class="inputregister" id="experiencia" name="experiencia" placeholder="Introduce tu experiencia..." required><br><br>
            </div>
            <div class="column-2">
            <p>Estudios</p>
            <input type="text" class="inputregister" id="estudios" name="estudios" placeholder="Introduce tus estudios..." required><br><br>
            </div>
            <div class="column-2">
            <p>Idiomas</p>
            <input type="text" class="inputregister" id="idiomas" name="idiomas" placeholder="idiomas..." required><br><br>
            </div>
            <div class="column-2">
            <p>Disponibilidad</p>
            <input type="text" class="inputregister" id="disponibilidad" name="disponibilidad" placeholder="Introduce tu disponibilidad..." required><br><br>
            </div>
            <div class="column-2">
            <p>Quieres que se te muestre a las empresas?</p>
            <select name="mostrado" id="mostrado" required>
                <option value="0" selected>Sí</option>
                <option value="1">No</option>
              </select><br><br>
            </div>
            <div class="column-2">
            <p>Introduce más información sobre tí</p>
            <input type="text" class="inputregister" id="about_user" name="about_user" placeholder="Sobre mi..." required><br><br>
            <input id="id_perfil" name="id_perfil" type="hidden" value="2">
            </div>
            <input type="submit" class="botonregister" value="Registrarme">
        </form>
    </div>
    </div>
</div>
</body>