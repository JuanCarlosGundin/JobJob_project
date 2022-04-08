@if (!Session::get('id_user'))
    <?php
        //Si la sesion no esta definida te redirige al login.
        return redirect()->to('/')->send();
    ?>
@endif
<?php $u=Session::get('id_user');
    $p=Session::get('id_perfil');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>SOY UNA EMPRESA</h1>
    <div>
        <form action="{{url('logout')}}" method="GET">
            <div class="form-group">
                <span><i class="fas fa-sign-out-alt"></i></span>
                <button type="submit" value="logout" class="botoncPanel">LOGOUT</button><br><br>
            </div>
        </form>
    </div>
</body>
</html>