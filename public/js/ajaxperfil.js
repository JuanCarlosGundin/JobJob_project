window.onload = function() {
    leerJS();
    /*CODIGO MODAL*/

    // Get the modal
    modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    span = document.getElementsByClassName("close")[0];



    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

function abrirModal(id_usuario, nombre, apellido, campo_user, experiencia, estudios, idiomas, disponibilidad, about_user) {
    modal.style.display = "block";
    document.getElementById('modid').value = id_usuario;
    document.getElementById('modnombre').value = nombre;
    document.getElementById('modapellido').value = apellido;
    document.getElementById('modcampo_user').value = campo_user;
    document.getElementById('modexperiencia').value = experiencia;
    document.getElementById('modestudios').value = estudios;
    document.getElementById('modidiomas').value = idiomas;
    document.getElementById('moddisponibilidad').value = disponibilidad;
    document.getElementById('modabout_user').value = about_user;
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

/* Función implementada con AJAX */
function leerJS() {
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var tabla = document.getElementById("main");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));

    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();

    ajax.open("POST", "leertrabajador", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            var recarga = '';
            recarga += '<tr><td>EMAIL</td><td>CONTRASEÑA</td><td>NOMBRE</td><td>APELLIDO</td><td>FOTO</td><td>CAMPO</td><td>EXPERIENCIA</td><td>ESTUDIOS</td><td>IDIOMAS</td><td>DISPONIBILIDAD</td><td>SOBRE MI</td></tr>';
            /* Leerá la respuesta que es devuelta por el controlador: */
            for (let i = 0; i < respuesta.length; i++) {
                recarga += '<tr>';
                recarga += '<td>' + respuesta[i].mail + '</td>'
                recarga += '<td>' + respuesta[i].contra + '</td>'
                recarga += '<td>' + respuesta[i].nombre + '</td>'
                recarga += '<td>' + respuesta[i].apellido + '</td>'
                recarga += '<td><img src="storage/' + respuesta[i].foto_perfil + '" style="width:15px;"></td>'
                recarga += '<td>' + respuesta[i].campo_user + '</td>'
                recarga += '<td>' + respuesta[i].experiencia + '</td>'
                recarga += '<td>' + respuesta[i].estudios + '</td>'
                recarga += '<td>' + respuesta[i].idiomas + '</td>'
                recarga += '<td>' + respuesta[i].disponibilidad + '</td>'
                recarga += '<td>' + respuesta[i].about_user + '</td>'
                recarga += '<td>' + respuesta[i].campo_user + '</td>'

                // recarga += '<td><button onclick="eliminarJS(' + respuesta[i].id_ubicacion + ')">Eliminar</button></td>'
                recarga += '<td><button type="submit" value="Modificar" onclick="abrirModal(' + respuesta[i].id_usuario + ',\'' + respuesta[i].nombre + '\',\'' + respuesta[i].apellido + '\',\'' + respuesta[i].campo_user + '\',\'' + respuesta[i].experiencia + '\',\'' + respuesta[i].estudios + '\',\'' + respuesta[i].idiomas + '\',\'' + respuesta[i].disponibilidad + '\',\'' + respuesta[i].about_user + '\');return false;">Modificar</button></td>'
                    // recarga += '<td><button type="submit" value="Modificar" onclick="abrirModal(' + respuesta[i].id_usuario + ',\'' + respuesta[i].nombre + ',\'' + respuesta[i].apellido + '\',\'' + respuesta[i].campo_user + '\',\'' + respuesta[i].experiencia + '\',\'' + respuesta[i].estudios + '\');return false;">Modificar</button></td>'

                recarga += '</tr>';

            }
            tabla.innerHTML = recarga;
        }
    }

    ajax.send(formData);
}
//BORRAR
function eliminarJS(id) {
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('_method', 'DELETE');
    formData.append('id_ubicacion', id);
    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();
    ajax.open("POST", "eliminar/" + id, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            /* Leerá la respuesta que es devuelta por el controlador: */
            if (respuesta.resultado == 'OK') {
                document.getElementById('mensaje').innerHTML = "eliminado correctamente."
            } else {
                document.getElementById('mensaje').innerHTML = "Fallo eliminando " + respuesta.resultado;
            }
            leerJS();
        }
    }

    ajax.send(formData);
}
//EDITAR
function editartrabajadorJS() {
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('_method', "PUT");
    formData.append('id_usuario', document.getElementById('modid').value);
    // formData.append('id_perfil', document.getElementById('modid_perfil').value);
    formData.append('nombre', document.getElementById('modnombre').value);
    formData.append('apellido', document.getElementById('modapellido').value);
    formData.append('campo_user', document.getElementById('modcampo_user').value);
    formData.append('experiencia', document.getElementById('modexperiencia').value);
    formData.append('estudios', document.getElementById('modestudios').value);
    // formData.append('mostrado', document.getElementById('modmostrado').value);
    formData.append('idiomas', document.getElementById('modidiomas').value);
    formData.append('disponibilidad', document.getElementById('moddisponibilidad').value);
    formData.append('about_user', document.getElementById('modabout_user').value);
    // formData.append('foto_perfil', document.getElementById('modfoto_perfil').files[0]);
    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();

    ajax.open("POST", "modificartrabajador", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            /* Leerá la respuesta que es devuelta por el controlador: */
            if (respuesta.resultado == 'OK') {
                document.getElementById('mensaje').innerHTML = "editado correctamente."
            } else {
                document.getElementById('mensaje').innerHTML = "Fallo editando " + respuesta.resultado;
            }
            leerJS();
        }
    }

    ajax.send(formData);
    modal.style.display = "none";
}