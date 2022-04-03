window.onload = function() {
    leerJS();

    //logica de modal

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];


    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        var modal = document.getElementById("myModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
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

function leerJS() {
    var tablaemp = document.getElementById("tablaemp");
    var tablatrab = document.getElementById("tablatrab");
    var tablaadmin = document.getElementById("tablaadmin");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('filtro', document.getElementById('filtro').value);
    formData.append('filcorreo', document.getElementById('filcorreo').value);
    formData.append('Empresa', document.getElementById("emp").checked);
    formData.append('Trabajador', document.getElementById("tbjd").checked);
    formData.append('Admin', document.getElementById("adm").checked);

    var ajax = objetoAjax();
    ajax.open("POST", "leer", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            console.log(respuesta);
            if (respuesta.hasOwnProperty('empresa')) {
                var empresa = respuesta.empresa;
                var recargaemp = '';
                recargaemp += '<h2>Empresas</h2>';
                recargaemp += '<table>';
                recargaemp += '<thead>';
                recargaemp += '<tr>';
                recargaemp += '<th>Correo</th>';
                recargaemp += '<th>Nombre</th>';
                recargaemp += '<th>Localizacion</th>';
                recargaemp += '<th>Sobre nosotros</th>';
                recargaemp += '<th>Sector</th>';
                recargaemp += '<th>Busqueda</th>';
                recargaemp += '<th>Logo</th>';
                recargaemp += '<th>Estado</th>';
                recargaemp += '</tr>';
                recargaemp += '</thead>';
                recargaemp += '<tbody>';
                for (let i = 0; i < empresa.length; i++) {
                    recargaemp += '<tr>';
                    recargaemp += '<td>' + empresa[i].mail + '</td>';
                    recargaemp += '<td>' + empresa[i].nom_emp + '</td>';
                    recargaemp += '<td>' + empresa[i].loc_emp + '</td>';
                    recargaemp += '<td>' + empresa[i].about_emp + '</td>';
                    recargaemp += '<td>' + empresa[i].campo_emp + '</td>';
                    recargaemp += '<td>' + empresa[i].searching + '</td>';
                    recargaemp += '<td>' + empresa[i].logo_emp + '</td>';
                    if (empresa[i].estado == 1) {
                        recargaemp += '<td><button onclick="estadouserJS(' + empresa[i].id + '); return false;">Banear</button></td>';
                    } else {
                        recargaemp += '<td><button onclick="estadouserJS(' + empresa[i].id + '); return false;">Reactivar</button></td>';
                    }
                    recargaemp += '</tr>';
                }
                recargaemp += '</tbody>';
                recargaemp += '</table>';
            }
            if (respuesta.hasOwnProperty('trabajador')) {
                var trabajador = respuesta.trabajador;
                var recargatrab = '';
                recargatrab += '<h2>Trabajadores</h2>';
                recargatrab += '<table>';
                recargatrab += '<thead>';
                recargatrab += '<tr>';
                recargatrab += '<th>Correo</th>';
                recargatrab += '<th>Nombre</th>';
                recargatrab += '<th>Apellido</th>';
                recargatrab += '<th>Sector</th>';
                recargatrab += '<th>Experiencia</th>';
                recargatrab += '<th>Estudios</th>';
                recargatrab += '<th>Idiomas</th>';
                recargatrab += '<th>Disponibilidad</th>';
                recargatrab += '<th>Sobre mi</th>';
                recargatrab += '<th>Foto</th>';
                recargatrab += '<th>Estado</th>';
                recargatrab += '</tr>';
                recargatrab += '</thead>';
                recargatrab += '<tbody>';
                for (let i = 0; i < trabajador.length; i++) {
                    recargatrab += '<tr>';
                    recargatrab += '<td>' + trabajador[i].mail + '</td>';
                    recargatrab += '<td>' + trabajador[i].nombre + '</td>';
                    recargatrab += '<td>' + trabajador[i].apellido + '</td>';
                    recargatrab += '<td>' + trabajador[i].campo_user + '</td>';
                    recargatrab += '<td>' + trabajador[i].experiencia + '</td>';
                    recargatrab += '<td>' + trabajador[i].estudios + '</td>';
                    recargatrab += '<td>' + trabajador[i].idiomas + '</td>';
                    recargatrab += '<td>' + trabajador[i].disponibilidad + '</td>';
                    recargatrab += '<td>' + trabajador[i].about_user + '</td>';
                    recargatrab += '<td>' + trabajador[i].foto_perfil + '</td>';
                    if (trabajador[i].estado == 1) {
                        recargatrab += '<td><button onclick="estadouserJS(' + trabajador[i].id + '); return false;">Banear</button></td>';
                    } else {
                        recargatrab += '<td><button onclick="estadouserJS(' + trabajador[i].id + '); return false;">Reactivar</button></td>';
                    }
                    recargatrab += '</tr>';
                }
                recargatrab += '</tbody>';
                recargatrab += '</table>';
            }
            if (respuesta.hasOwnProperty('admin')) {
                var admin = respuesta.admin;
                var recargaadmin = '';
                recargaadmin += '<h2>Administradores</h2>';
                recargaadmin += '<table>';
                recargaadmin += '<thead>';
                recargaadmin += '<tr>';
                recargaadmin += '<th>Correo</th>';
                recargaadmin += '<th>Estado</th>';
                recargaadmin += '</tr>';
                recargaadmin += '</thead>';
                recargaadmin += '<tbody>';
                for (let i = 0; i < admin.length; i++) {
                    recargaadmin += '<tr>';
                    recargaadmin += '<td>' + admin[i].mail + '</td>';
                    if (admin[i].estado == 1) {
                        recargaadmin += '<td><button onclick="estadouserJS(' + admin[i].id + '); return false;">Banear</button></td>';
                    } else {
                        recargaadmin += '<td><button onclick="estadouserJS(' + admin[i].id + '); return false;">Reactivar</button></td>';
                    }
                    recargaadmin += '</tr>';
                }
                recargaadmin += '</tbody>';
                recargaadmin += '</table>';
            }
            if (recargaemp == null) {
                tablaemp.innerHTML = "";
            } else {
                tablaemp.innerHTML = recargaemp;
            }
            if (recargatrab == null) {
                tablatrab.innerHTML = "";
            } else {
                tablatrab.innerHTML = recargatrab;
            }
            if (recargaadmin == null) {
                tablaadmin.innerHTML = "";
            } else {
                tablaadmin.innerHTML = recargaadmin;
            }
        }
    }
    ajax.send(formData);
}

function estadouserJS(id) {
    var token = document.getElementById('token').getAttribute("content");
    var formData = new FormData();
    formData.append('_token', token);
    formData.append('_method', 'PUT');

    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();
    ajax.open("POST", "estadouser/" + id, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            console.log(respuesta);
            leerJS();
        }
    }
    ajax.send(formData)
}

function crearadmin() {
    var token = document.getElementById('token').getAttribute("content");
    var sitioform = document.getElementById('sitioform');
    var formData = new FormData();
    formData.append('_token', token);

    var ajax = objetoAjax();
    ajax.open("POST", "perfiles", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            var recargaform = "";
            recargaform += '<form method="POST" onsubmit="opcioncrearJS(); return false;" id="formcrear">';
            recargaform += '<div class="form-group">';
            recargaform += '<label class="col-sm-2 col-form-label">Correo:</label>';
            recargaform += '<input type="email" class="form-control" id="mail" name="mail" placeholder="Introduce el correo">';
            recargaform += '</div>';
            recargaform += '<div class="form-group">';
            recargaform += '<label class="col-sm-2 col-form-label">Contraseña:</label>';
            recargaform += '<input type="text" class="form-control" id="contra" name="contra" placeholder="Introduce una contraseña">';
            recargaform += '</div>';
            recargaform += '<div class="form-group">';
            recargaform += '<label class="col-sm-2 col-form-label">Perfil:</label>';
            recargaform += '<select name="nom_perfil" id="nom_perfil" class="form-control">';
            for (let i = 0; i < respuesta.length; i++) {
                recargaform += '<option class="perf" value="' + respuesta[i].id + '">' + respuesta[i].nom_perfil + '</option>';
            }
            recargaform += '</select>';
            recargaform += '</div>';
            recargaform += '<button type="submit" class="btn btn-primary">Enviar</button>';
            recargaform += '</form>';
            sitioform.innerHTML = recargaform;
            document.getElementById('message').innerHTML = "";
        }
    }
    ajax.send(formData)
}

function opcioncrearJS() {
    var sitioform = document.getElementById('sitioform');
    var mail = document.getElementById('mail').value;
    var contra = document.getElementById('contra').value;
    var id_perfil = document.getElementById('nom_perfil').value;
    if (id_perfil == 1) {
        crearJS(mail, contra, id_perfil);
    }
    if (id_perfil == 2) {
        var recargaform = "";
        recargaform += '<form method="POST" onsubmit="crearJS(\'' + mail + '\',\'' + contra + '\',\'' + id_perfil + '\'); return false;" id="formcrear" enctype="multipart/form-data">';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Nombre:</label>';
        recargaform += '<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce el nombre">';
        recargaform += '</div>';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Apellido:</label>';
        recargaform += '<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Introduce un apellido">';
        recargaform += '</div>';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Sector:</label>';
        recargaform += '<input type="text" class="form-control" id="campo_user" name="campo_user" placeholder="Introduce un sector">';
        recargaform += '</div>';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Experiencia:</label>';
        recargaform += '<input type="text" class="form-control" id="experiencia" name="experiencia" placeholder="Introduce tu experiencia">';
        recargaform += '</div>';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Estudios:</label>';
        recargaform += '<input type="text" class="form-control" id="estudios" name="estudios" placeholder="Introduce tus estudios">';
        recargaform += '</div>';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Idiomas:</label>';
        recargaform += '<input type="text" class="form-control" id="idiomas" name="idiomas" placeholder="Introduce idiomas">';
        recargaform += '</div>';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Disponibilidad:</label>';
        recargaform += '<input type="text" class="form-control" id="disponibilidad" name="disponibilidad" placeholder="Introduce tu disponibilidad">';
        recargaform += '</div>';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Sobre ti:</label>';
        recargaform += '<input type="text" class="form-control" id="about_user" name="about_user" placeholder="Sobre ti">';
        recargaform += '</div>';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Foto:</label>';
        recargaform += '<input type="file" class="form-control" id="foto_perfil" name="foto_perfil">';
        recargaform += '</div>';
        recargaform += '<button type="submit" class="btn btn-primary">Enviar</button>';
        recargaform += '</form>';
        sitioform.innerHTML = recargaform;
    }
    if (id_perfil == 3) {
        var recargaform = "";
        recargaform += '<form method="POST" onsubmit="crearJS(\'' + mail + '\',\'' + contra + '\',\'' + id_perfil + '\'); return false;" id="formcrear" enctype="multipart/form-data">';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Nombre:</label>';
        recargaform += '<input type="text" class="form-control" id="nom_emp" name="nom_emp" placeholder="Introduce el nombre">';
        recargaform += '</div>';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Localizacion:</label>';
        recargaform += '<input type="text" class="form-control" id="loc_emp" name="loc_emp" placeholder="Introduce una localizacion">';
        recargaform += '</div>';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Sobre nosotros:</label>';
        recargaform += '<input type="text" class="form-control" id="about_emp" name="about_emp" placeholder="Introduce datos sobre la empresa">';
        recargaform += '</div>';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Sector:</label>';
        recargaform += '<input type="text" class="form-control" id="campo_emp" name="campo_emp" placeholder="Introduce un sector">';
        recargaform += '</div>';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Que buscas:</label>';
        recargaform += '<input type="text" class="form-control" id="searching" name="searching" placeholder="Introduce que necesitas">';
        recargaform += '</div>';
        recargaform += '<div class="form-group">';
        recargaform += '<label class="col-sm-2 col-form-label">Logo:</label>';
        recargaform += '<input type="file" class="form-control" id="logo_emp" name="logo_emp">';
        recargaform += '</div>';
        recargaform += '<button type="submit" class="btn btn-primary">Enviar</button>';
        recargaform += '</form>';
        sitioform.innerHTML = recargaform;
    }
}

function crearJS(mail, contra, id_perfil) {
    var message = document.getElementById('message');
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('_method', 'POST');
    formData.append('mail', mail);
    formData.append('contra', contra);
    formData.append('id_perfil', id_perfil);
    if (id_perfil == 2) {
        formData.append('nombre', document.getElementById('nombre').value);
        formData.append('apellido', document.getElementById('apellido').value);
        formData.append('campo_user', document.getElementById('campo_user').value);
        formData.append('experiencia', document.getElementById('experiencia').value);
        formData.append('estudios', document.getElementById('estudios').value);
        formData.append('idiomas', document.getElementById('idiomas').value);
        formData.append('disponibilidad', document.getElementById('disponibilidad').value);
        formData.append('about_user', document.getElementById('about_user').value);
        formData.append('foto_perfil', document.getElementById('foto_perfil').files[0]);
    }
    if (id_perfil == 3) {
        formData.append('nom_emp', document.getElementById('nom_emp').value);
        formData.append('loc_emp', document.getElementById('loc_emp').value);
        formData.append('about_emp', document.getElementById('about_emp').value);
        formData.append('campo_emp', document.getElementById('campo_emp').value);
        formData.append('searching', document.getElementById('searching').value);
        formData.append('logo_emp', document.getElementById('logo_emp').files[0]);
    }

    var ajax = objetoAjax();
    ajax.open("POST", "crear", true);
    ajax.onreadystatechange = function() {
        console.log(ajax.responseText);
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            if (respuesta.resultado == "OK") {
                message.innerHTML = '<p class="green">Nota creada correctamente</p>';
            } else {
                message.innerHTML = 'Ha habido un error: ' + respuesta.resultado;
            }
            leerJS();
            document.getElementById('sitioform').innerHTML = "";
        }
    }
    ajax.send(formData)
}