<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Publicacion extends Model
{
    use HasFactory;

    const MIME_IMAGEN = 'jpg';

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



    private function imagen_url_relativa()
    {
        return '/uploads/' . $this->imagen;
    }

    public function getImagenUrlAttribute()
    {
        return Storage::url(mb_substr($this->imagen_url_relativa(), 1));
    }

    public function existeImagen()
    {
        return Storage::disk('public')->exists($this->imagen_url_relativa());
    }

    public function guardar_imagen(UploadedFile $imagen, string $nombre, int $escala, ?ImageManager $manager = null)
    {
        if ($manager === null) {
            $manager = new ImageManager(new Driver());
        }

        $imagen = $manager->read($imagen);
        $imagen->scaleDown($escala);
        $ruta = Storage::path('public/uploads/' . $nombre);
        $imagen->save($ruta);
    }


}
