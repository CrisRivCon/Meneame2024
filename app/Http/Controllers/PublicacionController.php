<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('publicaciones.index', [
            'publicaciones' => Publicacion::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publicaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'url' => 'required|max:255',
            'descripcion' => 'required|max:600',

        ]);

        $publicacion = new Publicacion();
        $imagen = $request->file('imagen');
        dd($request);
        $nombre = $publicacion->id . '.jpeg';
        $imagen->storeAs('uploads', $nombre, 'public');
        $publicacion->titulo = $request->input('titulo');
        $publicacion->url = $request->input('url');
        $publicacion->descripcion = $request->input('descripcion');
        $publicacion->usuario_id = Auth::id();
        $publicacion->save();

        return redirect()->route('publicaciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publicacion $publicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publicacion $publicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publicacion $publicacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publicacion $publicacion)
    {
        //
    }


}
