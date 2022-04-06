<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
<div id="mainInfo"></div>
<button onclick="nope()">No me gusta</button> <button onclick="yes()"> me gusta</button>
<script src="js/principal.js"></script>
</body>
</html>