<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCiteRequest;
use App\Http\Requests\UpdateCiteRequest;

class CiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


//         $cite = Cite::with("motivo")->count();

// return $cite;

$cite = Cite::join('motivos_cita', 'citas.motivo', '=', 'motivos_cita.nombre_motivo')
->select('citas.*')->paginate(7);
//return $cite;
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
        $user = User::where("id_usuario","=",$request->id_usuario)->first();

        if ($user!="") {
            // Iniciar sesión manualmente con Auth
            Auth::login($user);


            // Redirigir a la página deseada
            return redirect("citas");
        }
        else{
            return "error";
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
