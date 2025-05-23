<div class="table-responsive-xl">
    <table id="file_export" class=" table table-hover table-bordered table-striped ">
        <thead>
            <!-- start row -->
            <tr>


                <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                        srcset=""></th>

                <th>Acción</th>
                <th>Código</th>
                <th>Estado</th>
                <th >Cliente </th>
                <th>Teléfono </th>
                <th>DNI</th>
                <th>Proyecto</th>
                <th>Manzana</th>
                <th>Lote</th>

                <th>Fecha de cita</th>
                <th>Hora de cita</th>
                <th>Fecha Reprogramada</th>
                <th>Hora Reprogramada</th>
                <th>Motivo</th>



                <th>Restante</th>

                <th>Fecha Generada</th>






            </tr>
            <!-- end row -->
        </thead>
        <tbody>

            @foreach ($cite as $cites)

                <tr>

                    <td>
                        <div class="dropdown dropstart">
                            <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical fs-6"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">


                                <li>
                                    <a onclick="citeEditDerive('{{ $cites->id_cita }}');   return false" data-bs-toggle="modal"
                                        data-bs-target="#success-header-modal_2" fdprocessedid="cw61t3"
                                        class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)">
                                        <i class="fs-4 ti ti-edit"></i>Derivar
                                    </a>
                                </li>

                            {{-- @canany(['administrar', 'eliminar'])
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"
                                onclick="citeDestroy('{{ $cites->id }}'); return false">
                                    <i class="fs-4 ti ti-trash"></i>Delete
                                </a>
                            </li>
                            @endcanany --}}
                        </ul>
                        </div>

                    </td>





                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#success-header-modal"
                            fdprocessedid="cw61t3"
                            onclick="citeEdit('{{ $cites->id_cita }}');citeEdit('{{ $cites->id_cita }}');
                            setTimeout(validateDateTime, 800);return false"style="width: 100px">+ Ver
                            más</button>
                    </td>
                    <td>{{ $cites->codigo }}</td>
                    <td>
                        <span
                            class="badge
                        @switch($cites->estado)
                            @case('Pendiente') bg-success @break
                            @case('Proceso') " style="   background-color: #6f42c1 @break
                            @case('Atendido') bg-info @break
                            @case('Observado') bg-danger @break
                            @case('Finalizado') text-black bg-light @break
                            @case('Cerrado')  bg-dark @break
                            @case('Derivado') bg-secondary @break
                            @default bg-primary
                        @endswitch">
                            {{ $cites->estado }}
                        </span>
                    </td>
                    <td  style="width:100%">{{ $cites->customer->Razon_Social }}</td>
                    <td  style="width:100%">{{ $cites->customer->Telefono }}</td>
                    <td>{{ $cites->customer->DNI }}</td>
                    <td>{{ $cites->proyecto }}</td>
                    <td>{{ $cites->manzana }}</td>
                    <td>{{ $cites->lote }}</td>

                    <td>{{ $cites->fecha }}</td>
                    <td>{{ $cites->hora }}</td>
                    <td>{{ $cites->fecha_repro }}</td>
                    <td>{{ $cites->hora_repro }}</td>
                    <td>{{ $cites->motivo }}</td>



                    @php

                        $estadoFecha = '';

                        // Verificar si el estado NO es 'Atendido', 'Cerrado' o 'Finalizado'
                        if (!in_array($cites->estado, ['Atendido', 'Cerrado', 'Finalizado'])) {
                            // Obtener la fecha actual en la zona horaria correcta
                            $fecha_actual = \Carbon\Carbon::now('America/Lima');

                            // Convertir `fecha_cita` y `fecha_repro` en objetos \Carbon\Carbon (solo si son fechas válidas)
                            $fecha_cita =
                                strtotime($cites->fecha) !== false
                                    ? \Carbon\Carbon::parse($cites->fecha, 'America/Lima')
                                    : null;
                            $fecha_repro =
                                strtotime($cites->fecha_repro) !== false
                                    ? \Carbon\Carbon::parse($cites->fecha_repro, 'America/Lima')
                                    : null;

                            try {
                                $dias_diferencia = 0;

                                // Calcular la diferencia en días (si hay una fecha válida de reprogramación, usar esa)
                           if ($fecha_repro > $fecha_cita) {
                                $dias_diferencia = $fecha_actual->diffInDays($fecha_repro, false);
                                 }

                                elseif ($fecha_cita > $fecha_repro ) {
                                    $dias_diferencia = $fecha_actual->diffInDays($fecha_cita, false);
                                } elseif($cites->fecha =="Según el Trámite" || $cites->fecha =="Por Definir"|| $cites->fecha ="Otras Solicitudes"){
                                    $estadoFecha = 'Por Definir';
                                }
                                else {
                                    $estadoFecha = 'Por Definir'; // Si ambas fechas son inválidas
                                }

                                // Determinar el estado de la fecha
                                if ($dias_diferencia == 0 && $estadoFecha !="Por Definir") {
                                    $estadoFecha = 'Hoy';
                                } elseif ($dias_diferencia > 0) {
                                    $estadoFecha = "$dias_diferencia días";
                                }

                                else {
                                    $estadoFecha = 'Vencido';
                                }
                            } catch (\Exception $e) {
                                $estadoFecha = 'Error en fecha';
                            }
                        }
                        else{
                            $estadoFecha = 'Atendido'; //
                        }
                    @endphp

                    <td>
                        {{ $estadoFecha }}
                    </td>


                    {{-- <td>{{ $cites->descripcion }}</td> --}}

                    <td>{{ $cites->fechag }}</td>








                </tr>
            @endforeach
        </tbody>

    </table>

</div>



<style>
    .table-responsive-xl {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        /* Suaviza el scroll en dispositivos táctiles */
        display: block;
        /* Asegura que se comporta como un bloque */
    }
</style>




{{-- @if (isset($crit)!="")
<script>

    setTimeout(() => {


}, 500);
  </script>
@endif --}}




