<?php
namespace App\Exports;

use App\Models\Cite;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CiteExport implements FromCollection, WithHeadings
{
    protected $request;
    protected $estado;

    public function __construct(Request $request, $estado)
    {
        $this->request = $request;
        $this->estado = $estado;
    }

    public function collection()
    {
         // Obtener los valores desde la query string
     $motivo = $this->request->query('motivo', '');
     $tipo = $this->request->query('tipo', '');
     $date_start = $this->request->query('date_start', '');
     $date_end = $this->request->query('date_end', '');
     $date_reprog = $this->request->query('date_reprog', '');
     $date_start_reprog = $this->request->query('date_start_reprog', '');
     $date_end_reprog = $this->request->query('date_end_reprog', '');
     $date_start_gen = $this->request->query('date_start_gen', '');
     $date_end_gen = $this->request->query('date_end_gen', '');
     $date_cite = $this->request->query('date_cite', '');
     $area = $this->request->query('area', '');


        // Si el estado es "Todos", usar "%"
        if($this->estado=="Todos"){

            $this->estado = '%'  ;
        }






        $query = Cite::leftJoin('clientes', 'citas.id_cliente', '=', 'clientes.id_cliente')
        ->leftJoin('motivos_cita', 'citas.motivo', '=', 'motivos_cita.nombre_motivo')
        ->leftJoin('areas', 'motivos_cita.id_area', '=', 'areas.id_area')
        ->select(
            'citas.codigo',
            'clientes.razon_social as cliente_nombre',
            'clientes.dni as cliente_dni',
            'citas.proyecto',
            'citas.manzana',
            'citas.lote',
            'citas.fecha as fecha_cita',
            'citas.hora as hora_cita',
            'citas.motivo',
            'citas.estado',
            'citas.fechag as fecha_generada',
            'citas.fecha_repro as fecha_reprogramada'
        )


            ->where('citas.estado', 'like', $this->estado)
            ->orderBy('codigo', 'asc');


            $fecha_actual = Carbon::now( 'America/Lima')->toDateString();
        // Aplicar filtros si existen en sesión
        if ($area=="null") {
            $query->whereNull("areas.id_area");

        }
        else{
            if (!empty($area)) {
                $query->where("areas.id_area", "like", $area);
            }
        }

        if (!empty($motivo)) {
            $query->where("motivo", "like", "%$motivo%");
        }
        if (!empty($tipo)) {
            $query->where("tipo", "like", "%$tipo%");
        }

        ////////////////// FECHA DE CITA ///////////////////////////////////////////////////////



        if($date_cite=="Vence_hoy"){

            $fecha_inicio = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $fecha_fin = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $query->whereBetween("fecha", [$fecha_inicio,$fecha_fin])
            ->where("fecha", "<>", "Según el Trámite")
            ->where("fecha", "<>", "Por Definir");
        }
        elseif($date_cite=="Ni Definir ni segun tramite"){



            $query->where("fecha", "<>", "Según el Trámite")
            ->where("fecha", "<>", "Por Definir");

        }
        elseif($date_cite=="Filtrar por Fecha"){
            if (!empty($date_start) && !empty($date_end)) {
                $query->whereBetween('fecha', [$date_start, $date_end])
                ->where("fecha", "<>", "Según el Trámite")
                ->where("fecha", "<>", "Por Definir");
            }
        }
        elseif($date_cite=="Por Definir"){

                $query->where("fecha", "=", "Por Definir");

        }elseif($date_cite=="Segun_tramite"){

                $query->where("fecha", "like", "Según el Trámite");

            }


        ///////////////////////////////////////  FECHA REPROGRAMACION ////////////////////////////////////////////////////
        if ($date_reprog=="Filtrar por Fecha") {
            if (!empty($date_start_reprog) && !empty($date_end_reprog)) {
                $query->whereBetween('fecha_repro', [$date_start_reprog, $date_end_reprog]);
            }
            if (!empty($date_start_gen) && !empty($date_end_gen)) {
                $query->whereBetween('fecha_generada', [$date_start_gen, $date_end_gen]);
            }
        }
        elseif($date_reprog=="Con Reprogramación"){
            $query->where('fecha_repro', "<>","Sin Reprogramación");
        }
        elseif($date_reprog=="Vence_hoy"){
            $fecha_inicio = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $fecha_fin = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $query->whereBetween("fecha_repro", [$fecha_inicio,$fecha_fin])
            ->where("fecha_repro", "<>", "Según el Trámite")
            ->where("fecha_repro", "<>", "Por Definir");


        }
        elseif($date_reprog=="Sin Reprogramación"){
            $query->where('fecha_repro', "like","Sin Reprogramación");
        }
        elseif($date_reprog=="Sin Reprogramación"){
            $query->where('fecha_repro', "like","Sin Reprogramación");
        }
        elseif($date_reprog=="Segun_tramite"){
            $query->where('fecha_repro', "like",'Según el Trámite');
        }





        return $query->get(); // Obtener los datos filtrados
    }

    public function headings(): array
    {
        return [
            'Código',              // citas.codigo
            'Cliente',             // clientes.nombre AS cliente_nombre
            'DNI',                 // clientes.dni AS cliente_dni
            'Proyecto',            // proyectos.nombre AS proyecto_nombre
            'Manzana',             // citas.manzana
            'Lote',                // citas.lote
            'Fecha de cita',       // citas.fecha
            'Hora de cita',        // citas.hora
            'Motivo',              // citas.motivo
            'Estado',              // citas.estado

            'Fecha Generada',      // citas.fecha_generada
            'Fecha Reprogramada'   // citas.fecha_repro
        ];
    }


}
