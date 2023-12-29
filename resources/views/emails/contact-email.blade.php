<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Mensaje recibido</title>
</head>
<body>

    <p>
        <p> Mensaje de: {!!  $name !!} </p>
        {!! $content !!}
        <p> Telefono: {{ $phone }}</p>
        <p> Email {{ $email }}</p>
    </p>
    <br>
    <a href="{{ route('home') }}">Haga click aquí para acceder al sitio.</a> 

</body>
</html>