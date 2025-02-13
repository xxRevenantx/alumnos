<?php

namespace App\Livewire\Admin\Supervisor;

use App\Models\Supervisor;
use Livewire\Attributes\On;
use Livewire\Component;

class MostrarSupervisores extends Component
{



    public function eliminarSupervisor($supervisor)
    {
        Supervisor::findOrFail($supervisor)->delete();

        $this->dispatch('supervisorEliminado'); // Dispara evento para actualizar la tabla en el frontend


    }



    public function render()
    {
        $supervisores = Supervisor::all();

        return view('livewire.admin.supervisor.mostrar-supervisores', compact('supervisores'));
    }
}
