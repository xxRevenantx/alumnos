<?php

namespace App\Livewire\Admin\Level;

use App\Models\Level;
use Livewire\Component;

class MostrarNiveles extends Component
{
    public function eliminarNivel($nivel)
    {
        Level::findOrFail($nivel)->delete();

        $this->dispatch('nivelEliminado'); // Dispara evento para actualizar la tabla en el frontend


    }


    public function render()
    {
        $niveles = Level::all();
        return view('livewire.admin.level.mostrar-niveles', compact('niveles'));
    }
}
