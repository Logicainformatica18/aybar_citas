@extends('template_no_login')
@section('content')
    <div class="body-wrapper">
        <div class="">
            <div class="card card-body py-3">
                <form action=""id="cite_filter" name="cite_filter">
                    @if (Auth::user()->id_rol==1)
                    <h3 class="text-primary">Citas Totales</b>
                    </h3>
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
                                                                {{ $all_cite_count->total }}</h4>
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
                                                                {{ $all_cite_count->total_pendiente }}</h4>
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
                                                                {{ $all_cite_count->total_proceso }}</h4>
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
                                                                {{ $all_cite_count->total_atendido }}</h4>
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
                                                                {{ $all_cite_count->total_derivado }}</h4>
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
                                                                {{ $all_cite_count->total_observado }}</h4>
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
                                                                {{ $all_cite_count->total_finalizado }}</h4>
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
                                                                {{ $all_cite_count->total_cerrado }}</h4>
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
                    @endif

                    <h3 class="text-primary">Citas por : <b class="text-danger"> Área {{ Auth::user()->area->descripcion }}</b>
                    </h3>
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
                                                            <a href="{{ url('citas/Todos?area='.Auth::user()->id_area) }}" class="btn btn-warning"
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
                                                            <a target="_blank" href="{{ url('citas/Pendiente?area='.Auth::user()->id_area) }}"
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
                                                            <a target="_blank" href="{{ url('citas/Proceso?area='.Auth::user()->id_area) }}"
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
                                                            <a target="_blank" href="{{ url('citas/Atendido?area='.Auth::user()->id_area) }}"
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
                                                            <a target="_blank" href="{{ url('citas/Derivado?area='.Auth::user()->id_area) }}"
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
                                                            <a target="_blank" href="{{ url('citas/Observado?area='.Auth::user()->id_area) }}"
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
                                                            <a target="_blank" href="{{ url('citas/Finalizado?area='.Auth::user()->id_area) }}"
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
                                                            <a target="_blank" href="{{ url('citas/Cerrado?area='.Auth::user()->id_area) }}"
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


                    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            var options = {
                                series: [{
                                    name: "Cantidad de Citas",
                                    data: [
                                        {{ $total_cite }},
                                        {{ $total_pendiente }},
                                        {{ $total_proceso }},
                                        {{ $total_atendido }},
                                        {{ $total_derivado }},
                                        {{ $total_observado }},
                                        {{ $total_finalizado }},
                                        {{ $total_cerrado }}
                                    ],
                                }],
                                chart: {
                                    type: "bar",
                                    height: 350,
                                    toolbar: { show: false }
                                },
                                colors: [
                                    "rgba(0, 17, 255, 0.7)", // Total (Azul)
                                    "#198754", // Pendiente (Verde éxito)
                                    "#6f42c1", // Proceso (Morado)
                                    "#1cbcaf", // Atendido (Turquesa)
                                    "#6c757d", // Derivado (Gris)
                                    "#dc3545", // Observado (Rojo)
                                    "#e7e7e7", // Finalizado (Gris claro)
                                    "#212529"  // Cerrado (Negro)
                                ],
                                plotOptions: {
                                    bar: {
                                        distributed: true, // Colores diferentes por barra
                                        dataLabels: {
                                            position: "top"
                                        }
                                    }
                                },
                                dataLabels: {
                                    enabled: true,
                                    style: {
                                        colors: ["#000"]
                                    }
                                },
                                xaxis: {
                                    categories: [
                                        "Total",
                                        "Pendiente",
                                        "Proceso",
                                        "Atendido",
                                        "Derivado",
                                        "Observado",
                                        "Finalizado",
                                        "Cerrado"
                                    ],
                                    labels: { style: { colors: "black" } }
                                },
                                yaxis: {
                                    labels: { style: { colors: "#a1aab2" } }
                                },
                                tooltip: { theme: "dark" },
                                legend: {
                                    show: true,
                                    position: "bottom",
                                    markers: {
                                        fillColors: [
                                            "rgba(0, 17, 255, 0.7)",
                                            "#198754",
                                            "#6f42c1",
                                            "#1cbcaf",
                                            "#6c757d",
                                            "#dc3545",
                                            "#e7e7e7",
                                            "#212529"
                                        ]
                                    },
                                    labels: {
                                        colors: "#a1aab2",
                                        useSeriesColors: true
                                    }
                                }
                            };

                            var chart = new ApexCharts(document.querySelector("#barChart"), options);
                            chart.render();
                        });
                    </script>

                    <div id="barChart"></div>

{{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
<div class="mt-4" id="citasChart"></div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var options = {
            series: [
                {{ $total_cite }},
                                        {{ $total_pendiente }},
                                        {{ $total_proceso }},
                                        {{ $total_atendido }},
                                        {{ $total_derivado }},
                                        {{ $total_observado }},
                                        {{ $total_finalizado }},
                                        {{ $total_cerrado }}
            ],
            chart: {
                type: 'donut',
                height: 350
            },
            labels: ["Total", "Pendiente", "Proceso", "Atendido", "Derivado", "Observado", "Finalizado", "Cerrado"],
            colors: [
                "rgba(0, 17, 255, 0.4)",  // Total
                "rgba(40, 167, 69, 0.8)", // Pendiente (verde)
                "#6f42c1",                // Proceso (morado)
                "#1cbcaf",                // Atendido (celeste)
                "gray",                   // Derivado
                "rgba(220, 53, 69, 0.8)", // Observado (rojo)
                "#e7e7e7",                // Finalizado (gris claro)
                "black"                   // Cerrado (negro)
            ],
            legend: {
                position: 'right'
            },
            dataLabels: {
                enabled: true,
                formatter: function (val, opts) {
                    let total = opts.w.config.series.reduce((a, b) => a + b, 0);
                    let percentage = total > 0 ? ((val / total) * 100).toFixed(2) + "%" : "0%";
                    return opts.w.config.labels[opts.seriesIndex] + ": " + opts.w.config.series[opts.seriesIndex] + " (" + percentage + ")";
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#citasChart"), options);
        chart.render();
    });
</script>





                    <h3 class="text-primary">Citas trabajadas hoy por : <b class="text-danger"> Área {{ Auth::user()->area->descripcion }}</b>
                    </h3>
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
                                                                {{ $today_count->total }}</h4>
                                                            <a href="{{ url('citas/Todos?area='.Auth::user()->id_area.'&atendido=hoy') }}" class="btn btn-warning"
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
                                                                {{ $today_count->total_pendiente }}</h4>
                                                            <a target="_blank" href="{{ url('citas/Pendiente?area='.Auth::user()->id_area.'&atendido=hoy') }}"
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
                                                                {{ $today_count->total_proceso }}</h4>
                                                            <a target="_blank" href="{{ url('citas/Proceso?area='.Auth::user()->id_area.'&atendido=hoy') }}"
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
                                                                {{ $today_count->total_atendido }}</h4>
                                                            <a target="_blank" href="{{ url('citas/Atendido?area='.Auth::user()->id_area.'&atendido=hoy') }}"
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
                                                                {{ $today_count->total_derivado }}</h4>
                                                            <a target="_blank" href="{{ url('citas/Derivado?area='.Auth::user()->id_area.'&atendido=hoy') }}"
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
                                                                {{ $today_count->total_observado }}</h4>
                                                            <a target="_blank" href="{{ url('citas/Observado?area='.Auth::user()->id_area.'&atendido=hoy') }}"
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
                                                                {{ $today_count->total_finalizado }}</h4>
                                                            <a target="_blank" href="{{ url('citas/Finalizado?area='.Auth::user()->id_area.'&atendido=hoy') }}"
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
                                                                {{ $today_count->total_cerrado }}</h4>
                                                            <a target="_blank" href="{{ url('citas/Cerrado?area='.Auth::user()->id_area.'&atendido=hoy') }}"
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
                                                onchange="filterMotivoArea(this,'motivo')">
                                                {{-- <option value="" {{ request('area') == '' ? 'selected' : '' }}>Todo
                                                </option>
                                                <option value="null" {{ request('area') == 'null' ? 'selected' : '' }}>
                                                    Sin área</option> --}}
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
                                                {{-- <option value="" {{ request('motivo') == '' ? 'selected' : '' }}>Todos</option> --}}
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



                            {{-- @include('Cite.citetable') --}}

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




    <!-- /.modal----------------------------------------------------------------------------------------------- -->






    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal-dialog -->
    </div>


@endsection
