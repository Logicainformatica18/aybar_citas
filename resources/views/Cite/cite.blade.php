@extends('template_no_login')
@section('content')
    <div class="body-wrapper">
        <div class="">
            <div class="card card-body py-3">
                <form action=""id="cite_filter">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h1 class="text-primary">Citas</h1>
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{url('citas/Todos')}}" class="btn btn-warning ">Todos <b class="fs-4" >{{$total_cite}}</b> </a>
                            <a target="_blank" href="{{url('citas/Pendiente')}}" class="btn btn-success">
                                Pendiente
                                <b class="fs-4" >{{$total_pendiente}}</b>
                            </a>
                            <a target="_blank" href="{{url('citas/Proceso')}}" class="btn text-white "style="   background-color: #6f42c1">
                                Proceso
                                <b class="fs-4" >{{$total_proceso}}</b>
                            </a>
                            <a target="_blank" href="{{url('citas/Atendido')}}" class="btn bg-info text-white">
                                Atendido
                                <b class="fs-4" >{{$total_atendido}}</b>
                            </a>
                            <a target="_blank" href="{{url('citas/Derivado')}}" class="btn btn-secondary">
                                Derivado
                                <b class="fs-4" >{{$total_derivado}}</b>
                            </a>
                            <a target="_blank" href="{{url('citas/Observado')}}" class="btn btn-danger">
                                Observado
                                <b class="fs-4" >{{$total_observado}}</b>
                            </a>
                            <a target="_blank" href="{{url('citas/Finalizado')}}" class="btn text-black" style="background-color: #e7e7e7">
                                Finalizado
                                <b class="fs-4" >{{$total_finalizado}}</b>
                            </a>
                            <a target="_blank" href="{{url('citas/Cerrado')}}" class="btn btn-dark">
                                Cerrado
                                <b class="fs-4" >{{$total_cerrado}}</b>
                            </a>
                            <p></p>


                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex align-items-center">
                                        <a class="text-muted text-decoration-none d-flex" href="../main/index.html">
                                            <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                            Citas
                                        </span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                {{-- <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                Datos de la Cita
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <!-- Primera Fila -->
                                <div class="row text-center">
                                    <div class="col-4">
                                        <label for="motivo" class="form-label fw-bold">Motivo</label>
                                        <select name="motivo" id="motivo" class="form-control">
                                            <option value="" disabled selected>Seleccione un Motivo</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="area" class="form-label fw-bold">Área</label>
                                        <select name="area" id="area" class="form-control">
                                            <option value="" disabled selected>Seleccione un Área</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="restante" class="form-label fw-bold">Días Restantes</label>
                                        <select name="restante" id="restante" class="form-control">
                                            <option value="" disabled selected>Seleccione Días Restantes</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Fechas -->
                                <div class="row text-center py-3">
                                    <h6 class="fw-bold">Fechas</h6>
                                </div>

                                <div class="row text-center align-items-center">
                                    <div class="col-4">
                                        <label class="fw-bold">Fecha de Cita</label>
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Inicio</label>
                                        <input type="date" name="date_start" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Fin</label>
                                        <input type="date" name="date_end" class="form-control">
                                    </div>
                                </div>

                                <div class="row text-center align-items-center py-2">
                                    <div class="col-4">
                                        <label class="fw-bold">Fecha de Reprogramación</label>
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Inicio</label>
                                        <input type="date" name="date_start_reprog" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Fin</label>
                                        <input type="date" name="date_end_reprog" class="form-control">
                                    </div>
                                </div>

                                <div class="row text-center align-items-center py-2">
                                    <div class="col-4">
                                        <label class="fw-bold">Fecha Generada</label>
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Inicio</label>
                                        <input type="date" name="date_start_gen" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Fin</label>
                                        <input type="date" name="date_end_gen" class="form-control">
                                    </div>
                                </div>

                                <!-- Horas -->
                                <div class="row text-center py-3">
                                    <h6 class="fw-bold">Horas</h6>
                                </div>

                                <div class="row text-center align-items-center">
                                    <div class="col-4">
                                        <label class="fw-bold">Hora de Cita</label>
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Inicio</label>
                                        <input type="time" name="time_start" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Fin</label>
                                        <input type="time" name="time_end" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </form >
            </div>

            <div class="datatables">

                <!-- start File export -->
                <div class="card">
                    <div class="card-body">

                        <p class="card-subtitle ">

                            <!-- success header modal -->
                            {{-- @canany(["administrar","agregar"])
                            <button type="button" class="btn mb-1 me-1 btn-success"
                                data-bs-toggle="modal" data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                                 onclick="New();$('#cite')[0].reset();">
                                Agregar
                            </button>
                            @endcanany --}}
                        </p>
                        <div class="mb-2">



                            <h4 class="card-title mb-0">Exportar</h4>
                        </div>
                        <div class="table-responsive"id="mycontent">



                            @include('Cite.citetable')

                        </div>
                        <style>
                            .relative svg {
                        width: 44px;  /* Ajusta el tamaño del icono */
                        height: 44px;
                        }
                        .hidden div p{
                            display: none;

                        }
                        .hidden div{
                            margin:20px
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
        <div id="success-header-modal" class="modal fade" tabindex="-1" aria-labelledby="success-header-modalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-success text-white">
                        <h4 class="modal-title text-white" id="success-header-modalLabel">
                            Categorías
                        </h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <form action="" method="post" role="form" id="cite"
                            name="cite"enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            {{ csrf_field() }}

                            Descripción : <input type="text" name="description" id="description" class="form-control">

                            Detalle : <input type="text" name="detail" id="detail" class="form-control">

                    </div>
                    <div class="modal-footer">
                        <input type="button" value="Nuevo" class="btn btn-primary"
                            onclick="New();$('#cite')[0].reset();" name="new">
                        {{-- @canany(['administrar', 'agregar'])<input type="button" value="Guardar" class="btn bg-success-subtle text-success "
                            onclick="citeStore()" id="create">@endcanany
                            @canany(['administrar', 'actualizar'])
                        <input type="button" value="Modificar" class="btn bg-danger-subtle text-danger" onclick="citeUpdate();"
                            id="update">
                            @endcanany --}}
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      </form>







                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <!-- /.modal -->
    </div>
@endsection
