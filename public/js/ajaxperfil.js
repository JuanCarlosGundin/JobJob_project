window.onload = function() {
    leerperfilJS();
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

function leerperfilJS() {
    var zonaperfil = document.getElementById("zonaperfil");
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
                recarga += '<form method="POST" onsubmit="editarperfilJS(\'' + trabajador.id + '\',\'' + id_perfil + '\'); return false;" id="formeditar" enctype="multipart/form-data">';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Correo:</label>';
                recarga += '<input type="email" class="form-control" id="mail" name="mail" value="' + trabajador.mail + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Contraseña:</label>';
                recarga += '<input type="password" class="form-control" id="contra" name="contra" value="' + trabajador.contra + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Nombre:</label>';
                recarga += '<input type="text" class="form-control" id="nombre" name="nombre" value="' + trabajador.nombre + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Apellido:</label>';
                recarga += '<input type="text" class="form-control" id="apellido" name="apellido" value="' + trabajador.apellido + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Sector:</label>';
                recarga += '<input type="text" class="form-control" id="campo_user" name="campo_user" value="' + trabajador.campo_user + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Localizacion:</label>';
                recarga += '<input type="text" class="form-control" id="loc_trabajador" name="loc_trabajador" value="' + trabajador.loc_trabajador + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Experiencia:</label>';
                recarga += '<input type="text" class="form-control" id="experiencia" name="experiencia" value="' + trabajador.experiencia + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Edad:</label>';
                recarga += '<input type="text" class="form-control" id="edad" name="edad" value="' + trabajador.edad + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Estudios:</label>';
                recarga += '<input type="text" class="form-control" id="estudios" name="estudios" value="' + trabajador.estudios + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Idiomas:</label>';
                recarga += '<input type="text" class="form-control" id="idiomas" name="idiomas" value="' + trabajador.idiomas + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Disponibilidad:</label>';
                recarga += '<input type="text" class="form-control" id="disponibilidad" name="disponibilidad" value="' + trabajador.disponibilidad + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Sobre ti:</label>';
                recarga += '<input type="text" class="form-control" id="about_user" name="about_user" value="' + trabajador.about_user + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Mostrado:</label>';
                recarga += '<input type="number" class="form-control" id="mostrado" name="mostrado" value="' + trabajador.mostrado + '">';
                recarga += '</div>';
                recarga += '<div class="form-group">';
                recarga += '<label class="col-sm-2 col-form-label">Foto:</label>';
                recarga += '<input type="file" class="form-control" id="foto_perfil" name="foto_perfil">';
                recarga += '</div>';
                recarga += '<button type="submit" class="btn btn-primary">Modificar</button>';
                recarga += '</form>';
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
            }
            zonaperfil.innerHTML = recarga;
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
            leerperfilJS();
        }
    }
    ajax.send(formData);
}