<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Nueva solicitud</title>
</head>
<body>
    <p>
    Su solicitud fue aprobada
    </p>
    Usted ahora se encuentra en nuestro listado de instaladores aprobados
    <br>
    <a href="{{ route('installer.index', $user->installer->id) }}">Haga click aquí para ir al listado</a> 



</body>
</html>