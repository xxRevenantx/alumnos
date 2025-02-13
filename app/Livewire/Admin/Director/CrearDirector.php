<?php

namespace App\Livewire\Admin\Director;

use App\Models\Director;
use Livewire\Component;

class CrearDirector extends Component
{

    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $email;
    public $telefono;



    protected $rules = [
        'nombre' => 'required',
        'apellido_paterno' => 'required',
        'apellido_materno' => 'required',
    ];

    public function guardarDirector()
    {
        $this->validate();

        Director::create([
            'nombre' => $this->nombre,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'email' => $this->email,
            'telefono' => $this->telefono,
        ]);

        $this->reset();

        session()->flash('mensaje', 'Director creado con éxito');

        return redirect()->route('admin.directores.index');





    }


    public function render()
    {
        return view('livewire.admin.director.crear-director');
    }
}
