<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Comentario::class, 'comentario');
    }

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
        $this->authorize('create', Comentario::class);

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
        $this->authorize('create', Comentario::class);

        class_alias('App\Models\Publicacion', 'Publicacion');
        class_alias('App\Models\Comentario', 'Comentario');

        $comentable = $tipo::find($comentable);
        $comentable->comentarios()->create([
            'descripcion' => $request->descripcion,
            'usuario_id' => Auth::user()->id,
        ]);

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
    public function edit(Comentario $comentario, Publicacion $publicacion)
    {
        //dd($this->authorize('update', $comentario));
        $this->authorize('update', $comentario);
        return view('comentarios.edit', [
            'comentario' => $comentario,
            'publicacion' => $publicacion,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario, Publicacion $publicacion)
    {
        $comentario->update(['descripcion' => $request->descripcion]);
        return view('publicaciones.show', [
            'publicacion' => $publicacion,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario, Publicacion $publicacion)
    {
        $this->authorize('delete', $comentario);
        $comentario->delete();

        return redirect()->route('publicacion.show', [
            'publicacion' => $publicacion,
        ]);
    }
}
