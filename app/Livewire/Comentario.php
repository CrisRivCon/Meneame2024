<?php

namespace App\Livewire;

use Livewire\Component;

class Comentario extends Component
{
    public $contador = 0;
    public $publicacion = null;
    public $comentario = null;

    public function render()
    {
        if ($this->comentario == null) {
            $comentarios = $this->publicacion->comentarios;
        } else {
            $comentarios = $this->comentario->comentarios;
        }

        return view('livewire.comentario', [
            'comentarios' => $comentarios,
            'publicacion' => $this->publicacion,
        ]);
    }
}
