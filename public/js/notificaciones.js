window.onload = function() {
    leernotificacionesJS();
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

function leernotificacionesJS() {
    var zonaalerts = document.getElementById("zonaalerts");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('filter', document.getElementById('filter').value);

    var ajax = objetoAjax();
    ajax.open("POST", "leernotificaciones", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            var recarga = "";
            console.log(respuesta);
            for (let i = 0; i < respuesta.length; i++) {
                recarga += '<div class="alert">';
                recarga += '<div class="alert-foto">';
                recarga += '<img class="alert-profilefoto" src="storage/' + respuesta[i].foto_perfil + '">';
                recarga += '</div>';
                recarga += '<div class="alert-mensaje">';
                recarga += '<p class="alert-mensaje-text">¡Le interesas a ' + respuesta[i].nombre + '!</p>';
                recarga += '</div>';
                recarga += '<div class="alert-user">';
                recarga += '<button class="alert-user-btn">';
                recarga += '<i class="fa-solid fa-user"></i>';
                recarga += '</button>';
                recarga += '</div>';
                recarga += '<div class="alert-chat">';
                recarga += '<button class="alert-chat-btn">';
                recarga += '<i class="fa-solid fa-comments"></i>';
                recarga += '</button>';
                recarga += '</div>';
                recarga += '</div>';
                recarga += '<hr class="alert-linea"></hr>';
                zonaalerts.innerHTML = recarga;
            }
        }
    }
    ajax.send(formData);
}