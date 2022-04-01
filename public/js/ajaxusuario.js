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
    tabla.innerHTML = ("trabajador")
}

function empresa() {
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var tabla = document.getElementById("main");
    tabla.innerHTML = ("empresa")
}