<?php

namespace App\Livewire\Admin\Group;

use App\Models\Group;
use Livewire\Component;

class MostrarGrupos extends Component
{

    public function eliminarGrupo($grupo)
    {
        Group::findOrFail($grupo)->delete();

        $this->dispatch('grupoEliminado'); // Dispara evento para actualizar la tabla en el frontend
    }
    
    public function render()
    {
        $grupos = Group::orderBy('grupo', 'asc')->get();
        return view('livewire.admin.group.mostrar-grupos', compact('grupos'));
    }
}
