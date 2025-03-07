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



                            @include('Cite.citetable')

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
                            <div class="col-12 col-sm-4 mt-2">

                                <label for=""
                                    class="control-label border-bottom border-primary custom-cursor-default-hover">Razón
                                    Social</label>
                                <li class="d-flex align-items-center gap-2 mb-4">
                                    <span class="p-1 rounded-circle text-bg-primary"></span>
                                    <span id="razon_social"></span>
                                </li>
                            </div>
                            <div class="col-12 col-sm-4">
                                <label for=""
                                    class="control-label border-bottom border-primary custom-cursor-default-hover">Teléfono</label>
                                <li class="d-flex align-items-center gap-2 mb-4">
                                    <span class="p-1 rounded-circle text-bg-primary"></span>
                                    <span id="telefono"></span>
                                </li>
                            </div>
                            <div class="col-12 col-sm-4">
                                <label for=""
                                    class="control-label border-bottom border-primary custom-cursor-default-hover">DNI/CE</label>
                                <li class="d-flex align-items-center gap-2 mb-4">
                                    <span class="p-1 rounded-circle text-bg-primary"></span>
                                    <span id="dni"></span>
                                </li>
                            </div>
                            <div class="col-12 col-sm-4">
                                <label for=""
                                    class="control-label border-bottom border-primary custom-cursor-default-hover">Lote</label>
                                <li class="d-flex align-items-center gap-2">
                                    <span class="p-1 rounded-circle text-bg-primary"></span>
                                    <span id="lote"></span>
                                </li>
                            </div>
                            <div class="col-12 col-sm-4">
                                <label for=""
                                    class="control-label border-bottom border-primary custom-cursor-default-hover">Manzana</label>
                                <li class="d-flex align-items-center gap-2 mb-4">
                                    <span class="p-1 rounded-circle text-bg-primary"></span>
                                    <span id="manzana"></span>
                                </li>
                            </div>
                            <div class="col-12 col-sm-4 mt-2">

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
                                    {{-- <button type="button" class="btn btn-primary w-10 ti ti-calendar-plus fs-3"
                                        id="aumentar"
                                        onclick="document.getElementById('fecha_cita_update').style.display='block';
                document.getElementById('fecha_cita').style.display='none'"></button> --}}


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
                                    <button
                                        onclick="document.getElementById('hora_cita_update').style.display='block';
                document.getElementById('hora_cita').style.display='none'
                document.getElementById('fecha_cita_update').style.display='block';
                document.getElementById('fecha_cita').style.display='none'"
                                        type="button" class="btn btn-primary w-10 ti ti-calendar-plus fs-3"
                                        id="btn_fecha_hora"></button>
                                </li>
                            </div>
                            <div class="col-12 col-sm-3 mt-2">

                                <label for=""
                                    class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha
                                    Reprogramada</label>
                                <li class="d-flex align-items-center gap-2 mb-4">
                                    <span class="p-1 rounded-circle text-bg-primary"></span>

                                    <input type="date" id="fecha_repro_update"name="fecha_repro_update"
                                        value="dd-mm-yyyy" class="form-control w-70" style="display:none">
                                    <span id="fecha_repro"></span>

                                    {{-- <button type="button" class="btn btn-primary w-10 ti ti-calendar-plus fs-3"
                                        onclick="document.getElementById('fecha_repro_update').style.display='block';
                document.getElementById('fecha_repro').style.display='none'"></button> --}}
                                </li>
                            </div>
                            <div class="col-12 col-sm-3">
                                <label for=""
                                    class="control-label border-bottom border-primary custom-cursor-default-hover">Hora
                                    Reprogramada</label>
                                <li class="d-flex align-items-center gap-2">
                                    <span class="p-1 rounded-circle text-bg-primary"></span>

                                    <input type="time" id="hora_repro_update"name="hora_repro_update"
                                        class="form-control w-70" style="display:none">
                                    <span id="hora_repro"></span>
                                    <button
                                        onclick="document.getElementById('hora_repro_update').style.display='block';
            document.getElementById('hora_repro').style.display='none'
            document.getElementById('fecha_repro_update').style.display='block';
                document.getElementById('fecha_repro').style.display='none'"
                                        type="button" class="btn btn-primary w-10 ti ti-calendar-plus fs-3"></button>
                                </li>
                            </div>
                            <div class="col-12 mb-2" style="width:100%">
                                <button class="btn btn-primary w-100" id="actualizarBtn"
                                    onclick="citeUpdate();return false">Actualizar
                                    Cita</button>

                            </div>

                        </div>
                    </div>





                    <div class="card bg-white"style="border: solid 1px #054988">
                        <div class="container  row">
                            <h4 class="mb-4 mb-md-0 card-title">Asunto</h4>
                            <div class="col-12 col-sm-12 mt-2">

                                <label for=""
                                    class="control-label border-bottom border-primary custom-cursor-default-hover">Detalle
                                    de
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
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label for="control-label" style="color: #000; margin-bottom: 2vh;">¿En qué estado se
                                        encuentra la Cita generada?</label>
                                    <select class="form-control mb-4" name="estado">
                                        <option selected disabled>Seleccione el Estado</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="Proceso">Proceso</option>
                                        <option value="Atendido">Atendido</option>
                                        <option value="Observado">Observado</option>
                                        <option value="Finalizado">Finalizado</option>
                                        <option value="Cerrado">Cerrado</option>
                                    </select>
                                </div>
                                <div class="col-6 pt-4 text-end">
                                    <button type="button" class="btn bg-success text-white fs-5" id="guardarBtn"
                                        onclick="commentStore();">
                                        Guardar
                                    </button>
                                    <button type="button" class=" btn bg-danger text-white fs-5"
                                        data-bs-dismiss="modal">
                                        Cerrar
                                    </button>
                                </div>
                            </div>


                            <label for="control-label" style="color: #000; margin-bottom: 2vh;">Comentario</label>
                            <textarea class="form-control" rows="6" name="comentario" style=""></textarea>


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





            </div>

        </div>


    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal-dialog -->
    </div>

    <script>
function validateDateTime() {
    let fechaInput = document.getElementById("fecha_cita_update");
    let horaInput = document.getElementById("hora_cita_update");
    let btn = document.getElementById("btn_fecha_hora");

    // Expresión regular para validar formato de fecha YYYY-MM-DD
    let fechaValida = /^\d{4}-\d{2}-\d{2}$/.test(fechaInput.value);
    // Expresión regular para validar formato de hora HH:MM (24 horas)
    let horaValida = /^([01]\d|2[0-3]):[0-5]\d$/.test(horaInput.value);

    if (fechaValida && horaValida) {
        btn.style.display = "none";

    } else {
        btn.style.display = "block";

    }
}


        </script>
@endsection
