window.onload=function(){
mostrar()
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

function mostrar() {
    //Creamos el formdata que se enviara al controller
    var tabla = document.getElementById("mainInfo");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    //id del usuario el cual tenemos que filtrar segun sus etiquetas
    //TERMINA FILTRADO
    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();
    ajax.open("POST", "mostrar", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            console.log(respuesta)
            var recarga = '';
            if(respuesta[0].id_perfil==3){
                recarga += '<p>' + respuesta[0].nom_emp + '</p></br>'
                recarga += '<p>' + respuesta[0].about_emp + '</p></br>'
                recarga += '<p>' + respuesta[0].campo_emp + '</p></br>'
                recarga += '<p>' + respuesta[0].searching + '</p></br>'
            }else{
                recarga += '<p>' + respuesta[0].nombre + '</p></br>'
                recarga += '<p>' + respuesta[0].apellido + '</p></br>'
                recarga += '<p>' + respuesta[0].campo_user + '</p></br>'
                recarga += '<p>' + respuesta[0].experiencia + '</p></br>'
                recarga += '<p>' + respuesta[0].estudios + '</p></br>'
            }
    }
    tabla.innerHTML = recarga;
    }
    ajax.send(formData)
}

function yes() {
    //Creamos el formdata que se enviara al controller
    var tabla = document.getElementById("mainInfo");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    //id del usuario el cual tenemos que filtrar segun sus etiquetas
    //TERMINA FILTRADO
    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();
    ajax.open("POST", "si", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            console.log(respuesta)
    }
    tabla.innerHTML = recarga;
    }
    ajax.send(formData)
}
function nope() {
    //Creamos el formdata que se enviara al controller
    var tabla = document.getElementById("mainInfo");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    //id del usuario el cual tenemos que filtrar segun sus etiquetas
    //TERMINA FILTRADO
    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();
    ajax.open("POST", "mostrar", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            console.log(respuesta)
            if(respuesta[0].id_perfil==3){
                recarga += '<p>' + respuesta[0].nom_emp + '</p></br>'
                recarga += '<p>' + respuesta[0].about_emp + '</p></br>'
                recarga += '<p>' + respuesta[0].campo_emp + '</p></br>'
                recarga += '<p>' + respuesta[0].searching + '</p></br>'
            }else{
                recarga += '<p>' + respuesta[0].nombre + '</p></br>'
                recarga += '<p>' + respuesta[0].apellido + '</p></br>'
                recarga += '<p>' + respuesta[0].campo_user + '</p></br>'
                recarga += '<p>' + respuesta[0].experiencia + '</p></br>'
                recarga += '<p>' + respuesta[0].estudios + '</p></br>'
            }
    }
    }
    ajax.send(formData)
}