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
            recargaform += '<form method="POST" onsubmit="crearJS(); return false;" id="formcrear" enctype="multipart/form-data">';
            recargaform += '<div class="form-group">';
            recargaform += '<label class="col-sm-2 col-form-label">Correo:</label>';
            recargaform += '<input type="text" class="form-control" id="mail" name="mail" placeholder="Introduce el correo">';
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
        }
    }
    ajax.send(formData)
}

function crearJS() {
    var message = document.getElementById('message');
    var mail = document.getElementById('mail').value;
    var contra = document.getElementById('contra').value;
    var id_perfil = document.getElementById('nom_perfil').value;
    console.log(id_perfil);
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('_method', 'POST');
    formData.append('mail', mail);
    formData.append('contra', contra);
    formData.append('id_perfil', id_perfil);

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
        }
    }
    ajax.send(formData)
}