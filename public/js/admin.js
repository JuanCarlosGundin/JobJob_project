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
    var tabla = document.getElementById("tabla");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('filtro', document.getElementById('filtro').value);

    var ajax = objetoAjax();
    ajax.open("POST", "leer", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            var recarga = '';
            /* Leerá la respuesta que es devuelta por el controlador: */
            recarga += '<div>';
            recarga += '<tr>';
            recarga += '<th>ID</th>';
            recarga += '<th>Correo</th>';
            recarga += '<th>Contraseña</th>';
            recarga += '<th>Nombre</th>';
            recarga += '<th>Sobre nosotros</th>';
            recarga += '<th>Sector</th>';
            recarga += '<th>Busqueda</th>';
            recarga += '<th>Logo</th>';
            recarga += '<th>Estado</th>';
            recarga += '</tr>';
            for (let i = 0; i < respuesta.length; i++) {
                recarga += '<tr>';
                recarga += '<td>' + respuesta[i].id + '</td>';
                recarga += '<td>' + respuesta[i].mail + '</td>';
                recarga += '<td>' + respuesta[i].contra + '</td>';
                recarga += '<td>' + respuesta[i].nom_emp + '</td>';
                recarga += '<td>' + respuesta[i].loc_emp + '</td>';
                recarga += '<td>' + respuesta[i].about_emp + '</td>';
                recarga += '<td>' + respuesta[i].campo_emp + '</td>';
                recarga += '<td>' + respuesta[i].searching + '</td>';
                recarga += '<td>' + respuesta[i].logo_emp + '</td>';
                if (respuesta[i].estado == 1) {
                    recarga += '<td><button onclick="estadouserJS(' + respuesta[i].id + '); return false;">Banear</button></td>';
                } else {
                    recarga += '<td><button onclick="estadouserJS(' + respuesta[i].id + '); return false;">Reactivar</button></td>';
                }
                recarga += '</tr>';
            }
            recarga += '</div>';
            tabla.innerHTML = recarga;
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