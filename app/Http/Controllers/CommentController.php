<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Cite;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
       use Illuminate\Support\Facades\Log;
       use Illuminate\Support\Carbon;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        try {
            date_default_timezone_set('America/Lima'); // Asegura que Carbon use la hora de Lima

            $comment = new Comment();
            $comment->comentario = $request->comentario;
            $comment->id_cita = $request->id_cita;
            $comment->estado = $request->estado;

            // Si no viene fecha, se usa la actual en formato "YYYY-MM-DD"
            $comment->fecha = $request->fecha ?? Carbon::now('America/Lima')->toDateString();

            // Si no viene hora, se usa la hora actual en formato "HH:MM:SS"
            $comment->hora = $request->hora ?? Carbon::now('America/Lima')->format('H:i:s');

            $comment->habilitado = 0;
            $comment->save();

            $cite = Cite::find($request->id_cita);
            $cite->estado = $request->estado;
            $cite->save();

            return response()->json([
                'success' => true,
                'message' => 'Comentario guardado exitosamente.'
            ], 201);
        } catch (\Exception $e) {
            // Registrar el error en los logs con más detalle
            \Log::error('Error al guardar el comentario', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al guardar el comentario.',
                'error' => $e->getMessage()
            ], 500);
        }


    }
    /**
     * Store a newly created resource in storage.
     */
    public function notify(Request $request)
    {





        try {
            // 1️⃣ Obtener el comentario de la base de datos
            $comment = Comment::where("id_comentario", $request->id_comentario)->first();

            if (!$comment) {
                throw new \Exception("No se encontró el comentario con ID: " . $request->id_comentario);
            }

            Log::info("Comentario obtenido:", (array) $comment);


            //    session(['customer_email' => $email]);
            // 2️⃣ Obtener el email desde la sesión
            $email = Session::get('customer_email');

            if (!$email) {
                throw new \Exception("No se encontró un email en la sesión.");
            }

            Log::info("Email obtenido de la sesión: " . $email);

            // 3️⃣ Intentar enviar el correo
            Mail::send('email.enviarCorreo', ['comment' => $comment], function ($message) use ($email) {
                $message->from('atenciones@aybarsac.com', 'Aybar Corp')
                        ->to($email)
                        ->bcc("programador@aybarsac.com")
                        ->cc("COPIASOLICITUDES@aybarsac.com")
                        ->subject('Actualización de Cita');
            });

            Log::info("Correo enviado con éxito a: " . $email);

            return response()->json(["mensaje" => "Correo enviado correctamente"]);

        } catch (\Exception $e) {
            Log::error("Error en el proceso: " . $e->getMessage());

            return response()->json([
                "error" => "Ocurrió un error",
                "message" => $e->getMessage()
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
