<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
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
