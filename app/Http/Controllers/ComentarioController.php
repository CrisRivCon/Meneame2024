<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
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
    public function create($comentable, $tipo, Publicacion $publicacion)
    {
        return view('comentarios.create', [
            'comentable' => $comentable,
            'tipo' => $tipo,
            'publicacion' => $publicacion,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $comentable, $tipo, Publicacion $publicacion)
    {
        if ($tipo == "publicacion")
        {
            $publicacion = Publicacion::find($comentable);
            $comentario = $publicacion->comentarios()->create([
                'descripcion' => $request->descripcion,
                'usuario_id' => Auth::user()->id,
            ]);

        }else if ($tipo == "comentario")
        {
            $comentario = Comentario::find($comentable);
            $comentario = $comentario->comentarios()->create([
                'descripcion' => $request->descripcion,
                'usuario_id' => Auth::user()->id,
            ]);

        }


        return redirect()->route('publicacion.show', [
            'publicacion' => $publicacion,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
