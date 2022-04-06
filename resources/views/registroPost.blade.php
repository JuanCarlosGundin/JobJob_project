<body>
    <div>
        <form action="{{url("registroPost")}}" method="POST">
        @csrf
        {{method_field('POST')}}    
            <input type="text" id="mail" name="mail" placeholder="Introduce el email..."><br><br>
            <input type="password" id="contra" name="contra" placeholder="Introduce la contraseña..."><br><br>
            <input type="text" id="nombre" name="nombre" placeholder="Introduce el nombre..."><br><br>
            <input type="text" id="apellido" name="apellido" placeholder="Introduce el apellido..."><br><br>
            <input type="file" name="foto_perfil" id="foto_perfil"><br><br>
            <input type="text" id="campo_user" name="campo_user" placeholder="Introduce tu sector..."><br><br>
            <input type="text" id="experiencia" name="experiencia" placeholder="Introduce tu experiencia..."><br><br>
            <input type="text" id="estudios" name="estudios" placeholder="Introduce tus estudios..."><br><br>
            <input type="text" id="idiomas" name="idiomas" placeholder="idiomas..."><br><br>
            <input type="text" id="disponibilidad" name="disponibilidad" placeholder="Introduce tu disponibilidad..."><br><br>
            <p>Quieres que se te muestre a las empresas?</p>
            <select name="mostrado" id="mostrado">
                <option value="0" selected>Sí</option>
                <option value="1">No</option>
              </select><br><br>
            <input type="text" id="about_user" name="about_user" placeholder="Sobre mi..."><br><br>
            <input id="id_perfil" name="id_perfil" type="hidden" value="2">
            <input type="submit" value="Registrarme">
        </form>
    </div>
</body>