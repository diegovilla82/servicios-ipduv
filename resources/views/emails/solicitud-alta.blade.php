<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Nueva solicitud</title>
</head>
<body>
    <p>
    Datos enviados en la solicitud
    </p>
    <b>Nombre y apellido: </b> {{ $user->last_name . ' ' . $user->name }} <br>
    <b>Documento: </b> {{  $user->installer->documento }}<br>
    <b>Email: </b> {{  $user->email }} <br>
    <b>Telefono: </b> {{  $user->installer->telefono }}<br>
    <b>Profesion: </b> {{  $user->installer->profesion }}<br>
    <b>Consejo profesional: </b> {{  $user->installer->consejo_profesional }}<br>
    <br>
    <a href="{{ route('admin.installer.edit', $user->installer->id) }}">Haga click aquí para ver la documentacion presentada.</a> 



</body>
</html>