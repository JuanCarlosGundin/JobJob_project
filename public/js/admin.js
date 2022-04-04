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
            if (respuesta.hasOwnProperty('admin')) {
                var admin = respuesta.admin;
                var recargaadmin = '';
                recargaadmin += '<h2>Administradores</h2>';
                recargaadmin += '<table class="table table-striped table-hover">';
                recargaadmin += '<thead>';
                recargaadmin += '<tr>';
                recargaadmin += '<th scope="col">Correo</th>';
                recargaadmin += '<th scope="col">Estado</th>';
                recargaadmin += '</tr>';
                recargaadmin += '</thead>';
                recargaadmin += '<tbody>';
                for (let i = 0; i < admin.length; i++) {
                    recargaadmin += '<tr>';
                    recargaadmin += '<td>' + admin[i].mail + '</td>';
                    if (admin[i].estado == 1) {
                        recargaadmin += '<td><button type="button" class="btn btn-warning" onclick="estadouserJS(' + admin[i].id + '); return false;">Banear</button></td>';
                    } else {
                        recargaadmin += '<td><button type="button" class="btn btn-warning" onclick="estadouserJS(' + admin[i].id + '); return false;">Reactivar</button></td>';
                    }
                    recargaadmin += '<td><button type="button" class="btn btn-info" onclick="actualizarmodal(\'' + admin[i].id + '\',\'' + admin[i].id_perfil + '\'); return false;">Modificar</button></td>';
                    recargaadmin += '<td><button type="button" class="btn btn-danger" onclick="eliminarJS(\'' + admin[i].id + '\',\'' + admin[i].id_perfil + '\'); return false;">Eliminar</button></td>';
                    recargaadmin += '</tr>';
                }
                recargaadmin += '</tbody>';
                recargaadmin += '</table>';
            }
            if (respuesta.hasOwnProperty('trabajador')) {
                var trabajador = respuesta.trabajador;
                var recargatrab = '';
                recargatrab += '<h2>Trabajadores</h2>';
                recargatrab += '<table class="table table-striped table-hover">';
                recargatrab += '<thead>';
                recargatrab += '<tr>';
                recargatrab += '<th scope="col">Correo</th>';
                recargatrab += '<th scope="col">Nombre</th>';
                recargatrab += '<th scope="col">Apellido</th>';
                recargatrab += '<th scope="col">Sector</th>';
                recargatrab += '<th scope="col">Experiencia</th>';
                recargatrab += '<th scope="col">Estudios</th>';
                recargatrab += '<th scope="col">Idiomas</th>';
                recargatrab += '<th scope="col">Disponibilidad</th>';
                recargatrab += '<th scope="col">Sobre mi</th>';
                recargatrab += '<th scope="col">Foto</th>';
                recargatrab += '<th scope="col">Estado</th>';
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
                    if (trabajador[i].foto_perfil != null) {
                        recargatrab += '<td style="word-break: break-all"><img class="imagen" src="storage/' + trabajador[i].foto_perfil + '"></td>';
                    } else {
                        recargatrab += '<td style="word-break: break-all">' + trabajador[i].foto_perfil + '</td>';
                    }
                    if (trabajador[i].estado == 1) {
                        recargatrab += '<td><button type="button" class="btn btn-warning" onclick="estadouserJS(' + trabajador[i].id + '); return false;">Banear</button></td>';
                    } else {
                        recargatrab += '<td><button type="button" class="btn btn-warning" onclick="estadouserJS(' + trabajador[i].id + '); return false;">Reactivar</button></td>';
                    }
                    recargatrab += '<td><button type="button" class="btn btn-info" onclick="actualizarmodal(\'' + trabajador[i].id + '\',\'' + trabajador[i].id_perfil + '\'); return false;">Modificar</button></td>';
                    recargatrab += '<td><button type="button" class="btn btn-danger" onclick="eliminarJS(\'' + trabajador[i].id + '\',\'' + trabajador[i].id_perfil + '\'); return false;">Eliminar</button></td>';
                    recargatrab += '</tr>';
                }
                recargatrab += '</tbody>';
                recargatrab += '</table>';
            }
            if (respuesta.hasOwnProperty('empresa')) {
                var empresa = respuesta.empresa;
                var recargaemp = '';
                recargaemp += '<h2>Empresas</h2>';
                recargaemp += '<table class="table table-striped table-hover">';
                recargaemp += '<thead>';
                recargaemp += '<tr>';
                recargaemp += '<th scope="col">Correo</th>';
                recargaemp += '<th scope="col">Nombre</th>';
                recargaemp += '<th scope="col">Localizacion</th>';
                recargaemp += '<th scope="col">Sobre nosotros</th>';
                recargaemp += '<th scope="col">Sector</th>';
                recargaemp += '<th scope="col">Busqueda</th>';
                recargaemp += '<th scope="col">Logo</th>';
                recargaemp += '<th scope="col">Estado</th>';
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
                    if (empresa[i].logo_emp != null) {
                        recargaemp += '<td style="word-break: break-all"><img class="imagen" src="storage/' + empresa[i].logo_emp + '"></td>';
                    } else {
                        recargaemp += '<td style="word-break: break-all">' + empresa[i].logo_emp + '</td>';
                    }
                    if (empresa[i].estado == 1) {
                        recargaemp += '<td><button type="button" class="btn btn-warning" onclick="estadouserJS(' + empresa[i].id + '); return false;">Banear</button></td>';
                    } else {
                        recargaemp += '<td><button type="button" class="btn btn-warning" onclick="estadouserJS(' + empresa[i].id + '); return false;">Reactivar</button></td>';
                    }
                    recargaemp += '<td><button type="button" class="btn btn-info" onclick="actualizarmodal(\'' + empresa[i].id + '\',\'' + empresa[i].id_perfil + '\'); return false;">Modificar</button></td>';
                    recargaemp += '<td><button type="button" class="btn btn-danger" onclick="eliminarJS(\'' + empresa[i].id + '\',\'' + empresa[i].id_perfil + '\'); return false;">Eliminar</button></td>';
                    recargaemp += '</tr>';
                }
                recargaemp += '</tbody>';
                recargaemp += '</table>';
            }
            if (recargaadmin == null) {
                tablaadmin.innerHTML = "";
            } else {
                tablaadmin.innerHTML = recargaadmin;
            }
            if (recargatrab == null) {
                tablatrab.innerHTML = "";
            } else {
                tablatrab.innerHTML = recargatrab;
            }
            if (recargaemp == null) {
                tablaemp.innerHTML = "";
            } else {
                tablaemp.innerHTML = recargaemp;
            }
        }
    }
    ajax.send(formData);
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
            recargaform += '<input type="email" class="form-control" id="mail" name="mail" placeholder="Introduce el correo" required>';
            recargaform += '</div>';
            recargaform += '<div class="form-group">';
            recargaform += '<label class="col-sm-2 col-form-label">Contraseña:</label>';
            recargaform += '<input type="text" class="form-control" id="contra" name="contra" placeholder="Introduce una contraseña" required>';
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
        recargaform += '<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce el nombre" required>';
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
        recargaform += '<input type="text" class="form-control" id="nom_emp" name="nom_emp" placeholder="Introduce el nombre" required>';
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
    ajax.open("POST", "crearuser", true);
    ajax.onreadystatechange = function() {
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

function actualizarmodal(id, id_perfil) {
    document.getElementById('sitioform').innerHTML = "";
    var modal = document.getElementById("myModal");
    var modalcontent = document.getElementById("modal-content");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('_method', 'POST');

    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();
    ajax.open("POST", "mostrarmodaluser/" + id + "/" + id_perfil, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            var usuarios = respuesta.usuarios;
            recargamodal = "";
            recargamodal += '<form method="POST" onsubmit="modificarJS(\'' + id + '\',\'' + id_perfil + '\'); return false;" id="formcrear" enctype="multipart/form-data">';
            recargamodal += '<div class="form-group">';
            recargamodal += '<label class="col-sm-2 col-form-label">Correo:</label>';
            recargamodal += '<input type="email" class="form-control" id="mail" name="mail" value="' + usuarios.mail + '">';
            recargamodal += '</div>';
            recargamodal += '<div class="form-group">';
            recargamodal += '<label class="col-sm-2 col-form-label">Contraseña:</label>';
            recargamodal += '<input type="text" class="form-control" id="contra" name="contra" value="' + usuarios.contra + '">';
            recargamodal += '</div>';
            recargamodal += '<div class="form-group">';
            recargamodal += '<label class="col-sm-2 col-form-label">Estado:</label>';
            recargamodal += '<input type="number" class="form-control" id="estado" name="estado" value="' + usuarios.estado + '">';
            recargamodal += '</div>';
            if (id_perfil == 2) {
                var trabajador = respuesta.trabajador;
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Nombre:</label>';
                recargamodal += '<input type="text" class="form-control" id="nombre" name="nombre" value="' + trabajador.nombre + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Apellido:</label>';
                recargamodal += '<input type="text" class="form-control" id="apellido" name="apellido" value="' + trabajador.apellido + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Sector:</label>';
                recargamodal += '<input type="text" class="form-control" id="campo_user" name="campo_user" value="' + trabajador.campo_user + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Experiencia:</label>';
                recargamodal += '<input type="text" class="form-control" id="experiencia" name="experiencia" value="' + trabajador.experiencia + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Estudios:</label>';
                recargamodal += '<input type="text" class="form-control" id="estudios" name="estudios" value="' + trabajador.estudios + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Idiomas:</label>';
                recargamodal += '<input type="text" class="form-control" id="idiomas" name="idiomas" value="' + trabajador.idiomas + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Disponibilidad:</label>';
                recargamodal += '<input type="text" class="form-control" id="disponibilidad" name="disponibilidad" value="' + trabajador.disponibilidad + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Sobre ti:</label>';
                recargamodal += '<input type="text" class="form-control" id="about_user" name="about_user" value="' + trabajador.about_user + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Mostrado:</label>';
                recargamodal += '<input type="number" class="form-control" id="mostrado" name="mostrado" value="' + trabajador.mostrado + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Foto:</label>';
                recargamodal += '<input type="file" class="form-control" id="foto_perfil" name="foto_perfil">';
                recargamodal += '</div>';
            }
            if (id_perfil == 3) {
                var empresa = respuesta.empresa;
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Nombre:</label>';
                recargamodal += '<input type="text" class="form-control" id="nom_emp" name="nom_emp" value="' + empresa.nom_emp + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Localizacion:</label>';
                recargamodal += '<input type="text" class="form-control" id="loc_emp" name="loc_emp" value="' + empresa.loc_emp + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Sobre nosotros:</label>';
                recargamodal += '<input type="text" class="form-control" id="about_emp" name="about_emp" value="' + empresa.about_emp + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Sector:</label>';
                recargamodal += '<input type="text" class="form-control" id="campo_emp" name="campo_emp" value="' + empresa.campo_emp + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Que buscas:</label>';
                recargamodal += '<input type="text" class="form-control" id="searching" name="searching" value="' + empresa.searching + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Mostrado:</label>';
                recargamodal += '<input type="number" class="form-control" id="mostrado" name="mostrado" value="' + empresa.mostrado + '">';
                recargamodal += '</div>';
                recargamodal += '<div class="form-group">';
                recargamodal += '<label class="col-sm-2 col-form-label">Logo:</label>';
                recargamodal += '<input type="file" class="form-control" id="logo_emp" name="logo_emp">';
                recargamodal += '</div>';
            }
            recargamodal += '<button type="submit" class="btn btn-primary">Enviar</button>';
            recargamodal += '</form>';
            modalcontent.innerHTML = recargamodal;
            modal.style.display = "block";
        }
    }
    ajax.send(formData)
}

function modificarJS(id, id_perfil) {
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('_method', 'PUT');
    formData.append('mail', document.getElementById('mail').value);
    formData.append('contra', document.getElementById('contra').value);
    formData.append('estado', document.getElementById('estado').value);
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
        formData.append('mostrado', document.getElementById('mostrado').value);
    }
    if (id_perfil == 3) {
        formData.append('nom_emp', document.getElementById('nom_emp').value);
        formData.append('loc_emp', document.getElementById('loc_emp').value);
        formData.append('about_emp', document.getElementById('about_emp').value);
        formData.append('campo_emp', document.getElementById('campo_emp').value);
        formData.append('searching', document.getElementById('searching').value);
        formData.append('logo_emp', document.getElementById('logo_emp').files[0]);
        formData.append('mostrado', document.getElementById('mostrado').value);
    }
    var ajax = objetoAjax();
    ajax.open("POST", "modificaruser/" + id + "/" + id_perfil, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            leerJS();
        }
    }
    ajax.send(formData)
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

function estadouserJS(id) {
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('_method', 'PUT');

    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();
    ajax.open("POST", "estadouser/" + id, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            leerJS();
        }
    }
    ajax.send(formData)
}

function eliminarJS(id, id_perfil) {
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('_method', 'delete');

    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();
    ajax.open("POST", "eliminaruser/" + id + "/" + id_perfil, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            leerJS();
        }
    }
    ajax.send(formData)
}