<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/modal.css">
    <title>Administración</title>
</head>
<body>
    <label>Administradores</label>
    <input type="checkbox" value="Admin" id="adm" onclick="leerJS()" checked>
    <label>Trabajadores</label>
    <input type="checkbox" value="Trabajador" id="tbjd" onclick="leerJS()" checked>
    <label>Empresas</label>
    <input type="checkbox" value="Empresa" id="emp" onclick="leerJS()" checked>
    <label>Correo</label>
    <input type="text" onkeyup="leerJS()" id="filcorreo">
    <label>Nombre</label>
    <input type="text" onkeyup="leerJS()" id="filtro">
    <button onclick="crearadmin()">Crear</button>
    <div id="sitioform"></div>
    <div id="message"></div>
    <div>
        <div id="tablaadmin">
            {{-- contenido ajax --}}
        </div>
        <div id="tablatrab">
            {{-- contenido ajax --}}
        </div>
        <div id="tablaemp">
            {{-- contenido ajax --}}
        </div>
    </div>
    <div id="myModal" class="modal">
        <div>
            <span class="close">&times;</span>
        </div>
        <div id="modal-content" class="modal-content">
        </div>
    </div>
    <script src="js/admin.js"></script>
</body>
</html>