<?php

namespace App\Livewire;

use App\Models\Publicacion;
use Livewire\Attributes\On;
use Livewire\Component;

class Vista extends Component
{
    public $buscar = '';

    #[On('buscar-publicacion')]
    public function setBuscar($buscar)
    {
        $this->buscar = $buscar;
    }

    public function render()
    {

        return view('livewire.vista',[
            'publicaciones' => Publicacion::where('titulo', 'like', '%'.$this->buscar.'%')->get(),
            'publicaciones_aside' => Publicacion::all(),
        ]);
    }
}
