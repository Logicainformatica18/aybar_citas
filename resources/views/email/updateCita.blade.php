<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color: #00505E; color: white; padding: 20px; font-family: Arial, sans-serif;">
    <h2 style="text-align: center;">Su Cita ha sido Actualizada</h2>
    <div style="margin-top: 20px;">
        <div style="margin-bottom: 10px;"><h3>Detalles de la Cita:</h3></div>
        <div style="margin-bottom: 10px;">Código de Cita: <strong>{{ $cite->codigo }}</strong></div>
        <div style="display:flex; justify-content: space-between;">
            <div style="margin-bottom: 10px;">Motivo: <strong>{{ $cite->motivo }}</strong></div>
            <div style="margin-bottom: 10px;">Modalidad: <strong>{{ $cite->tipo }}</strong></div>
        </div>
        <div style="display:flex; justify-content: space-between;">
            <div style="margin-bottom: 10px;">Fecha de Cita: <strong>{{ $cite->fecha }}</strong></div>
            <div style="margin-bottom: 10px;">Hora de Cita: <strong>{{ $cite->hora }}</strong></div>
        </div>
    </div>
</body>
</html>
