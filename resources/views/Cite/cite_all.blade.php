@extends('template_no_login')
@section('content')
    <div class="body-wrapper">
        <div class="">
            <div class="card card-body py-3">
                <form action=""id="cite_filter" name="cite_filter">

                    <h2 class="text-primary">Listado de Citas</h2>
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body pb-0" data-simplebar="init">
                                    <div class="simplebar-wrapper">
                                        <div class="simplebar-content">
                                            <div class="row flex-nowrap">
                                                <div class="col">
                                                    <div class="card " style="background: rgba(0, 17, 255, 0.089);">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded   flex-shrink-0 mb-3 mx-auto"style="background: rgb(0,18,255);">
                                                                <iconify-icon icon="solar:card-linear"
                                                                    class="fs-10 text-white"></iconify-icon>
                                                            </div>
                                                            <span class="fw-normal fs-3 mb-1 text-black">Total</span>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1 text-black">
                                                                {{ $total_cite }}</h4>
                                                            <a href="{{ url('citas/Todos') }}" class="btn btn-warning"
                                                                style="border: solid 1px white;width:100%">Ver</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="card success-gradient">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded text-bg-success flex-shrink-0 mb-3 mx-auto">
                                                                <iconify-icon icon="solar:users-group-rounded-linear"
                                                                    class="fs-10 text-white"></iconify-icon>
                                                            </div>
                                                            <span class="fw-normal fs-3 mb-1 text-black">Pendiente</span>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1 text-black">
                                                                {{ $total_pendiente }}</h4>
                                                            <a target="_blank" href="{{ url('citas/Pendiente') }}"
                                                                class="btn btn-success"
                                                                style="border: solid 1px white;width:100%">Ver</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="card" style="background-color: #743dda2a;">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded flex-shrink-0 mb-3 mx-auto text-white"style="background-color:#6f42c1">
                                                                <iconify-icon icon="solar:siderbar-linear"
                                                                    class="fs-10 text-white"></iconify-icon>
                                                            </div>
                                                            <span class="fw-normal fs-3 mb-1 text-black">Proceso</span>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1 text-black">
                                                                {{ $total_proceso }}</h4>
                                                            <a target="_blank" href="{{ url('citas/Proceso') }}"
                                                                class="btn text-white"
                                                                style="border: solid 1px white;width:100%;background-color:#6f42c1">Ver</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="card  info-graddient">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded   flex-shrink-0 mb-3 mx-auto bg-info"style=" ">
                                                                <iconify-icon icon="solar:library-linear"
                                                                    class="fs-10 text-white"></iconify-icon>
                                                            </div>
                                                            <span class="fw-normal fs-3 mb-1">Atendido</span>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1 text-black">
                                                                {{ $total_atendido }}</h4>
                                                            <a target="_blank" href="{{ url('citas/Atendido') }}"
                                                                class="btn bg-info text-white"
                                                                style="border: solid 1px white;width:100%;background-color:#1cbcaf">Ver</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="card secondary-gradient">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded text-bg-secondary flex-shrink-0 mb-3 mx-auto">
                                                                <iconify-icon icon="solar:card-2-linear"
                                                                    class="fs-10 text-white"></iconify-icon>
                                                            </div>
                                                            <span class="fw-normal fs-3 mb-1">Derivado</span>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1 text-black">
                                                                {{ $total_derivado }}</h4>
                                                            <a target="_blank" href="{{ url('citas/Derivado') }}"
                                                                class="btn btn-secondary"
                                                                style="border: solid 1px white;width:100%">Ver</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="card danger-gradient">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded text-bg-danger flex-shrink-0 mb-3 mx-auto">
                                                                <iconify-icon icon="solar:notification-lines-remove-linear"
                                                                    class="fs-10 text-white"></iconify-icon>
                                                            </div>
                                                            <span class="fw-normal fs-3 mb-1">Observado</span>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1 text-black">
                                                                {{ $total_observado }}</h4>
                                                            <a target="_blank" href="{{ url('citas/Observado') }}"
                                                                class="btn btn-danger"
                                                                style="border: solid 1px white;width:100%">Ver</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="card" style="background-color: #e7e7e7;">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded flex-shrink-0 mb-3 mx-auto text-black">
                                                                <iconify-icon icon="solar:checklist-minimalistic-linear"
                                                                    class="fs-10 text-black"></iconify-icon>
                                                            </div>
                                                            <span class="fw-normal fs-3 mb-1 text-black">Finalizado</span>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1 text-black">
                                                                {{ $total_finalizado }}</h4>
                                                            <a target="_blank" href="{{ url('citas/Finalizado') }}"
                                                                class="btn text-black"
                                                                style="border: solid 1px white;width:100%">Ver</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="card bg-dark text-white">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded text-bg-dark flex-shrink-0 mb-3 mx-auto">
                                                                <iconify-icon icon="solar:card-transfer-linear"
                                                                    class="fs-10 text-white"></iconify-icon>
                                                            </div>
                                                            <span class="fw-normal fs-3 mb-1 text-white">Cerrado</span>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1">
                                                                {{ $total_cerrado }}</h4>
                                                            <a target="_blank" href="{{ url('citas/Cerrado') }}"
                                                                class="btn btn-dark"
                                                                style="border: solid 1px white;width:100%">Ver</a>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <span>* Elegir <b>Filtrar por Fecha</b> para aplicar el cambio</span>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-dark text-white" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    Filtros Avanzados (Expandible)
                                </button>

                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse  "
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <!-- Primera Fila -->
                                    <div class="row text-center">
                                        <!-- Motivo -->
                                        <!-- Botón Filtrar -->
                                        <div class="col-4">
                                            <label for="area" class="form-label fw-bold">Áreas</label>
                                            <select name="area" id="area" class="form-control"
                                                onchange="filterMotivoArea(this)">
                                                <option value="" {{ request('area') == '' ? 'selected' : '' }}>Todo
                                                </option>
                                                <option value="null" {{ request('area') == 'null' ? 'selected' : '' }}>
                                                    Sin área</option>
                                                @foreach ($areas as $a)
                                                    <option value="{{ $a->id_area }}"
                                                        {{ request('area') == $a->id_area ? 'selected' : '' }}>
                                                        {{ $a->descripcion }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <!-- Tipo -->

                                        <div class="col-4">
                                            <label for="motivo" class="form-label fw-bold">Motivo</label>
                                            <select name="motivo" id="motivo" class="form-control">
                                                <option value="" {{ request('motivo') == '' ? 'selected' : '' }}>
                                                    Todos</option>
                                                @foreach ($motivos as $m)
                                                    <option value="{{ $m->nombre_motivo }}"
                                                        {{ request('nombre_motivo') == $m->nombre_motivo ? 'selected' : '' }}>
                                                        {{ $m->nombre_motivo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-4">
                                            <label for="tipo" class="form-label fw-bold">Tipos</label>
                                            <select name="tipo" id="tipo" class="form-control">
                                                <option value="" {{ request('tipo') == '' ? 'selected' : '' }}>Todos
                                                </option>
                                                @foreach ($tipos as $t)
                                                    <option value="{{ $t->tipo }}"
                                                        {{ request('tipo') == $t->tipo ? 'selected' : '' }}>
                                                        {{ $t->tipo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Fecha de Cita -->
                                    <div class="mt-3 row text-center align-items-center">
                                        <div class="col-1 text-start">
                                            <label class="fw-bold">Fecha de Cita</label>
                                        </div>
                                        <div class="col-1">

                                            <select name="date_cite" id="date_cite" class="form-control"
                                                onchange="activateInput()">
                                                <option value="%" {{ request('date_cite') == '' ? 'selected' : '' }}>
                                                    Todo</option>
                                                <option value="Vence_hoy"
                                                    {{ request('date_cite') == 'Vence_hoy' ? 'selected' : '' }}>Vence Hoy
                                                </option>
                                                <option value="Ni Definir ni segun tramite"
                                                    {{ request('date_cite') == 'Ni Definir ni segun tramite' ? 'selected' : '' }}>
                                                    Ni Definir ni segun tramite</option>
                                                <option value="Por Definir"
                                                    {{ request('date_cite') == 'Por Definir' ? 'selected' : '' }}>Por
                                                    Definir</option>
                                                <option value="Segun_tramite"
                                                    {{ request('date_cite') == 'Segun_tramite' ? 'selected' : '' }}>Según
                                                    el Trámite</option>
                                                <option value="Filtrar por Fecha"
                                                    {{ request('date_cite') == 'Filtrar por Fecha' ? 'selected' : '' }}>
                                                    Filtrar por Fecha</option>
                                            </select>
                                        </div>


                                        <script defer>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                activateInput(); // Ejecuta la función al cargar la página
                                                document.getElementById("date_cite").addEventListener("change",
                                                    activateInput); // Escucha cambios en el select
                                            });

                                            function activateInput() {

                                                let date_cite_value = document.getElementById("date_cite").value;

                                                let date_start = document.getElementById("date_start");
                                                let date_end = document.getElementById("date_end");
                                                if (date_cite_value == "Filtrar por Fecha") {
                                                    date_start.disabled = false;
                                                    date_end.disabled = false;
                                                } else {
                                                    date_start.disabled = true;
                                                    date_end.disabled = true;
                                                }
                                                // if (date_cite_value != "Filtrar por Fecha") {
                                                //     date_start.disabled = true;
                                                //     date_end.disabled = true;
                                                // }
                                            }
                                        </script>



                                        <div class="col-1">

                                            <input type="date" name="date_start"id="date_start" class="form-control"
                                                value="{{ request('date_start') }}"disabled>
                                        </div>
                                        <div class="col-1">

                                            <input type="date" name="date_end"id="date_end" class="form-control"
                                                value="{{ request('date_end') }}"disabled>
                                        </div>

                                        <div class="col-2 text-start">
                                            <label class="fw-bold">Fecha Generada</label>
                                        </div>
                                        <div class="col-1">

                                            <input type="date" name="date_start_gen" class="form-control"
                                                value="{{ request('date_start_gen') }}">
                                        </div>
                                        <div class="col-1">

                                            <input type="date" name="date_end_gen" class="form-control"
                                                value="{{ request('date_end_gen') }}">
                                        </div>

                                        <div class="col-1 text-start">
                                            <label class="fw-bold">Fecha Reprogramación</label>
                                        </div>
                                        <div class="col-1">
                                            <select name="date_reprog" id="date_reprog"
                                                class="form-control"onchange="activateInput_2();">
                                                <option value=""
                                                    {{ request('date_reprog') == '' ? 'selected' : '' }}>Todo</option>
                                                <option value="Vence_hoy"
                                                    {{ request('date_repro') == 'Vence_hoy' ? 'selected' : '' }}>Vence Hoy
                                                </option>
                                                <option value="Con Reprogramación"
                                                    {{ request('date_reprog') == 'Con Reprogramación' ? 'selected' : '' }}>
                                                    Con Reprogramación</option>
                                                <option value="Sin Reprogramación"
                                                    {{ request('date_reprog') == 'Sin Reprogramación' ? 'selected' : '' }}>
                                                    Sin Reprogramación</option>
                                                <option value="Segun_tramite"
                                                    {{ request('date_reprog') == 'Segun_tramite' ? 'selected' : '' }}>Según
                                                    el Trámite</option>
                                                <option value="Filtrar por Fecha"
                                                    {{ request('date_reprog') == 'Filtrar por Fecha' ? 'selected' : '' }}>
                                                    Filtrar por Fecha</option>
                                            </select>
                                        </div>




                                        <script defer>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                activateInput_2(); // Ejecuta la función al cargar la página
                                                document.getElementById("date_reprog").addEventListener("change",
                                                    activateInput_2); // Escucha cambios en el select
                                            });

                                            function activateInput_2() {

                                                let date_reprog_value = document.getElementById("date_reprog").value;

                                                let date_start_reprog = document.getElementById("date_start_reprog");
                                                let date_end_reprog = document.getElementById("date_end_reprog");
                                                if (date_reprog_value == "Filtrar por Fecha") {
                                                    date_start_reprog.disabled = false;
                                                    date_end_reprog.disabled = false;
                                                } else {
                                                    date_start_reprog.disabled = true;
                                                    date_end_reprog.disabled = true;
                                                }
                                                // if (date_cite_value != "Filtrar por Fecha") {
                                                //     date_start.disabled = true;
                                                //     date_end.disabled = true;
                                                // }
                                            }
                                        </script>










                                        <div class="col-1">

                                            <input type="date" name="date_start_reprog" id="date_start_reprog"
                                                class="form-control" value="{{ request('date_start_reprog') }}" disabled>
                                        </div>
                                        <div class="col-1">

                                            <input type="date" name="date_end_reprog"id="date_end_reprog"
                                                class="form-control" value="{{ request('date_end_reprog') }}" disabled>
                                        </div>

                                    </div>






                                    {{-- <div class="mt-3 row text-start align-items-center">

                                        <div class="col-4 text-start">
                                            <label class="fw-bold">Todo / Vencido</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="vencer" id="vencer" class="form-control">
                                                <option value="%" {{ request('vencer') == '' ? 'selected' : '' }}>Todo</option>

                                                <option value="Vencido" {{ request('vencer') == 'Vencido' ? 'selected' : '' }}>Vencido</option>

                                            </select>
                                        </div>

                                    </div> --}}




                                    <div class="mt-3 row text-start align-items-center">

                                        <div class="col-12">
                                            <button type="submit" class="w-100 btn btn-success">Filtrar</button>
                                        </div>
                                    </div>

                                </div>
                            </div>




                        </div>
                    </div>
                </form>
            </div>

            <div class="datatables">

                <!-- start File export -->
                <div class="card">
                    <div class="card-body">

                        <p class="card-subtitle ">

                            <!-- success header modal -->

                        </p>
                        <div class="mb-2">
                            <h4 class="card-title mb-0">Exportar</h4>
                            <button type="button" class="btn mb-0  btn-primary" style="width:300px"
                                onclick="exportarExcelConFiltros()">
                                Exportar Filtrado - Excel
                            </button>

                            <script>
                                function exportarExcelConFiltros() {
                                    let urlParams = new URLSearchParams(window.location.search);

                                    // Obtener el estado desde la URL (último segmento después de "/")
                                    let pathSegments = window.location.pathname.split('/');
                                    let estado = pathSegments[pathSegments.length - 1]; // Último valor en la URL

                                    // Construir la URL de exportación con los filtros actuales
                                    let exportUrl = `/exportar-citas/${estado}?` + urlParams.toString();

                                    // Redirigir a la URL para descargar el archivo
                                    window.location.href = exportUrl;
                                }
                            </script>
                        </div>
                        <div class="table-responsive"id="mycontent">



                            @include('Cite.citetable_all')

                        </div>
                        <style>
                            .relative svg {
                                width: 44px;
                                /* Ajusta el tamaño del icono */
                                height: 44px;
                            }

                            .hidden div p {
                                display: none;

                            }

                            .hidden div {
                                margin: 20px
                            }
                        </style>
                        <div class="mt-5 d-flex justify-content-start" style="height:20px;width:100%">
                            {{ $cite->links() }}
                        </div>
                    </div>
                </div>


                <!-- end Language file -->

                <!-- end Setting defaults -->


                <!-- end Custom toolbar elements -->
            </div>
        </div>
    </div>

    <div class="button-group">


        <!-- /.modal -->
        <!-- danger header modal -->

        <!-- /.modal -->

        <!-- /.modal -->

        <!-- success Header Modal -->

        <!-- /.modal -->


        <!-- /.modal -->
    </div>

    <!-- /.modal----------------------------------------------------------------------------------------------- -->

    <div class="modal fade" id="success-header-modal" tabindex="-1" aria-labelledby="bs-example-modal-lg"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title h4" id="exampleModalFullscreenLabel">
                    Detalles de la Cita
                </h5>
                <button type="button" class="text-end btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>

                <form role="form" id="cite" name="cite"enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_cita" id="id_cita">
                    <p></p>



            </div>

            <div class="modal-body row container"
                style="margin-left: 0; margin-right: 0; border-right: 1px solid #ededed; box-shadow:0px 0px 5px -1px #a7a7a7; border-radius: 12px;">

                <div class="card bg-white"style="border: solid 1px #054988">
                    <div class="container  row">
                        <h4 class="mb-4 mt-4 mb-md-0 card-title">Datos de cliente</h4>
                        <div class="col-12 col-sm-3 mt-2">

                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Razón
                                Social</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="razon_social"></span>
                            </li>
                        </div>
                        <div class="col-12 col-sm-2">
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Teléfono</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="telefono"></span>
                            </li>
                        </div>
                        <div class="col-12 col-sm-2">
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">DNI/CE</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="dni"></span>
                            </li>
                        </div>
                        <div class="col-12 col-sm-2">
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Lote</label>
                            <li class="d-flex align-items-center gap-2">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="lote"></span>
                            </li>
                        </div>
                        <div class="col-12 col-sm-2">
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Manzana</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="manzana"></span>
                            </li>
                        </div>
                        <div class="col-12 col-sm-4 mt-2">

                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Email</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="email"></span>
                            </li>
                        </div>

                        <div class="col-12 col-sm-2 mt-2">

                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Departamento</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="departamento"></span>
                            </li>
                        </div>
                        <div class="col-12 col-sm-2 mt-2">

                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Provincia</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="provincia"></span>
                            </li>
                        </div>
                        <div class="col-12 col-sm-2 mt-3">

                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Distrito</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="distrito"></span>
                            </li>
                        </div>
                        <div class="col-12 col-sm-2 mt-2">

                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Encargado</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="encargado"></span>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="card bg-white"style="border: solid 1px #054988">
                    <div class="container  row">

                        <h4 class="mb-4 mb-md-0 card-title mt-4">Datos de la Cita</h4>
                        <div class="col-12 col-sm-4  mt-2">

                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Codigo</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="codigo"></span>
                                <!-- valor aqui-->
                            </li>
                        </div>
                        <div class="col-12 col-sm-8">
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Motivo</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="motivo_cita"></span>
                            </li>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Archivo
                            </label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="archivo" class="text-primary" style="cursor: pointer;">Ver</span>
                            </li>
                        </div>
                        <div class="col-12 col-sm-8">
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Tipo</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="tipo_cita"></span>
                            </li>
                        </div>




                    </div>
                </div>


                <div class="card bg-white"style="border: solid 1px #054988">
                    <div class="container  row">
                        <h4 class=" card-title mt-4">Programación de la Cita</h4>
                        <div class="col-12 col-sm-3  mt-2">

                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha de
                                Cita</label>
                            <li class="d-flex align-items-center gap-2 mb-3">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <input type="date" id="fecha_cita_update"name="fecha_cita_update"
                                    value="dd-mm-yyyy" class="form-control w-70" style="display:none">
                                <span id="fecha_cita"></span>



                            </li>
                        </div>
                        <div class="col-12 col-sm-3 mt-2">
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Hora de
                                Cita</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <input type="time" id="hora_cita_update"name="hora_cita_update"
                                    class="form-control w-70" style="display:none">
                                <span id="hora_cita"></span>

                            </li>
                        </div>
                        <div class="col-12 col-sm-3 mt-2">

                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha
                                Reprogramada</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="fecha_repro"></span>
                            </li>
                        </div>
                        <div class="col-12 col-sm-3">
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Hora
                                Reprogramada</label>
                            <li class="d-flex align-items-center gap-2">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="hora_repro"></span>
                            </li>
                        </div>
                    </div>
                </div>





                <div class="card bg-white"style="border: solid 1px #054988">
                    <div class="container  row">
                        <h4 class="mb-4 mb-md-0 card-title mt-3">Asunto</h4>
                        <div class="col-12 col-sm-12 mt-2">

                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Detalle de
                                Cita</label>
                            <li class="d-flex align-items-center gap-2">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="descripcion"></span>
                            </li>
                            <p></p>
                        </div>

                    </div>
                </div>


                <div class="text-end mt-1">
                    <span>*Esta cita ha sido generada el día <span id="fecha_creada"></span> a las <span
                            id="hora_creada"></span> horas.</span>
                </div>
                <div class="row border-bottom border-primary mb-4"
                    style="padding-bottom: 4vh; margin-left: 0; margin-right: 0;">
                </div>
                </form>
                <div class="estado_desc mb-2">
                    <form id="comment_form">

                </div>




                <div class="row mb-3" id="comentariosContainer"
                    style="overflow-y: auto; height: 38vh; box-shadow: 0px 1px 5px -1px #a7a7a7; background: white; padding: 0; margin: 0;">
                </div>



                <div class="" style="justify-content:space-between">
                    <div>


                    </div>
                </div>
                </form>
            </div>

            <button type="button" class=" btn bg-danger text-white fs-5" data-bs-dismiss="modal"
            >
            Cerrar
        </button>



        </div>

    </div>


</div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <script defer>
        document.addEventListener("DOMContentLoaded", function () {
            let boton = document.getElementById("btn_enviar_correo_cita");

            if (boton) {
                boton.style.display = "none"; // Oculta el botón si existe
            }
        });




        function citeEdit_all(id) {
    var formData = new FormData(document.getElementById("cite_filter"));
    formData.append("id", id);
    axios({
      method: "post",
      url: "../citeEdit",
      data: formData,
      headers: {
        "Content-Type": "multipart/form-data"
      }
    })
      .then(function(response) {
        //handle success
        //var contentdiv = document.getElementById("mycontent");
        var id_cita = document.getElementById("id_cita");
        id_cita.value = id;
        var descripcion = document.getElementById("descripcion");
        descripcion.innerHTML = response.data["descripcion"] || "Sin Dato";

        var codigo = document.getElementById("codigo");
        codigo.innerHTML = response.data["codigo"] || "Sin Dato";
        var razon_social = document.getElementById("razon_social");
        razon_social.innerHTML = response.data.customer.Razon_Social || "Sin Dato";

        var hora_cita = document.getElementById("hora_cita");
        var hora_cita_update = document.getElementById("hora_cita_update");

        hora_cita.innerHTML = response.data["hora"] || "Sin Dato";
        hora_cita_update.value = response.data["hora"] || "Sin Dato";


        var motivo = document.getElementById("motivo_cita");
        motivo.innerHTML = response.data["motivo"] || "Sin Dato";

        var manzana = document.getElementById("manzana");
        manzana.innerHTML = response.data["manzana"] || "Sin Dato";

        var fecha_cita = document.getElementById("fecha_cita");
        var fecha_cita_update = document.getElementById("fecha_cita_update");
        fecha_cita_update.value = response.data["fecha"] || "Sin Dato";
        fecha_cita.innerHTML = response.data["fecha"] || "Sin Dato";

        var encargado = document.getElementById("encargado");
        encargado.innerHTML = response.data["generado"] || "Sin Dato";
        var lote = document.getElementById("lote");
        lote.innerHTML = response.data["lote"] || "Sin Dato";
        var dni = document.getElementById("dni");
        dni.innerHTML = response.data.customer["DNI"] || "Sin Dato";
        var hora_creada = document.getElementById("hora_creada");
        hora_creada.innerHTML = response.data["horag"] || "Sin Dato";
        var tipo = document.getElementById("tipo_cita");
        tipo.innerHTML = response.data["tipo"] || "Sin Dato";
        var fecha_repro = document.getElementById("fecha_repro");
        fecha_repro.innerHTML = response.data["fecha_repro"] || "Sin Dato";
        var telefono = document.getElementById("telefono");
        telefono.innerHTML = response.data.customer["Telefono"] || "Sin Dato";
        var fecha_creada = document.getElementById("fecha_creada");
        fecha_creada.innerHTML = response.data["fechag"] || "Sin Dato";
        var hora_repro = document.getElementById("hora_repro");
        hora_repro.innerHTML = response.data["hora_repro"] || "Sin Dato";

        var email = document.getElementById("email");
      email.innerHTML = response.data.customer["Email"] || "Sin Dato";

      var provincia = document.getElementById("provincia");
      provincia.innerHTML = response.data.customer["Provincia"] || "Sin Dato";

      var departamento = document.getElementById("departamento");
      departamento.innerHTML = response.data.customer["Departamento"] || "Sin Dato";

      var distrito = document.getElementById("distrito");
      distrito.innerHTML = response.data.customer["Distrito"] || "Sin Dato";


        var archivo = document.getElementById("archivo");
        if (!response.data["archivo"]) {
          archivo.innerHTML = "No hay archivo disponible";
        } else {
          archivo.innerHTML =
            "<a target='_blank' href='https://atenciones.aybarsac.com/php/ver_pdf.php?file=" +
            response.data["archivo"] +
            "'>Ver Archivo</a> ";
        }

        var comentarios = response.data.comment;
        var comentariosHTML = '';
        if (Array.isArray(comentarios) && comentarios.length > 0) {
          // Agregar el título una sola vez
          comentariosHTML += `
              <label for="control-label" style="color: #000; margin-bottom: 2vh; margin-top: 2vh;">Historial de respuestas al Cliente (Ordenado desde el más reciente)</label>
          `;

          // Generar el HTML para cada comentario
          comentarios.forEach(function(comentario) {
            // Determinar la clase del badge según el estado
            var badgeClass = "";
            switch (comentario.estado) {
              case "Pendiente":
                badgeClass = "text-bg-success";
                break;
              case "Proceso":
                badgeClass = "text-bg-primary";
                break;
              case "Atendido":
                badgeClass = "text-bg-info";
                break;
              case "Observado":
                badgeClass = "text-bg-danger";
                break;
              case "Finalizado":
                badgeClass = "text-bg-light";
                break;
              case "Cerrado":
                badgeClass = "text-bg-dark";
                break;
              default:
                badgeClass = "text-bg-secondary"; // Clase por defecto
                break;
            }

            comentariosHTML += `
                  <div class="col-md-6 col-lg-12">
                      <div class="card">
                          <div class="card-body">
                              <div class="d-flex" style="justify-content: space-between;">
                                  <p class="card-subtitle mb-2 d-flex align-items-center">
                                      <i class="ti ti-calendar me-1 fs-5"></i> ${comentario.fecha}
                                  </p>
                                  <p class="card-subtitle mb-2 d-flex align-items-center">
                                      <span class="mb-1 badge ${badgeClass}">${comentario.estado}</span>
                                  </p>
                                  <p class="card-subtitle mb-2 d-flex align-items-center">
                                      <i class="ti ti-clock-hour-3 me-1 fs-5"></i> ${comentario.hora}
                                  </p>
                              </div>
                              <p class="card-text pt-2">${comentario.comentario}</p>
                              <div class="comment-image-container text-center">
                                  ${
                                    comentario.archivo
                                      ? `
                                      ${
                                        comentario.archivo.toLowerCase().endsWith(".pdf")
                                          ? `
                                          <a href="php/ver_archivothree.php?file=${comentario.archivo}" target="_blank">
                                              <img class="mb-3" src="imagen/documento.png" width="200" height="200" alt="Documento PDF">
                                          </a>
                                      `
                                          : `
                                          <a href="php/ver_imagenthree.php?file=${comentario.archivo}" target="_blank">
                                              <img class="mb-3" src="php/ver_imagenthree.php?file=${
                                                comentario.archivo
                                              }" width="300" height="200" alt="Imagen">
                                          </a>
                                      `
                                      }
                                  `
                                      : ""
                                  }
                              </div>

                          </div>
                      </div>
                  </div>`;
          });
        } else {
          comentariosHTML = '<div class="col-12"><p>No se encontraron comentarios.</p></div>';
        }

        // Colocar el HTML en el contenedor deseado
        $("#comentariosContainer").html(comentariosHTML); // Asegúrate de tener un contenedor con este ID
      })
      .catch(function(response) {
        //handle error
        console.log(response);
      });
  }
    </script>

@endsection
