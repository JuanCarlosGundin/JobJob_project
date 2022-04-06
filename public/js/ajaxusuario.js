window.onload = function() {


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
function trabajador() {
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var tabla = document.getElementById("main");
    var recarga = '';
    //recarga += ''
    recarga += '<div class="modal-content-register"><div class="scrollbar"><h3>¡Regístrate en JobJob!</h3>'
    recarga += '<form method="POST" onsubmit="creartrabajadorJS(); return false;" id="formregistro" enctype="multipart/form-data">'
    recarga += '<div class="column-2">'
    recarga += '<p>Email</p>'
    recarga += '<input type="text" class="inputregister" id="mail" name="mail" placeholder="Introduce el email..." required><br><br>'
    recarga += '</div>'
    recarga += '<div class="column-2">'
    recarga += '<p>Contraseña</p>'
    recarga += '<input type="password" class="inputregister" id="contra" name="contra" placeholder="Introduce la contraseña..." required><br><br>'
    recarga += '</div>'
    recarga += '<div class="column-2">'
    recarga += '<p>Nombre</p>'
    recarga += '<input type="text" class="inputregister" id="nombre" name="nombre" placeholder="Introduce el nombre..." required><br><br>'
    recarga += '</div>'
    recarga += '<div class="column-2">'
    recarga += '<p>Apellido</p>'
    recarga += '<input type="text" class="inputregister" id="apellido" name="apellido" placeholder="Introduce el apellido..." required><br><br>'
    recarga += '</div>'
    recarga += '<div class="column-2"><p>Foto</p><input type="file" class="foto" name="foto_perfil" id="foto_perfil" required><br><br></div>'
    recarga += '<div class="column-2"><p>Sector</p><input type="text" class="inputregister" id="campo_user" name="campo_user" placeholder="Introduce tu sector..." required><br><br></div>'
    recarga += '<div class="column-2"><p>Experiencia</p><input type="text" class="inputregister" id="experiencia" name="experiencia" placeholder="Introduce tu experiencia..." required><br><br></div>'
    recarga += '<div class="column-2"><p>Estudios</p><input type="text" class="inputregister" id="estudios" name="estudios" placeholder="Introduce tus estudios..." required><br><br></div>'
    recarga += '<div class="column-2"><p>Idiomas</p><input type="text" class="inputregister" id="idiomas" name="idiomas" placeholder="idiomas..." required><br><br></div>'
    recarga += '<div class="column-2"><p>Disponibilidad</p><input type="text" class="inputregister" id="disponibilidad" name="disponibilidad" placeholder="Introduce tu disponibilidad..." required><br><br></div>'
    recarga += '<div class="column-2"><p>Quieres que se te muestre a las empresas?</p><select name="mostrado" id="mostrado" required><option value="0" selected>Sí</option><option value="1">No</option></select><br><br></div>'
    recarga += '<div class="column-2"><p>Introduce más información sobre tí</p><input type="text" class="inputregister" id="about_user" name="about_user" placeholder="Sobre mi..." required><br><br><input id="id_perfil" name="id_perfil" type="hidden" value="2"></div>'
    recarga += '<input id="id_perfil" name="id_perfil" type="hidden" value="2">'
    recarga += '<input type="submit" class="botonregister" value="Registrarme">'
        //acabar
    recarga += '</form>'
    recarga += '</div>';
    recarga += '</div>';
    tabla.innerHTML = recarga
}

function empresa() {
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var tabla = document.getElementById("main");
    var recarga = '';
    //recarga += '';
    // recarga += '<div>';
    recarga += '<form method="POST" onsubmit="crearempresaJS(); return false;" id="formregistroempresa" enctype="multipart/form-data">'
    recarga += '<input type="text" id="mail" name="mail" placeholder="Introduce el email..."><br><br>'
    recarga += '<input type="password" id="contra" name="contra" placeholder="Introduce la contraseña..."><br><br>'
    recarga += '<input type="text" id="nom_emp" name="nom_emp" placeholder="Introduce el nombre de empresa..."><br><br>'
    recarga += '<input type="text" id="loc_emp" name="loc_emp" placeholder="Introduce la localización..."><br><br>'
    recarga += '<input type="file" name="logo_emp" id="logo_emp"><br><br>'
    recarga += '<input type="text" id="campo_emp" name="campo_emp" placeholder="Introduce tu sector..."><br><br>'
    recarga += '<input type="text" id="searching" name="searching" placeholder="Qué buscas para tu empresa?"><br><br>'
    recarga += '<p>Quieres que se te muestre a los trabajadores?</p>'
    recarga += '<select name="mostrado" id="mostrado">'
    recarga += '<option value="0" selected>Sí</option>'
    recarga += '<option value="1">No</option>'
    recarga += '</select><br><br>'
    recarga += '<input type="text" id="about_emp" name="about_emp" placeholder="Sobre mi empresa..."><br><br>'
    recarga += '<input id="id_perfil" name="id_perfil" type="hidden" value="3">'
    recarga += '<input type="submit" value="Registrarme">'
    recarga += '</form>'
        // recarga += '</div>';
    tabla.innerHTML = recarga
}

function creartrabajadorJS() {
    var formData = new FormData(document.getElementById("formregistro"));
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('_method', 'POST');
    // formData.append('mail', document.getElementById('mail').value);
    // formData.append('contra', document.getElementById('contra').value);
    // formData.append('id_perfil', document.getElementById('id_perfil').value);
    // formData.append('nombre', document.getElementById('nombre').value);
    // formData.append('apellido', document.getElementById('apellido').value);
    // formData.append('campo_user', document.getElementById('campo_user').value);
    // formData.append('experiencia', document.getElementById('experiencia').value);
    // formData.append('estudios', document.getElementById('estudios').value);
    // formData.append('mostrado', document.getElementById('mostrado').value);
    // formData.append('idiomas', document.getElementById('idiomas').value);
    // formData.append('disponibilidad', document.getElementById('disponibilidad').value);
    // formData.append('about_user', document.getElementById('about_user').value);
    // formData.append('foto_perfil', document.getElementById('foto_perfil').files[0]);
    var ajax = objetoAjax();
    ajax.open("POST", "registroPost", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            if (respuesta.resultado == "OK") {
                window.location.href = 'login';
            } else {
                // message.innerHTML = 'Ha habido un error: ' + respuesta.resultado;
            }
        }
    }
    ajax.send(formData)
}

function crearempresaJS() {
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('_method', 'POST');
    formData.append('mail', document.getElementById('mail').value);
    formData.append('contra', document.getElementById('contra').value);
    formData.append('id_perfil', document.getElementById('id_perfil').value);
    formData.append('nom_emp', document.getElementById('nom_emp').value);
    formData.append('loc_emp', document.getElementById('loc_emp').value);
    formData.append('campo_emp', document.getElementById('campo_emp').value);
    formData.append('searching', document.getElementById('searching').value);
    formData.append('mostrado', document.getElementById('mostrado').value);
    formData.append('about_emp', document.getElementById('about_emp').value);
    formData.append('logo_emp', document.getElementById('logo_emp').files[0]);
    var ajax = objetoAjax();
    ajax.open("POST", "registroEmpresaPost", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            if (respuesta.resultado == "OK") {
                window.location.href = 'login';
            } else {
                alert("tonto")
                    // message.innerHTML = 'Ha habido un error: ' + respuesta.resultado;
            }
        }
    }
    ajax.send(formData)
}


//--------------------------------EMPEZAMOS A HACER EL MODIFICAR PERFIL-----------------------------------------------------
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
            recarga += '<tr><td>EMAIL</td><td>CONTRA</td><td>DESCRIPCION</td><td>DIRECCION</td><td>FOTO</td><td>TIPO</td><td>ELIMINAR</td><td>MODIFICAR</td></tr>';
            /* Leerá la respuesta que es devuelta por el controlador: */
            for (let i = 0; i < respuesta.length; i++) {
                recarga += '<tr>';
                recarga += '<td>' + respuesta[i].id_ubicacion + '</td>'
                recarga += '<td>' + respuesta[i].nombre_ubicacion + '</td>'
                recarga += '<td>' + respuesta[i].descripcion_ubicacion + '</td>'
                recarga += '<td>' + respuesta[i].direccion_ubicacion + '</td>'
                recarga += '<td><img src="storage/' + respuesta[i].foto_ubicacion + '" style="width:15px;"></td>'
                recarga += '<td>' + respuesta[i].nombre_tipo + '</td>'
                recarga += '<td><button onclick="eliminarJS(' + respuesta[i].id_ubicacion + ')">Eliminar</button></td>'
                recarga += '<td><button type="submit" value="Modificar" onclick="abrirModal(' + respuesta[i].id_ubicacion + ',\'' + respuesta[i].nombre_ubicacion + '\',\'' + respuesta[i].descripcion_ubicacion + '\',\'' + respuesta[i].direccion_ubicacion + '\',\'' + respuesta[i].foto_ubicacion + '\');return false;">Modificar</button></td>'
                recarga += '</tr>';

            }
            tabla.innerHTML = recarga;
        }
    }

    ajax.send(formData);
}

function editartrabajadorJS() { /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('_method', "PUT");
    formData.append('id_usuario', document.getElementById('idModificar').value);
    formData.append('mail', document.getElementById('modmail').value);
    formData.append('descripcion_ubicacion', document.getElementById('moddescripcion').value);
    formData.append('direccion_ubicacion', document.getElementById('moddireccion').value);
    formData.append('foto_ubicacion', document.getElementById('modfoto').files[0]);
    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();

    ajax.open("POST", "modificar", true);
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