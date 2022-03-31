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
    formData.append('Trabajador', document.getElementById("tbjd").checked);
    formData.append('Empresa', document.getElementById("emp").checked);

    var ajax = objetoAjax();
    ajax.open("POST", "leer", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            if (respuesta.hasOwnProperty('empresa')) {
                var empresa = respuesta.empresa;
                var recarga = '';
                recarga += '<h2>Empresas</h2>';
                recarga += '<thead>';
                recarga += '<tr>';
                recarga += '<th>Correo</th>';
                recarga += '<th>Nombre</th>';
                recarga += '<th>Localizacion</th>';
                recarga += '<th>Sobre nosotros</th>';
                recarga += '<th>Sector</th>';
                recarga += '<th>Busqueda</th>';
                recarga += '<th>Logo</th>';
                recarga += '<th>Estado</th>';
                recarga += '</tr>';
                recarga += '</thead>';
                recarga += '<tbody>';
                for (let i = 0; i < empresa.length; i++) {
                    recarga += '<tr>';
                    recarga += '<td>' + empresa[i].mail + '</td>';
                    recarga += '<td>' + empresa[i].nom_emp + '</td>';
                    recarga += '<td>' + empresa[i].loc_emp + '</td>';
                    recarga += '<td>' + empresa[i].about_emp + '</td>';
                    recarga += '<td>' + empresa[i].campo_emp + '</td>';
                    recarga += '<td>' + empresa[i].searching + '</td>';
                    recarga += '<td>' + empresa[i].logo_emp + '</td>';
                    if (empresa[i].estado == 1) {
                        recarga += '<td><button onclick="estadouserJS(' + empresa[i].id + '); return false;">Banear</button></td>';
                    } else {
                        recarga += '<td><button onclick="estadouserJS(' + empresa[i].id + '); return false;">Reactivar</button></td>';
                    }
                    recarga += '</tr>';
                }
                recarga += '</tbody>';
            }
            if (respuesta.hasOwnProperty('trabajador')) {
                var trabajador = respuesta.trabajador;
                recarga += '<h2>Trabajadores</h2>';
                recarga += '<thead>';
                recarga += '<tr>';
                recarga += '<th>Correo</th>';
                recarga += '<th>Nombre</th>';
                recarga += '<th>Apellido</th>';
                recarga += '<th>Sector</th>';
                recarga += '<th>Experiencia</th>';
                recarga += '<th>Estudios</th>';
                recarga += '<th>Idiomas</th>';
                recarga += '<th>Disponibilidad</th>';
                recarga += '<th>Sobre mi</th>';
                recarga += '<th>Foto</th>';
                recarga += '<th>Estado</th>';
                recarga += '</tr>';
                recarga += '</thead>';
                recarga += '<tbody>';
                for (let i = 0; i < trabajador.length; i++) {
                    recarga += '<tr>';
                    recarga += '<td>' + trabajador[i].mail + '</td>';
                    recarga += '<td>' + trabajador[i].nombre + '</td>';
                    recarga += '<td>' + trabajador[i].apellido + '</td>';
                    recarga += '<td>' + trabajador[i].campo_user + '</td>';
                    recarga += '<td>' + trabajador[i].experiencia + '</td>';
                    recarga += '<td>' + trabajador[i].estudios + '</td>';
                    recarga += '<td>' + trabajador[i].idiomas + '</td>';
                    recarga += '<td>' + trabajador[i].disponibilidad + '</td>';
                    recarga += '<td>' + trabajador[i].about_user + '</td>';
                    recarga += '<td>' + trabajador[i].foto_perfil + '</td>';
                    if (trabajador[i].estado == 1) {
                        recarga += '<td><button onclick="estadouserJS(' + trabajador[i].id + '); return false;">Banear</button></td>';
                    } else {
                        recarga += '<td><button onclick="estadouserJS(' + trabajador[i].id + '); return false;">Reactivar</button></td>';
                    }
                    recarga += '</tr>';
                }
                recarga += '</tbody>';
            }
            if (recarga == null) {
                tabla.innerHTML = respuesta.resultado;
            } else {
                tabla.innerHTML = recarga;
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