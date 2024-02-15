<?php

namespace App\Livewire;

use App\Models\Publicacion;
use Livewire\Component;

class Vista extends Component
{
    public function render()
    {
        return view('livewire.vista',[
            'publicaciones' => Publicacion::all(),
        ]);
    }
}
