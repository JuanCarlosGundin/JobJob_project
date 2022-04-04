<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>
<body>
    {{-- <form action="{{url("registroPost")}}" method="POST">
        @csrf
        {{method_field('POST')}} --}}
    <div id="main">
        <button onclick="trabajador()">Soy un trabajador</button>
        <button onclick="empresa()">Soy una empresa</button>
    </div>
    {{-- </form> --}}
    <script src="js/ajaxusuario.js"></script>
</body>
</html>