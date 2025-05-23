@extends('template')
@section('content')
    <div class="body-wrapper">
        <div class="">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h1 class="text-primary">Clientes</h1>
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex align-items-center">
                                        <a class="text-muted text-decoration-none d-flex" href="../main/index.html">
                                            <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                            Clientes
                                        </span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="datatables">

                <!-- start File export -->
                <div class="card">
                    <div class="card-body">

                        <p class="card-subtitle mb-3">
                            <!-- success header modal -->
                            @canany(['administrar', 'agregar'])
                                <button type="button" class="btn mb-1 me-1 btn-success"
                                    data-bs-toggle="modal" data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                                    onclick="New();$('#Customer')[0].reset();">
                                    Agregar
                                </button>
                            @endcanany

                        </p>
                        <div class="mb-2">
                            <h4 class="card-title mb-0">Exportar</h4>

                        </div>
                        <div class="table-responsive"id="mycontent">



                            @include('Customer.Customertable')

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
                            Clientes
                        </h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <form action="" method="post" role="form" id="Customer"
                            name="Customer"enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            {{ csrf_field() }}

                            Dni<input name="dni" type="number" class="form-control"value="99999999" required>
                            Paterno<input name="firstname" type="text" class="form-control">
                            Materno<input name="lastname" type="text" class="form-control">
                            Nombres<input name="names" type="text" class="form-control"required>
                            Celular<input type="number" name="cellphone" class="form-control"value="99999999">
                            Mensaje<input type="text" name="message" class="form-control">


                            <br>
                            Proyecto :
                            <select name="project_id" id="project_id"class="form-control">
                                @foreach ($Project as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>

                    </div>
                    <div class="modal-footer">
                        <input type="button" value="Nuevo" class="btn btn-primary"
                            onclick="New();$('#Customer')[0].reset();" name="new">
                        @canany(['administrar', 'agregar'])
                            <input type="button" value="Guardar" class="btn bg-success-subtle text-success "
                                onclick="CustomerStore()" id="create">
                        @endcanany
                        @canany(['administrar', 'actualizar'])
                        <input type="button" value="Modificar" class="btn bg-danger-subtle text-danger"
                            onclick="CustomerUpdate();" id="update">
                        @endcanany
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
