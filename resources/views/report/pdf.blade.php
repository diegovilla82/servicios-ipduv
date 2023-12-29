<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
  body { font-size:13px; font-family: DejaVu Sans, sans-serif; }
    table, td, th {
        border: 1px solid black;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

.right {
  float: right;
  width: 100px;
  padding: 10px;
}

.left {
  float: left;
  width: 100px;
  padding: 10px;
  padding-top: 14px;
}
</style>
<title>Nota solicitud de Inscripción al Registro de Personas Físicas (Instaladores Individuales)</title>
</head>
<body>
    <img src="assets/images/logo.png" style="max-width: 715px;">
<br>
<table style="width:100%; background-image: url('assets/images/fondo.jpg')  ">
        <tr>
            <td colspan="2" style="text-align: center;"><br>TICKET ORIGINAL N°: {{ $servicio->id }}<br><br></td>

        </tr>
        <tr>
            <td style="text-align: center">FECHA DE INICIO:</td>
            <td style="text-align: center"> {{ $servicio->created_at->format('d/m/y H:i:s') }}</td>

        </tr>
        <tr>
            <td style="text-align: center">FECHA FIN:</td>
            <td style="text-align: center">{{ $servicio->updated_at->format('d/m/y H:i:s') }}</td>

        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">PROBLEMA</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center"><br> {{ $servicio->problema }} <br><br></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <h7>SOLUCION</h7>
            </td>

        </tr>
        <tr>
            <td colspan="2" style="text-align: center"><br> {{ $servicio->solucion }} <br><br></td>
        </tr>
        <tr>
            <td style="text-align: center">AREA: {{ $servicio->device->area->descripcion }}</td>
            <td style="text-align: center"></td>
        </tr>
        <tr>
            <td style="text-align: center"> EQUIPO INVENTARIO NUM. {{ $servicio->device->inventario }}</td>
            <td style="text-align: center">TÉCNICO</td>
        </tr>
        <tr>
            <td style="text-align: center"><br>
                ----------------------------------- <br>
                @if ($servicio->entrega_baja)
                    {{ $servicio->nombre_usuario }}
                @else
                    FIRMA DEL RESPONSABLE EQUIPO
                @endif
            </td>
            <td style="text-align: center">
                <br>
                ----------------------------------- <br>
                {{ $servicio->userAsigned->name }}
            </td>
        </tr>

    </table>
</body>
</html>

