<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCiteRequest;
use App\Http\Requests\UpdateCiteRequest;
use stdClass;
use Carbon\Carbon;
class CiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($estado,Request $request)
    {


     // Obtener los valores desde la query string
     $motivo = $request->query('motivo', '');
     $tipo = $request->query('tipo', '');
     $date_start = $request->query('date_start', '');
     $date_end = $request->query('date_end', '');
     $date_reprog = $request->query('date_reprog', '');
     $date_start_reprog = $request->query('date_start_reprog', '');
     $date_end_reprog = $request->query('date_end_reprog', '');
     $date_start_gen = $request->query('date_start_gen', '');
     $date_end_gen = $request->query('date_end_gen', '');
     $date_cite = $request->query('date_cite', '');
     $area = $request->query('area', '');


        // Si el estado es "Todos", usar "%"
        if($estado=="Todos"){

            $estado = '%'  ;
        }


        // Obtener motivos y tipos únicos
        $motivos = DB::table('citas')->select('motivo')->distinct()->orderBy("motivo", "asc")->get();
        $tipos = DB::table('citas')->select('tipo')->distinct()->orderBy("tipo", "asc")->get();
        $areas = DB::table('areas')->select('id_area','descripcion')->orderBy("descripcion", "asc")->get();
        // Obtener conteos de estado
        $total_cite = Cite::count();
        $total_pendiente = Cite::where('estado', 'Pendiente')->count();
        $total_proceso = Cite::where('estado', 'Proceso')->count();
        $total_atendido = Cite::where('estado', 'Atendido')->count();
        $total_derivado = Cite::where('estado', 'Derivado')->count();
        $total_observado = Cite::where('estado', 'Observado')->count();
        $total_finalizado = Cite::where('estado', 'Finalizado')->count();
        $total_cerrado = Cite::where('estado', 'Cerrado')->count();

        // Obtener información del usuario autenticado
         $user = User::where('id_usuario', '=', '1')->first();
         Auth::login($user);
        $id_usuario = $user->id;
        $id_rol = $user->id_rol;
        $id_area = $user->id_area;

        // Consulta base con LEFT JOIN y LIKE en motivos_cita
        $query = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
        ->leftJoin('areas', function ($join) {
            $join->on('motivos_cita.id_area', '=', 'areas.id_area');
        })
            ->select('citas.*','areas.*')
            ->where('citas.estado', 'like', $estado)
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

        if($date_cite=="Vencido por Fecha"){

           // $fecha_actual = Carbon::now('America/Lima');

            $query->where("fecha", ">", $fecha_actual)
            ->where("fecha", "<>", "Según el Trámite")
            ->where("fecha", "<>", "Por Definir");
        }

        elseif($date_cite=="Vence_hoy"){

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




        // Obtener citas con paginación
        $cite = $query->paginate(7)->appends($request->query());;

        // Retornar la vista con los datos
        return view(
            'Cite.cite',
            compact(
                'motivos',
                'tipos',
                'areas',
                'cite',
                'total_cite',
                'total_pendiente',
                'total_proceso',
                'total_atendido',
                'total_derivado',
                'total_observado',
                'total_finalizado',
                'total_cerrado'
            )
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function validate_user(Request $request)
    {
        // Buscar el usuario por ID
        $user = User::where('id_usuario', '=', '1')->first();

        if ($user != '') {
            // Iniciar sesión manualmente con Auth
            Auth::login($user);

            // Redirigir a la página deseada
            return redirect()->route('citas.index', ['estado' => 'Todos']);
        } else {
            return 'error';
        }
    }

    public function update_state()
    {
        try {
            DB::statement("
           UPDATE citas c
    JOIN (
        SELECT
            co.id_cita,
            co.estado AS nuevo_estado
        FROM comentarios co
        WHERE co.id_comentario = (
            SELECT MAX(co2.id_comentario)
            FROM comentarios co2
            WHERE co2.id_cita = co.id_cita
        )
    ) AS subquery
    ON c.id_cita = subquery.id_cita
    SET c.estado = subquery.nuevo_estado;
");

            return response()->json(['status' => 'success', 'message' => 'Estados actualizados correctamente']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCiteRequest $request)
    {
        //
    }
    public function count()
    {
        $cite = new stdClass();
        $estadoCounts = Cite::select('estado', \DB::raw('count(*) as count'))
            ->groupBy('estado')
            ->get()
            ->keyBy('estado')
            ->map(function ($item) {
                return $item->count;
            });

        $cite->total = $estadoCounts->sum(); // Total count of all states

        // Assigning individual state counts
        $cite->total_pendiente = $estadoCounts->get('Pendiente', 0);
        $cite->total_proceso = $estadoCounts->get('Proceso', 0);
        $cite->total_atendido = $estadoCounts->get('Atendido', 0);
        $cite->total_derivado = $estadoCounts->get('Derivado', 0);
        $cite->total_observado = $estadoCounts->get('Observado', 0);
        $cite->total_finalizado = $estadoCounts->get('Finalizado', 0);
        $cite->total_cerrado = $estadoCounts->get('Cerrado', 0);
        return $cite;
    }

    /**
     * Display the specified resource.
     */
    public function filter(Request $request)
    {
        // Guardar los filtros en la sesión
        session([
            'estado' => $request->estado ?? 'Todos',
            'motivo' => $request->motivo ?? '',
            'tipo' => $request->tipo ?? '',
            'date_start' => $request->date_start ?? '',
            'date_end' => $request->date_end ?? '',
            'date_start_reprog' => $request->date_start_reprog ?? '',
            'date_end_reprog' => $request->date_end_reprog ?? '',
            'date_start_gen' => $request->date_start_gen ?? '',
            'date_end_gen' => $request->date_end_gen ?? '',
        ]);

        // Redirigir al index para aplicar los filtros
        return redirect()->route('citas.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $cite = Cite::where("id_cita", "=", $request->id)->first();
        return $cite;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCiteRequest $request, Cite $cite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cite $cite)
    {
        //
    }
}
