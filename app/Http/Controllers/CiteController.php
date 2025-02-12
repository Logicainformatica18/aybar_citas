<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCiteRequest;
use App\Http\Requests\UpdateCiteRequest;

class CiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //         $cite = Cite::with("motivo")->count();

        // return $cite;

        // $cite = Cite::join('motivos_cita', 'citas.motivo', '=', 'motivos_cita.nombre_motivo')
        // ->select('citas.*')->paginate(7);
        // //return $cite;
        //  return view('Cite.cite', compact('cite'));

        $user = Auth::user();
        $id_usuario = $user->id;
        $id_rol = $user->id_rol;
        $id_area = $user->id_area;

        // Obtener el estado desde la URL (?estado=pendiente)
        $estado = $request->estado;

        // Consulta base con LEFT JOIN y LIKE en motivos_cita
        $query = Cite::Join('motivos_cita', function ($join) {
            $join->on(DB::raw("CONCAT('%', citas.motivo, '%')"), 'LIKE', DB::raw("CONCAT('%', motivos_cita.nombre_motivo, '%')"));
        })
        ->select('citas.*')
        ->orderBy("codigo", "asc");

        // Aplicar filtro por estado si se proporciona en la URL
            if ($estado=="Todos") {
                $estado="%";
            }
            $query->where('citas.estado',"like", $estado);


        if ($id_usuario == 19 || $id_usuario == 38 || $id_rol == 1 || ($id_rol == 5 && empty($id_area))) {

            // Si el rol es 1 o 5 y no tiene área, mostramos todas las citas

            $query = Cite::LeftJoin('motivos_cita', function ($join) {
                $join->on(DB::raw("CONCAT('%', citas.motivo, '%')"), 'LIKE', DB::raw("CONCAT('%', motivos_cita.nombre_motivo, '%')"));
            }) ->select('citas.*')
            ->orderBy("codigo", "asc");
            $query->where('citas.estado',"like", $estado);
            $cite = $query->paginate(7);
        } elseif ($id_rol == 5 && !empty($id_area)) {
            // Obtener las áreas habilitadas del usuario
            $areas = User::where('id_usuario', $id_usuario)->where('habilitado', 0)->pluck('id_area')->toArray();

            if (!empty($areas)) {
                $cite = $query->whereIn('motivos_cita.id_area', $areas)->paginate(7);
            } else {
                $cite = $query->where('motivos_cita.id_area', $id_area)->paginate(7);
            }
        } elseif ($id_rol == 4 || in_array($id_area, [1, 2, 3])) {
            // Obtener las áreas habilitadas del usuario
            $areas = User::where('id_usuario', $id_usuario)->where('habilitado', 0)->pluck('id_area')->toArray();

            if (!empty($areas)) {
                $cite = $query->whereIn('motivos_cita.id_area', $areas)->paginate(7);
            } else {
                $cite = $query->where('motivos_cita.id_area', $id_area)->paginate(7);
            }
        } else {
            // Si el usuario no está en ningún grupo especial, se filtra por su área
            $cite = $query->where('motivos_cita.id_area', $id_area)->paginate(7);
        }

        return view('Cite.cite', compact('cite'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function validate_user(Request $request)
    {
        // Validar que el ID sea un número válido
        // $request->validate([
        //     'id_usuario' => 'required|integer|exists:users,id',
        // ]);

        // Buscar el usuario por ID
        $user = User::where('id_usuario', '=', $request->id_usuario)->first();

        if ($user != '') {
            // Iniciar sesión manualmente con Auth
            Auth::login($user);

            // Redirigir a la página deseada
            return redirect()->route('citas.index', ['estado' => 'Todos']);

        } else {
            return 'error';
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCiteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cite $cite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cite $cite)
    {
        //
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
