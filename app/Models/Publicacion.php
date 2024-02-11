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

use function PHPUnit\Framework\isEmpty;

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
        return $this->belongsToMany(User::class, "publicacion_usuario", "publicacion_id", "usuario_id");
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

    public function mostrar_comentarios(Comentario $comentario = null, $contador = 1)
    {
        if ($comentario == null)
        {
            $comentarios = $this->comentarios;
        }
        else
        {
            $comentarios = $comentario->comentarios;
        }
        //dd($comentarios);
        if (count($comentarios) > 0)
        {
            foreach ($comentarios as $comentario)
            {
                if ($comentario->comentable_type == Publicacion::class) {
                    $contador=1;
                }
                echo '<section class="bg-white dark:bg-gray-900 my-10" style="margin-left:'.$contador.'em;">
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                    <div class="w-full text-orange-600">
                        <a href="#">
                            ' . $comentario->id.' ' . $comentario->usuario->name . '
                        </a>
                        <span class="text-gray-700">'.$comentario->created_at->format("d/m H:i").'</span>
                    </div>
                    </div>
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full">
                            '. $comentario->descripcion.'
                        </div>
                    </div>
                    <button type="button"
                        class="px-4 py-2 text-sm font-medium text-orange-600 bg-white border border-gray-200 rounded-t-lg md:rounded-tr-none md:rounded-l-lg hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white">
                 <a href="'.  route("hacer_comentario", ["comentable" => $comentario, 'tipo' => 'Comentario', 'publicacion' => $this]) .'">
                    Hacer comentarios
                </a>
                </button>
                </section>';

                if (count($comentario->comentarios) > 0){
                    $this->mostrar_comentarios($comentario, $contador+=3);
                    $contador-=3;
                }

            }
        }
        else
        {
            $contador-=3;
        }
    }

}
