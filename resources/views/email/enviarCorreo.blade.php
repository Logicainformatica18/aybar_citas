<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color: #00505E; color: white; padding: 20px; font-family: Arial, sans-serif;">
    <h2 style="text-align: center;">Proceso de su Cita Generada</h2>
    <div style="margin-top: 20px;">
        <div style="margin-bottom: 10px;"><h3>Detalles:</h3></div>
        <div style="margin-bottom: 10px;">Cita: <strong>{{$comment->cite->codigo}}</strong></div>
        <div style="display:flex; justify-content: space-between;">
            <div style="margin-bottom: 10px;">Estado: <strong>{{$comment->estado}}</strong></div>
            <div style="margin-bottom: 10px;">Fecha: <strong>{{$comment->cite->fecha}}</strong></div>
            <div style="margin-bottom: 10px;">Hora: <strong>{{$comment->cite->hora}}</strong></div>
        </div>
        <div style="margin-bottom: 10px;">Informe: <strong>{{$comment->comentario}}</strong></div>
    </div>
</body>
</html>
