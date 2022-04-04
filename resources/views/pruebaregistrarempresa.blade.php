<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>Registro Empresa</title>
</head>
<body>
    <div>
        <form action="{{url("registroEmpresaPost")}}" method="POST">
        @csrf
        {{method_field('POST')}}    
            <input type="text" id="mail" name="mail" placeholder="Introduce el email..."><br><br>
            <input type="password" id="contra" name="contra" placeholder="Introduce la contraseña..."><br><br>
            <input type="text" id="nom_emp" name="nom_emp" placeholder="Introduce el nombre de empresa..."><br><br>
            <input type="text" id="loc_emp" name="loc_emp" placeholder="Introduce la localización..."><br><br>
            <input type="file" name="logo_emp" id="logo_emp"><br><br>
            <input type="text" id="campo_emp" name="campo_emp" placeholder="Introduce tu sector..."><br><br>
            <input type="text" id="searching" name="searching" placeholder="Qué buscas para tu empresa?"><br><br>
            <p>Quieres que se te muestre a los trabajadores?</p>
            <select name="mostrado" id="mostrado">
                <option value="0" selected>Sí</option>
                <option value="1">No</option>
              </select><br><br>
            <input type="text" id="about_emp" name="about_emp" placeholder="Sobre mi empresa..."><br><br>
            <input id="id_perfil" name="id_perfil" type="hidden" value="3">
            <input type="submit" value="Registrarme">
        </form>
    </div>
</body>
</html>
