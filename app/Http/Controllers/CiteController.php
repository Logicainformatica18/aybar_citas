<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Models\User;
use App\Models\Reason_appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCiteRequest;
use App\Http\Requests\UpdateCiteRequest;
use Illuminate\Support\Facades\Session; // Importar la clase Session
use stdClass;
use Carbon\Carbon;

class CiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($estado, Request $request)
    {
        $user = Auth::user();
        $id_usuario = $user->id;
        $id_rol = $user->id_rol;
        $id_area = $user->id_area;

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
        $atendido = $request->query('atendido', '');
        // Si el estado es "Todos", usar "%"
        if ($estado == 'Todos') {
            $estado = '%';
        }

        // Obtener motivos y tipos únicos

        $motivos = DB::table('motivos_cita')
            ->select('nombre_motivo')
            ->when($id_area != 6, function ($query) use ($id_area) {
                return $query->where('id_area', 'like', $id_area);
            })
            ->orderBy('nombre_motivo', 'asc')
            ->get();

        $areas = DB::table('areas')
            ->select('id_area', 'descripcion')
            ->when($id_area != 6, function ($query) use ($id_area) {
                return $query->where('id_area', $id_area);
            })
            ->orderBy('descripcion', 'asc')
            ->get();

        $tipos = DB::table('citas')->select('tipo')->distinct()->orderBy('tipo', 'asc')->get();

        $areas_derive = DB::table('areas')->select('id_area', 'descripcion')->orderBy('descripcion', 'asc')->get();

        $motivos_derive = DB::table('motivos_cita')->select('nombre_motivo')->orderBy('nombre_motivo')->get();

        // Obtener conteos de estado
        // $total_cite = Cite::where()->count();

        $total_cite = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->count();

        $total_pendiente = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Pendiente')
            ->count();

        $total_proceso = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Proceso')
            ->count();

        $total_atendido = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Atendido')
            ->count();

        $total_derivado = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Derivado')
            ->count();

        $total_derivado = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Derivado')
            ->count();

        $total_observado = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Observado')
            ->count();

        $total_finalizado = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Finalizado')
            ->count();

        $total_cerrado = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Cerrado')
            ->count();

        // Obtener información del usuario autenticado
        // $user = User::where('id_usuario', '=', '1')->first();
        // Auth::login($user);

        // Consulta base con LEFT JOIN y LIKE en motivos_cita
        $query = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->leftJoin('areas', function ($join) {
                $join->on('motivos_cita.id_area', '=', 'areas.id_area');
            })
            ->select('citas.*', 'areas.*')
            ->where('citas.estado', 'like', $estado)
            ->orderBy('codigo', 'asc');

        if ($id_usuario == 19 || $id_usuario == 38 || $id_rol == 1 || ($id_rol == 5 && empty($id_area))) {
            // Si el rol es 1 o 5 y no tiene área, mostramos todas las citas

            // $query = Cite::leftJoin('motivos_cita', function ($join) {
            //     $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
            // })
            //     ->leftJoin('areas', function ($join) {
            //         $join->on('motivos_cita.id_area', '=', 'areas.id_area');
            //     })
            //     ->select('citas.*', 'areas.*')
            //     ->where('citas.estado', 'like', $estado)
            //     ->orderBy('codigo', 'asc');
        } elseif ($id_rol == 5 && !empty($id_area)) {
            // Obtener las áreas habilitadas del usuario
            $areas_ = User::where('id_usuario', $id_usuario)->where('habilitado', 0)->pluck('id_area')->toArray();

            if (!empty($areas_)) {
                $query->whereIn('motivos_cita.id_area', $areas_);
            } else {
                $query->where('motivos_cita.id_area', $id_area);
            }
        } elseif ($id_rol == 4 || in_array($id_area, [1, 2, 3])) {
            // Obtener las áreas habilitadas del usuario
            $areas_ = User::where('id_usuario', $id_usuario)->where('habilitado', 0)->pluck('id_area')->toArray();

            if (!empty($areas_)) {
                $query->whereIn('motivos_cita.id_area', $areas_);
            } else {
                $query->where('motivos_cita.id_area', $id_area);
            }
        } else {
            // Si el usuario no está en ningún grupo especial, se filtra por su área
            $query->where('motivos_cita.id_area', $id_area);
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $fecha_actual = Carbon::now('America/Lima')->toDateString();

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if (!empty($tipo)) {
            $query->where('tipo', 'like', "%$tipo%");
        }
        // Aplicar filtros si existen en sesión
        if ($area == 'null') {
            $query->whereNull('areas.id_area');
        } else {
            if (!empty($area)) {
                $query->where('areas.id_area', 'like', $area);
            }
        }

        if (!empty($motivo)) {
            $query->where('motivo', 'like', "%$motivo%");
        }
        if (!empty($tipo)) {
            $query->where('tipo', 'like', "%$tipo%");
        }

        ////////////////// FECHA DE CITA ///////////////////////////////////////////////////////

        if ($date_cite == 'Vence_hoy') {
            $fecha_inicio = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $fecha_fin = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $query
                ->whereBetween('fecha', [$fecha_inicio, $fecha_fin])
                ->where('fecha', '<>', 'Según el Trámite')
                ->where('fecha', '<>', 'Por Definir');
        } elseif ($date_cite == 'Ni Definir ni segun tramite') {
            $query->where('fecha', '<>', 'Según el Trámite')->where('fecha', '<>', 'Por Definir');
        } elseif ($date_cite == 'Filtrar por Fecha') {
            if (!empty($date_start) && !empty($date_end)) {
                $query
                    ->whereBetween('fecha', [$date_start, $date_end])
                    ->where('fecha', '<>', 'Según el Trámite')
                    ->where('fecha', '<>', 'Por Definir');
            }
        } elseif ($date_cite == 'Por Definir') {
            $query->where('fecha', '=', 'Por Definir');
        } elseif ($date_cite == 'Segun_tramite') {
            $query->where('fecha', 'like', 'Según el Trámite');
        }

        ///////////////////////////////////////  FECHA REPROGRAMACION ////////////////////////////////////////////////////
        if ($date_reprog == 'Filtrar por Fecha') {
            if (!empty($date_start_reprog) && !empty($date_end_reprog)) {
                $query->whereBetween('fecha_repro', [$date_start_reprog, $date_end_reprog]);
            }
            if (!empty($date_start_gen) && !empty($date_end_gen)) {
                $query->whereBetween('fecha_generada', [$date_start_gen, $date_end_gen]);
            }
        } elseif ($date_reprog == 'Con Reprogramación') {
            $query->where('fecha_repro', '<>', 'Sin Reprogramación');
        } elseif ($date_reprog == 'Vence_hoy') {
            $fecha_inicio = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $fecha_fin = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $query
                ->whereBetween('fecha_repro', [$fecha_inicio, $fecha_fin])
                ->where('fecha_repro', '<>', 'Según el Trámite')
                ->where('fecha_repro', '<>', 'Por Definir');
        } elseif ($date_reprog == 'Sin Reprogramación') {
            $query->where('fecha_repro', 'like', 'Sin Reprogramación');
        } elseif ($date_reprog == 'Sin Reprogramación') {
            $query->where('fecha_repro', 'like', 'Sin Reprogramación');
        } elseif ($date_reprog == 'Segun_tramite') {
            $query->where('fecha_repro', 'like', 'Según el Trámite');
        }

        if ($atendido == 'hoy') {
            $fecha_inicio = Carbon::now('America/Lima')->startOfDay()->toDateTimeString();
            $fecha_fin = Carbon::now('America/Lima')->endOfDay()->toDateTimeString();

            $query->whereBetween('updated_at', [$fecha_inicio, $fecha_fin]);
        }
        // Obtener citas con paginación
        $cite = $query->paginate(7)->appends($request->query());

        // Retornar la vista con los datos
        return view('Cite.cite', compact('motivos', 'motivos_derive', 'tipos', 'areas', 'areas_derive', 'cite', 'total_cite', 'total_pendiente', 'total_proceso', 'total_atendido', 'total_derivado', 'total_observado', 'total_finalizado', 'total_cerrado'));
    }

    public function all($estado, Request $request)
    {
        $user = Auth::user();
        $id_usuario = $user->id;
        $id_rol = $user->id_rol;
        $id_area = $user->id_area;

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
        if ($estado == 'Todos') {
            $estado = '%';
        }

        // Obtener motivos y tipos únicos
        $motivos = DB::table(table: 'motivos_cita')->select('nombre_motivo')->orderBy('nombre_motivo', 'asc')->get();
        $tipos = DB::table('citas')->select('tipo')->distinct()->orderBy('tipo', 'asc')->get();
        $areas = DB::table('areas')->select('id_area', 'descripcion')->orderBy('descripcion', 'asc')->get();

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
        // $user = User::where('id_usuario', '=', '1')->first();
        // Auth::login($user);

        // Consulta base con LEFT JOIN y LIKE en motivos_cita
        $query = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->leftJoin('areas', function ($join) {
                $join->on('motivos_cita.id_area', '=', 'areas.id_area');
            })
            ->select('citas.*', 'areas.*')
            ->where('citas.estado', 'like', $estado)
            ->orderBy('codigo', 'asc');

        $fecha_actual = Carbon::now('America/Lima')->toDateString();
        // Aplicar filtros si existen en sesión
        if ($area == 'null') {
            $query->whereNull('areas.id_area');
        } else {
            if (!empty($area)) {
                $query->where('areas.id_area', 'like', $area);
            }
        }

        if (!empty($motivo)) {
            $query->where('motivo', 'like', "%$motivo%");
        }
        if (!empty($tipo)) {
            $query->where('tipo', 'like', "%$tipo%");
        }

        ////////////////// FECHA DE CITA ///////////////////////////////////////////////////////

        if ($date_cite == 'Vence_hoy') {
            $fecha_inicio = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $fecha_fin = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $query
                ->whereBetween('fecha', [$fecha_inicio, $fecha_fin])
                ->where('fecha', '<>', 'Según el Trámite')
                ->where('fecha', '<>', 'Por Definir');
        } elseif ($date_cite == 'Ni Definir ni segun tramite') {
            $query->where('fecha', '<>', 'Según el Trámite')->where('fecha', '<>', 'Por Definir');
        } elseif ($date_cite == 'Filtrar por Fecha') {
            if (!empty($date_start) && !empty($date_end)) {
                $query
                    ->whereBetween('fecha', [$date_start, $date_end])
                    ->where('fecha', '<>', 'Según el Trámite')
                    ->where('fecha', '<>', 'Por Definir');
            }
        } elseif ($date_cite == 'Por Definir') {
            $query->where('fecha', '=', 'Por Definir');
        } elseif ($date_cite == 'Segun_tramite') {
            $query->where('fecha', 'like', 'Según el Trámite');
        }

        ///////////////////////////////////////  FECHA REPROGRAMACION ////////////////////////////////////////////////////
        if ($date_reprog == 'Filtrar por Fecha') {
            if (!empty($date_start_reprog) && !empty($date_end_reprog)) {
                $query->whereBetween('fecha_repro', [$date_start_reprog, $date_end_reprog]);
            }
            if (!empty($date_start_gen) && !empty($date_end_gen)) {
                $query->whereBetween('fecha_generada', [$date_start_gen, $date_end_gen]);
            }
        } elseif ($date_reprog == 'Con Reprogramación') {
            $query->where('fecha_repro', '<>', 'Sin Reprogramación');
        } elseif ($date_reprog == 'Vence_hoy') {
            $fecha_inicio = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $fecha_fin = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $query
                ->whereBetween('fecha_repro', [$fecha_inicio, $fecha_fin])
                ->where('fecha_repro', '<>', 'Según el Trámite')
                ->where('fecha_repro', '<>', 'Por Definir');
        } elseif ($date_reprog == 'Sin Reprogramación') {
            $query->where('fecha_repro', 'like', 'Sin Reprogramación');
        } elseif ($date_reprog == 'Sin Reprogramación') {
            $query->where('fecha_repro', 'like', 'Sin Reprogramación');
        } elseif ($date_reprog == 'Segun_tramite') {
            $query->where('fecha_repro', 'like', 'Según el Trámite');
        }

        // Obtener citas con paginación
        $cite = $query->paginate(7)->appends($request->query());

        // Retornar la vista con los datos
        return view('Cite.cite_all', compact('motivos', 'tipos', 'areas', 'cite', 'total_cite', 'total_pendiente', 'total_proceso', 'total_atendido', 'total_derivado', 'total_observado', 'total_finalizado', 'total_cerrado'));
    }

    public function derive(Request $request)
    {
        if ($request->password == "Aybar2025$") {
            $cite = Cite::find($request->id_cite_derive);

            if (!$cite) {
                return response()->json(['error' => 'Cite not found'], 404);
            }

            $cite->motivo = $request->motivo_derive;
            $cite->save();
            return 'Motivo Actualizado correctamente';
        } else {
            return 'Error de contraseña';
        }
    }

    public function editDerive(Request $request)
    {
        $cite = Cite::find($request->id);
        return $cite;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function validate_user(Request $request)
    {
        // Buscar el usuario por ID
        $user = User::where('id_usuario', '=', $request->id_usuario)->first();

        if ($user != '') {
            // Iniciar sesión manualmente con Auth
            Auth::login($user);

            // Redirigir a la página deseada
            if ($request->filtro == 'todo') {
                return redirect()->route('citas.all', ['estado' => 'Todos']);
            } elseif ($request->filtro == 'area') {
                return redirect()->route('citas.index', ['estado' => 'Todos']);
            }
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
    public function show(Request $request)
    {
        $cite = Cite::with('customer') // Cargar la relación
            ->when($request->criterio, function ($query, $criterio) {
                $query
                    ->orWhere('codigo', 'like', "$criterio")
                    ->orWhere('motivo', 'like', "%$criterio%")
                    ->orWhereHas('customer', function ($subquery) use ($criterio) {
                        $subquery->where('razon_social', 'like', "%$criterio%");
                    });
            })
            ->orderBy('codigo', 'asc')
            ->paginate(7);
        // ✅ Retornar JSON para que Axios lo pueda interpretar correctamente
        //  return response()->json($cite);
        $crit = $request->criterio;
        return view('Cite.citetable', compact('cite', 'crit'));
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

    public function today_count()
    {
        $inicioDia = Carbon::now('America/Lima')->startOfDay()->toDateTimeString(); // Inicio del día (00:00:00)
        $finDia = Carbon::now('America/Lima')->endOfDay()->toDateTimeString(); // Fin del día (23:59:59)

        $cite = new stdClass();
        $estadoCounts = Cite::select('estado', \DB::raw('count(*) as count'))
            ->whereBetween('updated_at', [$inicioDia, $finDia]) // Filtra por la fecha
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
    public function filterMotivoArea(Request $request)
    {
        if ($request->id == '') {
            $motivo = DB::table(table: 'motivos_cita')->select('nombre_motivo')->orderBy('nombre_motivo', 'asc')->get();
        } else {
            $motivo = DB::table('motivos_cita')->select('nombre_motivo')->where('id_area', '=', $request->id)->orderBy('nombre_motivo', 'asc')->get();
        }
        return $motivo;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $cite = Cite::with('comment', 'customer')->where('id_cita', '=', $request->id)->first();
        session(['customer_email' => $cite->customer->Email]);
        return $cite;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $datosActualizar = [];

        if (!empty($request->fecha_cita_update) && !empty($request->hora_cita_update)) {
            $datosActualizar['fecha'] = $request->fecha_cita_update;
            $datosActualizar['hora'] = $request->hora_cita_update;
        }
        $state = '';

        if (!empty($request->fecha_repro_update) && !empty($request->hora_repro_update)) {
            $datosActualizar['fecha_repro'] = $request->fecha_repro_update;
            $datosActualizar['hora_repro'] = $request->hora_repro_update;
            $state = 'on';
        }
        //para indicar que el registro fue actualizado
        $datosActualizar['updated_at'] = now();

        if (!empty($datosActualizar)) {
            DB::table('citas')->where('id_cita', (int) $request->id_cita)->update($datosActualizar);

            $cite = DB::table('citas')->where('id_cita', (int) $request->id_cita)->first(); // Obtiene un solo registro
            if ($state == 'on') {
                $cite->fecha = $cite->fecha_repro;
                $cite->hora = $cite->hora_repro;
                $cite->reprogramacion_state = 'on';
            }

            $email = DB::table('clientes')->where('id_cliente', $cite->id_cliente)->value('email'); // Obtiene solo el email

            if ($email) {
                Mail::send('email.updateCita', ['cite' => $cite], function ($message) use ($email) {
                    $message->from('atenciones@aybarsac.com', 'Aybar Corp')->to($email)->bcc('programador@aybarsac.com')->cc('COPIASOLICITUDES@aybarsac.com')->subject('Confirmación de Cita');
                });
                return response()->json(['mensaje' => 'Cita actualizada correctamente']);
            } else {
                return response()->json(['error' => 'No se pudo actualizar la cita'], 400);
            }
        } else {
            return response()->json(['error' => 'No se enviaron valores para actualizar'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cite $cite)
    {
        //
    }
    public function dashboard($estado, Request $request)
    {
        $user = Auth::user();
        $id_usuario = $user->id;
        $id_rol = $user->id_rol;
        $id_area = $user->id_area;

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
        if ($estado == 'Todos') {
            $estado = '%';
        }

        // Obtener motivos y tipos únicos

        $motivos = DB::table('motivos_cita')
            ->select('nombre_motivo')
            ->when($id_area != 6, function ($query) use ($id_area) {
                return $query->where('id_area', 'like', $id_area);
            })
            ->orderBy('nombre_motivo', 'asc')
            ->get();

        $areas = DB::table('areas')
            ->select('id_area', 'descripcion')
            ->when($id_area != 6, function ($query) use ($id_area) {
                return $query->where('id_area', $id_area);
            })
            ->orderBy('descripcion', 'asc')
            ->get();

        $tipos = DB::table('citas')->select('tipo')->distinct()->orderBy('tipo', 'asc')->get();

        $areas_derive = DB::table('areas')->select('id_area', 'descripcion')->orderBy('descripcion', 'asc')->get();

        $motivos_derive = DB::table('motivos_cita')->select('nombre_motivo')->orderBy('nombre_motivo')->get();

        // Obtener conteos de estado
        // $total_cite = Cite::where()->count();

        $total_cite = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->count();

        $total_pendiente = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Pendiente')
            ->count();

        $total_proceso = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Proceso')
            ->count();

        $total_atendido = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Atendido')
            ->count();

        $total_derivado = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Derivado')
            ->count();

        $total_derivado = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Derivado')
            ->count();

        $total_observado = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Observado')
            ->count();

        $total_finalizado = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Finalizado')
            ->count();

        $total_cerrado = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->where('motivos_cita.id_area', '=', $id_area)
            ->where('citas.estado', 'Cerrado')
            ->count();

        // Obtener información del usuario autenticado
        // $user = User::where('id_usuario', '=', '1')->first();
        // Auth::login($user);

        // Consulta base con LEFT JOIN y LIKE en motivos_cita
        $query = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->leftJoin('areas', function ($join) {
                $join->on('motivos_cita.id_area', '=', 'areas.id_area');
            })
            ->select('citas.*', 'areas.*')
            ->where('citas.estado', 'like', $estado)
            ->orderBy('codigo', 'asc');

        if ($id_usuario == 19 || $id_usuario == 38 || $id_rol == 1 || ($id_rol == 5 && empty($id_area))) {
        } elseif ($id_rol == 5 && !empty($id_area)) {
            // Obtener las áreas habilitadas del usuario
            $areas_ = User::where('id_usuario', $id_usuario)->where('habilitado', 0)->pluck('id_area')->toArray();

            if (!empty($areas_)) {
                $query->whereIn('motivos_cita.id_area', $areas_);
            } else {
                $query->where('motivos_cita.id_area', $id_area);
            }
        } elseif ($id_rol == 4 || in_array($id_area, [1, 2, 3])) {
            // Obtener las áreas habilitadas del usuario
            $areas_ = User::where('id_usuario', $id_usuario)->where('habilitado', 0)->pluck('id_area')->toArray();

            if (!empty($areas_)) {
                $query->whereIn('motivos_cita.id_area', $areas_);
            } else {
                $query->where('motivos_cita.id_area', $id_area);
            }
        } else {
            // Si el usuario no está en ningún grupo especial, se filtra por su área
            $query->where('motivos_cita.id_area', $id_area);
        }

        $fecha_actual = Carbon::now('America/Lima')->toDateString();
        // Aplicar filtros si existen en sesión
        if ($area == 'null') {
            $query->whereNull('areas.id_area');
        } else {
            if (!empty($area)) {
                $query->where('areas.id_area', 'like', $area);
            }
        }

        if (!empty($motivo)) {
            $query->where('motivo', 'like', "%$motivo%");
        }
        if (!empty($tipo)) {
            $query->where('tipo', 'like', "%$tipo%");
        }

        ////////////////// FECHA DE CITA ///////////////////////////////////////////////////////

        if ($date_cite == 'Vence_hoy') {
            $fecha_inicio = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $fecha_fin = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $query
                ->whereBetween('fecha', [$fecha_inicio, $fecha_fin])
                ->where('fecha', '<>', 'Según el Trámite')
                ->where('fecha', '<>', 'Por Definir');
        } elseif ($date_cite == 'Ni Definir ni segun tramite') {
            $query->where('fecha', '<>', 'Según el Trámite')->where('fecha', '<>', 'Por Definir');
        } elseif ($date_cite == 'Filtrar por Fecha') {
            if (!empty($date_start) && !empty($date_end)) {
                $query
                    ->whereBetween('fecha', [$date_start, $date_end])
                    ->where('fecha', '<>', 'Según el Trámite')
                    ->where('fecha', '<>', 'Por Definir');
            }
        } elseif ($date_cite == 'Por Definir') {
            $query->where('fecha', '=', 'Por Definir');
        } elseif ($date_cite == 'Segun_tramite') {
            $query->where('fecha', 'like', 'Según el Trámite');
        }

        ///////////////////////////////////////  FECHA REPROGRAMACION ////////////////////////////////////////////////////
        if ($date_reprog == 'Filtrar por Fecha') {
            if (!empty($date_start_reprog) && !empty($date_end_reprog)) {
                $query->whereBetween('fecha_repro', [$date_start_reprog, $date_end_reprog]);
            }
            if (!empty($date_start_gen) && !empty($date_end_gen)) {
                $query->whereBetween('fecha_generada', [$date_start_gen, $date_end_gen]);
            }
        } elseif ($date_reprog == 'Con Reprogramación') {
            $query->where('fecha_repro', '<>', 'Sin Reprogramación');
        } elseif ($date_reprog == 'Vence_hoy') {
            $fecha_inicio = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $fecha_fin = Carbon::now('America/Lima')->toDateString(); // Devuelve "2025-02-24"
            $query
                ->whereBetween('fecha_repro', [$fecha_inicio, $fecha_fin])
                ->where('fecha_repro', '<>', 'Según el Trámite')
                ->where('fecha_repro', '<>', 'Por Definir');
        } elseif ($date_reprog == 'Sin Reprogramación') {
            $query->where('fecha_repro', 'like', 'Sin Reprogramación');
        } elseif ($date_reprog == 'Sin Reprogramación') {
            $query->where('fecha_repro', 'like', 'Sin Reprogramación');
        } elseif ($date_reprog == 'Segun_tramite') {
            $query->where('fecha_repro', 'like', 'Según el Trámite');
        }

        // Obtener citas con paginación
        $cite = $query->paginate(7)->appends($request->query());

        //obtener cantidades de citas de todas las areas
        $all_cite_count = $this->count();
        $today_count = $this->today_count();

        // Contar citas por area
        $cite_type_count = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->select('citas.tipo', \DB::raw('COUNT(*) as total'))
            ->where('motivos_cita.id_area', '=', $id_area)
            ->groupBy('citas.tipo')->orderByDesc('total')->get();
        // Contar citas por motivo
        $cite_motivo_count = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->select('citas.motivo', \DB::raw('COUNT(*) as total'))
            ->where('motivos_cita.id_area', '=', $id_area)
            ->groupBy('citas.motivo')->orderByDesc('total')->get();

        // Contar citas por generado
        $cite_generado_count = Cite::leftJoin('motivos_cita', function ($join) {
            $join->on('citas.motivo', '=', 'motivos_cita.nombre_motivo');
        })
            ->select('citas.generado', \DB::raw('COUNT(*) as total'))
            ->where('motivos_cita.id_area', '=', $id_area)
            ->groupBy('citas.generado')->orderByDesc('total')->get();
       

        // Retornar la vista con los datos
        return view('Cite.cite_dashboard', compact(
            'motivos',
            'motivos_derive',
            'tipos',
            'areas',
            'areas_derive',
            'cite',
            'total_cite',
            'total_pendiente',
            'total_proceso',
            'total_atendido',
            'total_derivado',
            'total_observado',
            'total_finalizado',
            'total_cerrado',
            'all_cite_count',
            'today_count',
            'cite_type_count',
            'cite_motivo_count',
            'cite_generado_count'
        ));
    }
}
