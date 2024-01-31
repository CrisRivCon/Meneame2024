<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

}
