window.onload = function() {
    mostrarperfilJS();
}

function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function mostrarperfilJS() {
    var contenidoajax = document.getElementById("contenidoajax");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    var ajax = objetoAjax();
    ajax.open("POST", "leerperfil", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            var id_perfil = respuesta.id_perfil;
            console.log(respuesta);
            var recarga = '';
            if (id_perfil == 2) {
                var trabajador = respuesta.trabajador[0];
                /* Foto */
                recarga += '<div class="user-vista">';
                recarga += '<div class="user-ver-foto">';
                recarga += '<div class="container-foto">';
                if (trabajador.foto_perfil != null) {
                    recarga += '<img class="user-profilefoto" src="storage/' + trabajador.foto_perfil + '">';
                } else {
                    recarga += '<img class="user-profilefoto" src="storage/img/usuario.png">';
                }
                recarga += '<div class="user-edit-div">';
                /* boton que cambia la vista a editar */
                recarga += '<button class="user-edit-btn" onclick="leermodperfilJS(); return false;"><i class="fa-solid fa-pen"></i></button>';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '</div>';
                /* Inputs para editar el usuario */
                recarga += '<div class="user-ver">';
                /* Nombre, apellido y edad */
                recarga += '<div class="user-div-name">';
                recarga += '<div class="user-icon-name">';
                recarga += '<i class="fa-solid fa-user"></i>';
                recarga += '</div>';
                recarga += '<div class="divs-name">';
                recarga += '<span class="p-name">' + trabajador.nombre + '</span>';
                recarga += '<span class="p-surname">' + trabajador.apellido + '</span>';
                recarga += '<i class="fa-solid fa-cake-candles"></i>';
                recarga += '<span class="p-age"> ' + trabajador.edad + '</span>';
                recarga += '</div>';
                recarga += '</div>';
                /* Correo */
                recarga += '<div class="user-div-house">';
                recarga += '<div class="user-icon-name">';
                recarga += '<i class="fa-solid fa-at"></i>';
                recarga += '</div>';
                recarga += '<div class="divs-house">';
                recarga += '<span class="p-house">' + trabajador.mail + '</span>';
                recarga += '</div>';
                recarga += '</div>';
                /* Vivienda */
                recarga += '<div class="user-div-house">';
                recarga += '<div class="user-icon-name">';
                recarga += '<i class="fa-solid fa-house-chimney"></i>';
                recarga += '</div>';
                recarga += '<div class="divs-house">';
                recarga += '<span class="p-house">' + trabajador.loc_trabajador + '</span>';
                recarga += '</div>';
                recarga += '</div>';
                /* Estudios y cursos */
                recarga += '<div class="user-div-house">';
                recarga += '<div class="user-icon-name">';
                recarga += '<i class="fa-solid fa-book-open"></i>';
                recarga += '</div>';
                recarga += '<div class="divs-house">';
                recarga += '<span class="p-house">' + trabajador.estudios + '</span>';
                recarga += '</div>';
                recarga += '</div>';
                /* Experiencia */
                recarga += '<div class="user-div-house">';
                recarga += '<div class="user-icon-name">';
                recarga += '<i class="fa-solid fa-briefcase"></i>';
                recarga += '</div>';
                recarga += '<div class="divs-house">';
                recarga += '<span class="p-house">' + trabajador.experiencia + '</span>';
                recarga += '</div>';
                recarga += '</div>';
                /* Conocimientos */
                /* Aqui voy a poner si el usuario se muestra en principal o no */
                recarga += '<div class="user-div-house">';
                recarga += '<div class="user-icon-name">';
                recarga += '<i class="fa-solid fa-brain"></i>';
                recarga += '</div>';
                recarga += '<div class="divs-house">';
                recarga += '<span class="p-house">' + trabajador.mostrado + '</span>';
                recarga += '</div>';
                recarga += '</div>';
                /* Idioma */
                recarga += '<div class="user-div-house">';
                recarga += '<div class="user-icon-name">';
                recarga += '<i class="fa-solid fa-language"></i>';
                recarga += '</div>';
                recarga += '<div class="divs-house">';
                recarga += '<span class="p-house">' + trabajador.idiomas + '</span>';
                recarga += '</div>';
                recarga += '</div>';
                /* Sector */
                recarga += '<div class="user-div-house">';
                recarga += '<div class="user-icon-name">';
                recarga += '<i class="fa-solid fa-building"></i>';
                recarga += '</div>';
                recarga += '<div class="divs-house">';
                recarga += '<span class="p-house">' + trabajador.campo_user + '</span>';
                recarga += '</div>';
                recarga += '</div>';
                /* Jornada */
                recarga += '<div class="user-div-house">';
                recarga += '<div class="user-icon-name">';
                recarga += '<i class="fa-solid fa-business-time"></i>';
                recarga += '</div>';
                recarga += '<div class="divs-house">';
                recarga += '<span class="p-house">' + trabajador.disponibilidad + '</span>';
                recarga += '</div>';
                recarga += '</div>';
                /* Descripcion */
                recarga += '<div class="user-div-desc">';
                recarga += '<div class="user-icon-desc">';
                recarga += '<span class="sobre-mi-desc">Sobre mi:</span>';
                recarga += '</div>';
                recarga += '<div class="divs-desc">';
                recarga += '<span class="p-desc">' + trabajador.about_user + '</span>';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '</div>';
            }
            contenidoajax.innerHTML = recarga;
        }
    }

    ajax.send(formData);
}

function leermodperfilJS() {
    var contenidoajax = document.getElementById("contenidoajax");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    var ajax = objetoAjax();
    ajax.open("POST", "leerperfil", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            var id_perfil = respuesta.id_perfil;
            console.log(respuesta);
            var recarga = '';
            if (id_perfil == 2) {
                var trabajador = respuesta.trabajador[0];
                recarga += '<div class="user-edit">';
                recarga += '<form method="POST" id="formeditar" enctype="multipart/form-data">';
                /* Inputs para editar el usuario */
                recarga += '<div class="user-input">';
                /* Nombre, apellido y edad */
                recarga += '<div class="user-input-name">';
                recarga += '<div class="user-icon-name">';
                recarga += '<i class="fa-solid fa-user"></i>';
                recarga += '</div>';
                recarga += '<div class="inputs-name">';
                recarga += '<input type="text" class="input-name" id="nombre" name="nombre" value="' + trabajador.nombre + '">';
                recarga += '<input type="text" class="input-surname" id="apellido" name="apellido" value="' + trabajador.apellido + '">';
                recarga += '<i class="fa-solid fa-cake-candles"></i>';
                recarga += '<input type="text" class="input-age" id="edad" name="edad" value="' + trabajador.edad + '">';
                recarga += '</div>';
                recarga += '</div>';
                /* Vivienda */
                recarga += '<div class="user-input-house">';
                recarga += '<div class="user-icon-house">';
                recarga += '<i class="fa-solid fa-house-chimney"></i>';
                recarga += '</div>';
                recarga += '<div class="inputs-house">';
                recarga += '<input type="text" class="input-house" id="loc_trabajador" name="loc_trabajador" value="' + trabajador.loc_trabajador + '">';
                recarga += '</div>';
                recarga += '</div>';
                /* Estudios y cursos */
                recarga += '<div class="contenedor">';
                recarga += '<div class="user-input-studies">';
                recarga += '<div class="user-icon-studies">';
                recarga += '<i class="fa-solid fa-book-open"></i>';
                recarga += '</div>';
                recarga += '<div class="inputs-studies">';
                recarga += '<input type="text" class="input-studies" id="estudios" name="estudios" value="' + trabajador.estudios + '">';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '<div class="user-icon-more">';
                recarga += '<button class="user-icon-more-button">';
                recarga += '<i class="fa-solid fa-plus"></i>';
                recarga += '</button>';
                recarga += '</div>';
                recarga += '</div>';
                /* Modal añadir mas Estudios y cursos */
                /* Experiencia */
                recarga += '<div class="contenedor">';
                recarga += '<div class="user-input-experience">';
                recarga += '<div class="user-icon-experience">';
                recarga += '<i class="fa-solid fa-briefcase"></i>';
                recarga += '</div>';
                recarga += '<div class="inputs-experience">';
                recarga += '<input type="text" class="input-experience" id="experiencia" name="experiencia" value="' + trabajador.experiencia + '">';
                recarga += '<span class="p-tiempo">Tiempo:</span>';
                recarga += '<input class="input-years" type="number">';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '<div class="user-icon-more">';
                recarga += '<button class="user-icon-more-button">';
                recarga += '<i class="fa-solid fa-plus"></i>';
                recarga += '</button>';
                recarga += '</div>';
                recarga += '</div>';
                /* Modal añadir mas experiencia */
                /* Conocimientos */
                /* Aqui pongo temporalmente si la persona quiere ser mostrada en la pagina principal */
                recarga += '<div class="contenedor">';
                recarga += '<div class="user-input-conocimientos">';
                recarga += '<div class="user-icon-conocimientos">';
                recarga += '<i class="fa-solid fa-brain"></i>';
                recarga += '</div>';
                recarga += '<div class="inputs-conocimientos">';
                recarga += '<input type="number" class="input-conocimientos" id="mostrado" name="mostrado" value="' + trabajador.mostrado + '">';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '<div class="user-icon-more">';
                recarga += '<button class="user-icon-more-button">';
                recarga += '<i class="fa-solid fa-plus"></i>';
                recarga += '</button>';
                recarga += '</div>';
                recarga += '</div>';
                /* Aqui pongo temporalmente si la persona quiere ser mostrada en la pagina principal */
                /* Idioma */
                recarga += '<div class="contenedor">';
                recarga += '<div class="user-input-idioma">';
                recarga += '<div class="user-icon-idioma">';
                recarga += '<i class="fa-solid fa-language"></i>';
                recarga += '</div>';
                recarga += '<div class="inputs-idioma">';
                recarga += '<input type="text" class="input-idioma" id="idiomas" name="idiomas" value="' + trabajador.idiomas + '">';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '<div class="user-icon-more">';
                recarga += '<button class="user-icon-more-button">';
                recarga += '<i class="fa-solid fa-plus"></i>';
                recarga += '</button>';
                recarga += '</div>';
                recarga += '</div>';
                /* Correo */
                recarga += '<div class="contenedor">';
                recarga += '<div class="user-input-idioma">';
                recarga += '<div class="user-icon-idioma">';
                recarga += '<i class="fa-solid fa-at"></i>';
                recarga += '</div>';
                recarga += '<div class="inputs-idioma">';
                recarga += '<input type="email" class="input-idioma" id="mail" name="mail" value="' + trabajador.mail + '">';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '<div class="user-icon-more">';
                recarga += '<button class="user-icon-more-button">';
                recarga += '<i class="fa-solid fa-plus"></i>';
                recarga += '</button>';
                recarga += '</div>';
                recarga += '</div>';
                /* Password */
                recarga += '<div class="contenedor">';
                recarga += '<div class="user-input-idioma">';
                recarga += '<div class="user-icon-idioma">';
                recarga += '<i class="fa-solid fa-key"></i>';
                recarga += '</div>';
                recarga += '<div class="inputs-idioma">';
                recarga += '<input type="password" class="input-idioma" id="contra" name="contra" value="' + trabajador.contra + '">';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '<div class="user-icon-more">';
                recarga += '<button class="user-icon-more-button">';
                recarga += '<i class="fa-solid fa-plus"></i>';
                recarga += '</button>';
                recarga += '</div>';
                recarga += '</div>';
                /* Foto */
                recarga += '<div class="contenedor">';
                recarga += '<div class="user-input-idioma">';
                recarga += '<div class="user-icon-idioma">';
                recarga += '<i class="fa-solid fa-image"></i>';
                recarga += '</div>';
                recarga += '<div class="inputs-idioma">';
                recarga += '<input type="file" class="input-idioma" id="foto_perfil" name="foto_perfil">';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '<div class="user-icon-more">';
                recarga += '<button class="user-icon-more-button">';
                recarga += '<i class="fa-solid fa-plus"></i>';
                recarga += '</button>';
                recarga += '</div>';
                recarga += '</div>';
                /* Sector */
                recarga += '<div class="contenedor">';
                recarga += '<div class="user-input-idioma">';
                recarga += '<div class="user-icon-idioma">';
                recarga += '<i class="fa-solid fa-building"></i>';
                recarga += '</div>';
                recarga += '<div class="inputs-idioma">';
                recarga += '<input type="text" class="input-idioma" id="campo_user" name="campo_user" value="' + trabajador.campo_user + '">';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '<div class="user-icon-more">';
                recarga += '<button class="user-icon-more-button">';
                recarga += '<i class="fa-solid fa-plus"></i>';
                recarga += '</button>';
                recarga += '</div>';
                recarga += '</div>';
                /* Jornada */
                recarga += '<div class="contenedor">';
                recarga += '<div class="user-input-idioma">';
                recarga += '<div class="user-icon-idioma">';
                recarga += '<i class="fa-solid fa-business-time"></i>';
                recarga += '</div>';
                recarga += '<div class="inputs-idioma">';
                recarga += '<input type="text" class="input-idioma" id="disponibilidad" name="disponibilidad" value="' + trabajador.disponibilidad + '">';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '<div class="user-icon-more">';
                recarga += '<button class="user-icon-more-button">';
                recarga += '<i class="fa-solid fa-plus"></i>';
                recarga += '</button>';
                recarga += '</div>';
                recarga += '</div>';
                /* Descripcion */
                recarga += '<div class="user-input-desc">';
                recarga += '<div class="user-icon-desc">';
                recarga += '<span class="sobre-mi">Sobre mi</span>';
                recarga += '</div>';
                recarga += '<div class="inputs-desc">';
                recarga += '<input type="text" class="input-desc" id="about_user" name="about_user" value="' + trabajador.about_user + '">';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '</form>';
                /* Realizar cambios */
                recarga += '<div class="aceptar-cuenta-edit">';
                recarga += '<button class="aceptar-cuenta-btn" onclick="editarperfilJS(\'' + trabajador.id + '\',\'' + id_perfil + '\'); return false;">';
                recarga += '<p class="button"><i class="fa-solid fa-check"></i> Realizar cambios</p>';
                recarga += '</button>';
                recarga += '</div>';
                /* Volver a la vista anterior */
                recarga += '<div class="aceptar-cuenta-edit">';
                recarga += '<button class="aceptar-cuenta-btn" onclick="mostrarperfilJS(); return false;">';
                recarga += '<p class="button"><i class="fa-solid fa-check"></i> Volver</p>';
                recarga += '</button>';
                recarga += '</div>';
                /* Eliminar cuenta */
                recarga += '<div class="eliminar-cuenta-edit">';
                recarga += '<button class="eliminar-cuenta-btn">';
                recarga += '<p class="button"><i class="fa-solid fa-trash-can"></i> Eliminar cuenta</p>';
                recarga += '</button>';
                recarga += '</div>';
            }
            if (id_perfil == 3) {
                var empresa = respuesta.empresa[0];
                recarga += '<form method="POST" onsubmit="editarperfilJS(\'' + empresa.id + '\',\'' + id_perfil + '\'); return false;" id="formeditar" enctype="multipart/form-data">';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Correo:</label>';
                recarga += '<input type="email" class="form-control" id="mail" name="mail" value="' + empresa.mail + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Contraseña:</label>';
                recarga += '<input type="password" class="form-control" id="contra" name="contra" value="' + empresa.contra + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Nombre:</label>';
                recarga += '<input type="text" class="form-control" id="nom_emp" name="nom_emp" value="' + empresa.nom_emp + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Localizacion:</label>';
                recarga += '<input type="text" class="form-control" id="loc_emp" name="loc_emp" value="' + empresa.loc_emp + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Sobre nosotros:</label>';
                recarga += '<input type="text" class="form-control" id="about_emp" name="about_emp" value="' + empresa.about_emp + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Sector:</label>';
                recarga += '<input type="text" class="form-control" id="campo_emp" name="campo_emp" value="' + empresa.campo_emp + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Que buscas:</label>';
                recarga += '<input type="text" class="form-control" id="searching" name="searching" value="' + empresa.searching + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Vacante:</label>';
                recarga += '<input type="text" class="form-control" id="vacante" name="vacante" value="' + empresa.vacante + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Mostrado:</label>';
                recarga += '<input type="number" class="form-control" id="mostrado" name="mostrado" value="' + empresa.mostrado + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Logo:</label>';
                recarga += '<input type="file" class="form-control" id="logo_emp" name="logo_emp">';
                recarga += '</div>';
                recarga += '<button type="submit" class="btn btn-primary">Modificar</button>';
                recarga += '</form>';
                recarga += '</div>';
            }
            contenidoajax.innerHTML = recarga;
        }
    }

    ajax.send(formData);
}


//EDITAR
function editarperfilJS(id, id_perfil) {
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('_method', 'PUT');
    formData.append('mail', document.getElementById('mail').value);
    formData.append('contra', document.getElementById('contra').value);
    /* modificar trabajador */
    if (id_perfil == 2) {
        formData.append('nombre', document.getElementById('nombre').value);
        formData.append('apellido', document.getElementById('apellido').value);
        formData.append('campo_user', document.getElementById('campo_user').value);
        formData.append('loc_trabajador', document.getElementById('loc_trabajador').value);
        formData.append('experiencia', document.getElementById('experiencia').value);
        formData.append('edad', document.getElementById('edad').value);
        formData.append('estudios', document.getElementById('estudios').value);
        formData.append('idiomas', document.getElementById('idiomas').value);
        formData.append('disponibilidad', document.getElementById('disponibilidad').value);
        formData.append('about_user', document.getElementById('about_user').value);
        formData.append('foto_perfil', document.getElementById('foto_perfil').files[0]);
        formData.append('mostrado', document.getElementById('mostrado').value);
    }
    /* modificar empresa */
    if (id_perfil == 3) {
        formData.append('nom_emp', document.getElementById('nom_emp').value);
        formData.append('loc_emp', document.getElementById('loc_emp').value);
        formData.append('about_emp', document.getElementById('about_emp').value);
        formData.append('campo_emp', document.getElementById('campo_emp').value);
        formData.append('searching', document.getElementById('searching').value);
        formData.append('vacante', document.getElementById('vacante').value);
        formData.append('logo_emp', document.getElementById('logo_emp').files[0]);
        formData.append('mostrado', document.getElementById('mostrado').value);
    }
    var ajax = objetoAjax();
    ajax.open("POST", "editarperfil/" + id + "/" + id_perfil, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            leermodperfilJS();
        }
    }
    ajax.send(formData);
}