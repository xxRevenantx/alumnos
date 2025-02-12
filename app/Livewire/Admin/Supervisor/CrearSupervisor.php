<?php

namespace App\Livewire\Admin\Supervisor;

use App\Models\Supervisor;
use Livewire\Component;

class CrearSupervisor extends Component
{

    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $email;
    public $telefono;
    public $zona;
    public $sector;


    protected $rules = [
        'nombre' => 'required',
        'apellido_paterno' => 'required',
        'apellido_materno' => 'required',
        'email' => 'email',
    ];

    public function guardarSupervisor()
    {
        $this->validate();

        Supervisor::create([
            'nombre' => $this->nombre,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'zona' => $this->zona,
            'sector' => $this->sector,
        ]);

        $this->reset();

        session()->flash('mensaje', 'Supervisor creado con éxito');

        return redirect()->route('admin.supervisores.index');





    }


    public function render()
    {
        return view('livewire.admin.supervisor.crear-supervisor');
    }
}
