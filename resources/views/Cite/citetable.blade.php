<div class="table-responsive-xl">
<table id="file_export" class=" table table-hover table-bordered table-striped table-responsive">
    <thead>
        <!-- start row -->
        <tr>


            <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                    srcset=""></th>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Cliente</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Hora Final</th>
                    <th>Motivo</th>
                    {{-- <th>Descripción</th> --}}
                    <th>Rol</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Fecha Generada</th>
                    <th>Hora Generada</th>
                    <th>Archivo</th>
                    <th>Comentario Jefe</th>
                    <th>Valor</th>
                    <th>Generado</th>
                    <th>Empresa</th>
                    <th>Proyecto</th>
                    <th>Manzana</th>
                    <th>Lote</th>
                    <th>Fecha Reprogramada</th>
                    <th>Hora Reprogramada</th>
                    <th>Estado Derivación</th>
                    <th>Comentario Derivación</th>
                    <th>Enviado Jefe</th>
                    <th>Enviado Área</th>
                    <th>Motivo Copia</th>
                    <th>Proceso Derivación</th>
                    <th>Confirmar</th>
                    <th>Habilitado</th>



        </tr>
        <!-- end row -->
    </thead>
    <tbody>
        @foreach ($cite as $cites)
            <tr>

                <td>
                    <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="ti ti-dots-vertical fs-6"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">

                            @canany(['administrar', 'editar'])
                                <li>
                                    <a onclick="citeEdit('{{ $cites->id }}'); Up();  return false" data-bs-toggle="modal"
                                        data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                                        class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)">
                                        <i class="fs-4 ti ti-edit"></i>Editar
                                    </a>
                                </li>
                            @endcanany
                            @canany(['administrar', 'eliminar'])
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"
                                onclick="citeDestroy('{{ $cites->id }}'); return false">
                                    <i class="fs-4 ti ti-trash"></i>Delete
                                </a>
                            </li>
                            @endcanany
                        </ul>
                    </div>

                </td>





                <td>{{ $cites->id_cita }}</td>
                <td>{{ $cites->codigo }}</td>
                <td>{{ $cites->id_cliente }}</td>
                <td>{{ $cites->tipo }}</td>
                <td>{{ $cites->fecha }}</td>
                <td>{{ $cites->hora }}</td>
                <td>{{ $cites->hora_final }}</td>
                <td>{{ $cites->motivo }}</td>
                {{-- <td>{{ $cites->descripcion }}</td> --}}
                <td>{{ $cites->id_rol }}</td>
                <td>{{ $cites->id_usuario }}</td>
                <td>{{ $cites->estado }}</td>
                <td>{{ $cites->fechag }}</td>
                <td>{{ $cites->horag }}</td>
                <td>{{ $cites->archivo }}</td>
                <td>{{ $cites->comentario_jefe }}</td>
                <td>{{ $cites->valor }}</td>
                <td>{{ $cites->generado }}</td>
                <td>{{ $cites->empresa }}</td>
                <td>{{ $cites->proyecto }}</td>
                <td>{{ $cites->manzana }}</td>
                <td>{{ $cites->lote }}</td>
                <td>{{ $cites->fecha_repro }}</td>
                <td>{{ $cites->hora_repro }}</td>
                <td>{{ $cites->estado_derivacion }}</td>
                <td>{{ $cites->comentario_derivacion }}</td>
                <td>{{ $cites->enviado_jefe }}</td>
                <td>{{ $cites->enviado_area }}</td>
                <td>{{ $cites->motivo_copia }}</td>
                <td>{{ $cites->proceso_derivacion }}</td>
                <td>{{ $cites->confirmar }}</td>
                <td>{{ $cites->habilitado }}</td>





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






    <script>

      </script>
