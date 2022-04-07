@if (!Session::get('nombre_trabajador'))
    <?php
        //Si la session no esta definida te redirige al login.
        return redirect()->to('/')->send();
    ?>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>SOY UN TRABAJADOR</h1>
    <div>
        <form action="{{url('logout')}}" method="GET">
            <div class="form-group">
                <span><i class="fas fa-sign-out-alt"></i></span>
                <button type="submit" value="logout" class="botoncPanel">LOGOUT</button><br><br>
            </div>
        </form>
    </div>
    <div>
        <form action="{{url('editarperfil')}}" method="GET">
            <div class="form-group">
                <span><i class="fas fa-sign-out-alt"></i></span>
                <button type="submit" value="logout" class="botoncPanel">editar perfil</button><br><br>
            </div>
        </form>
    </div>
    
</body>
</html>