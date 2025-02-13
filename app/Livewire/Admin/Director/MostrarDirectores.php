<?php

namespace App\Livewire\Admin\Director;

use App\Models\Director;
use Livewire\Component;

class MostrarDirectores extends Component
{


    public function eliminarDirector($director)
    {
        Director::findOrFail($director)->delete();

        $this->dispatch('directorEliminado'); // Dispara evento para actualizar la tabla en el frontend


    }

    public function render()
    {
        $directores = Director::all();
        return view('livewire.admin.director.mostrar-directores', compact('directores'));
    }
}
