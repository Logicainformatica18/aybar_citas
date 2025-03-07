<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="background-color: #00505E; color: white; padding: 20px; font-family: Arial, sans-serif;">

    @if ($cite->reprogramacion_state == 'on')
        <h2 style="text-align: center; color:white">Su Cita ha sido Reprogramada</h2>
    @else
        <h2 style="text-align: center; color:white">Su Cita ha sido Actualizada</h2>
    @endif

    <div style="margin-top: 20px;">
        <div style="margin-bottom: 10px;">
            <h3>Detalles de la Cita:</h3>
        </div>
        <div style="margin-bottom: 10px;color:white">Código de Cita: <strong>{{ $cite->codigo }}</strong></div>
        <div style="display:flex; justify-content: space-between;">
            <div style="margin-bottom: 10px; color:white">Motivo: <strong>{{ $cite->motivo }} &nbsp;</strong></div>
            <div style="margin-bottom: 10px;color:white">Modalidad: <strong>{{ $cite->tipo }}</strong></div>
        </div>
        @if ($cite->reprogramacion_state == 'on')
        <div style="display:flex; justify-content: space-between;">
            <div style="margin-bottom: 10px;color:white">Fecha de Cita reprogramada: <strong>{{ $cite->fecha }} &nbsp;</strong></div>
            <div style="margin-bottom: 10px;color:white">Hora de Cita reprogramada: <strong>{{ $cite->hora }}</strong></div>
        </div>
    @else
    <div style="display:flex; justify-content: space-between;">
        <div style="margin-bottom: 10px;color:white">Fecha de Cita: <strong>{{ $cite->fecha }} &nbsp;</strong></div>
        <div style="margin-bottom: 10px;color:white">Hora de Cita: <strong>{{ $cite->hora }}</strong></div>
    </div>
    @endif


    </div>
</body>

</html>
