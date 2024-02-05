<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';


    public function comentarios(): MorphMany
    {
        return $this->morphMany(Comentario::class, 'comentable');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function meneos(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    // Funciones de la imagen
    const MIME_IMAGEN = 'jpg';

    private function imagen_url_relativa()
    {
        //dd($this->nombre_imagen);
        return '/uploads/' . $this->nombre_imagen;
    }
    public function getImagenUrlAttribute()
    {
        return Storage::url(mb_substr($this->imagen_url_relativa(), 1));
    }

    public function existeImagen()
    {
        return Storage::disk('public')->exists($this->imagen_url_relativa());
    }
    public function getNombreImagenAttribute()
    {
        //dd($this->imagen);
        return $this->imagen . '.' . self::MIME_IMAGEN;
    }

}
