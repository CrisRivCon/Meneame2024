<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PublicacionController extends Controller
{

/*      public function __construct()
    {

        $this->authorizeResource(Publicacion::class, 'publicacion');
    } */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $this->authorize('viewAny', Publicacion::class);
            return view('publicaciones.index', [
                'publicaciones' => Publicacion::all(),
            ]);
        }
        return Redirect::to('/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if(Auth::check()){
            $this->authorize('create', Publicacion::class);
            return view('publicaciones.create');
        }
        return Redirect::to('/login');

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
            'imagen' => 'required|mimes:jpg',

        ]);

        $publicacion = new Publicacion();
        $imagen = $request->file('imagen');
        Storage::makeDirectory('public/uploads');
        $nombre = Carbon::now() . '.jpeg';
        $manager = new ImageManager(new Driver());
        $publicacion->guardar_imagen($imagen, $nombre, 420, $manager);
        $publicacion->titulo = $request->input('titulo');
        $publicacion->url = $request->input('url');
        $publicacion->descripcion = $request->input('descripcion');
        $publicacion->imagen = $nombre;
        $publicacion->usuario_id = Auth::id();
        $publicacion->save();

        return redirect()->route('publicacion.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publicacion $publicacion)
    {

        return view('publicaciones.show', [
            'publicacion' => $publicacion,

        ]);
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



