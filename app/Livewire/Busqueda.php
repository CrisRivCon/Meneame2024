<?php

namespace App\Livewire;

use Livewire\Component;

class Busqueda extends Component
{
    public function buscar($buscar)
    {
        $this->dispatch('buscar-publicacion', buscar:$buscar);
    }

    public function render()
    {
        return view('livewire.busqueda');
    }
}
