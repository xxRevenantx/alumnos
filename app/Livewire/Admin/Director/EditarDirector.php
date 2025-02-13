<?php

namespace App\Livewire\Admin\Director;

use Livewire\Component;

class EditarDirector extends Component
{

    public $director;

    public $director_id;
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

    public function mount($director)
    {
        $this->director_id = $director->id;
        $this->nombre = trim($director->nombre);
        $this->apellido_paterno = trim($director->apellido_paterno);
        $this->apellido_materno = trim($director->apellido_materno);
        $this->email = trim($director->email);
        $this->telefono = trim($director->telefono);
    }

    public function actualizarDirector()
    {
        $this->validate();

        $this->director->update([
            'nombre' => trim($this->nombre),
            'apellido_paterno' => trim($this->apellido_paterno),
            'apellido_materno' => trim($this->apellido_materno),
            'email' => trim($this->email),
            'telefono' => trim($this->telefono),
        ]);

        session()->flash('mensaje', 'Director actualizado con éxito');
        $this->reset();

        return redirect()->route('admin.directores.index');
    }


    public function render()
    {
        return view('livewire.admin.director.editar-director');
    }
}
