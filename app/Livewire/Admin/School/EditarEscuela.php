<?php

namespace App\Livewire\Admin\School;

use App\Models\School;
use Livewire\Component;

class EditarEscuela extends Component
{
    public $school;

    public function render()
    {

        return view('livewire.admin.school.editar-escuela');
    }
}
