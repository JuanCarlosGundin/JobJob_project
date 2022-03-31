<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="../public/css/modal.css">
    <title>Administración</title>
</head>
<body>
    <input type="text" onkeyup="leerJS()" id="filtro"><br><br>
    <div>
        <table id="tabla">
        {{-- contenido ajax --}}
        </table>
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