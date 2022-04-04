window.onload = function() {
    // empresa();

    // leertipo();
    // document.getElementById("nombre_usuario").focus();
    /*CODIGO MODAL*/

    //     // Get the modal
    //     modal = document.getElementById("myModal");

    //     // Get the <span> element that closes the modal
    //     span = document.getElementsByClassName("close")[0];



    //     // When the user clicks on <span> (x), close the modal
    //     span.onclick = function() {
    //         modal.style.display = "none";
    //     }

    //     // When the user clicks anywhere outside of the modal, close it
    //     window.onclick = function(event) {
    //         if (event.target == modal) {
    //             modal.style.display = "none";
    //         }
    //     }
    // }

    // function abrirModal(id_usuario, nombre_usuario, apellido_usuario, correo_usuario, password_usuario) {
    //     modal.style.display = "block";
    //     document.getElementById('idModificar').value = id_usuario;
    //     document.getElementById('modnombreuser').value = nombre_usuario;
    //     document.getElementById('modapellido').value = apellido_usuario;
    //     document.getElementById('modcorreo').value = correo_usuario;
    //     document.getElementById('modpassword').value = password_usuario;
    // }

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
    //recarga += '';
    // recarga += '<div>';
    recarga += '<form method="POST" onsubmit="creartrabajadorJS(); return false;" id="formregistro" enctype="multipart/form-data">'
    recarga += '<input type="text" id="mail" name="mail" placeholder="Introduce el email..."><br><br>'
    recarga += '<input type="password" id="contra" name="contra" placeholder="Introduce la contraseña..."><br><br>'
    recarga += '<input type="text" id="nombre" name="nombre" placeholder="Introduce el nombre..."><br><br>'
    recarga += '<input type="text" id="apellido" name="apellido" placeholder="Introduce el apellido..."><br><br>'
    recarga += '<input type="file" name="foto_perfil" id="foto_perfil"><br><br>'
    recarga += '<input type="text" id="campo_user" name="campo_user" placeholder="Introduce tu sector..."><br><br>'
    recarga += '<input type="text" id="estudios" name="estudios" placeholder="Introduce tus estudios..."><br><br>'
    recarga += '<input type="text" id="experiencia" name="experiencia" placeholder="Introduce tu experiencia..."><br><br>';
    recarga += '<input type="text" id="idiomas" name="idiomas" placeholder="idiomas..."><br><br>'
    recarga += '<input type="text" id="disponibilidad" name="disponibilidad" placeholder="Introduce tu disponibilidad..."><br><br>'
    recarga += '<p>Quieres que se te muestre a las empresas?</p>'
    recarga += '<select name="mostrado" id="mostrado">'
    recarga += '<option value="0" selected>Sí</option>'
    recarga += '<option value="1">No</option>'
    recarga += '</select><br><br>'
    recarga += '<input type="text" id="about_user" name="about_user" placeholder="Sobre mi..."><br><br>'
    recarga += '<input id="id_perfil" name="id_perfil" type="hidden" value="2">'
    recarga += '<input type="submit" value="Registrarme">'
    recarga += '</form>'
        // recarga += '</div>';
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