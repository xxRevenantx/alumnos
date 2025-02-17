<?php

namespace App\Livewire\Admin\School;

use App\Models\School;
use Livewire\Component;

class MostrarEscuela extends Component
{

             public $school_id,
             $id,
             $nombre,
            $direccion,
            $colonia,
            $telefono,
            $celular,
            $no_ext,
            $no_int,
            $email;
    
    
    public function mount(){
        $school = School::first();
        if ($school) {
        $this->school_id = $school->id;
        $this->nombre = $school->nombre;
        $this->direccion = $school->direccion;
        $this->colonia = $school->colonia;
        $this->telefono = $school->telefono;
        $this->celular = $school->celular;
        $this->no_ext = $school->no_ext;
        $this->no_int = $school->no_int;
        $this->email = $school->email;
        }
    }


    public function guardarEscuela (){
        $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'nullable|max:10',
            'celular' => 'nullable|max:10',
            'email' => 'email|nullable',
        ]);

        $school = School::first();

        if ($school) {
            $school->update([
                'nombre' => $this->nombre,
                'direccion' => $this->direccion,
                'colonia' => $this->colonia,
                'telefono' => $this->telefono,
                'celular' => $this->celular,
                'no_ext' => $this->no_ext,
                'no_int' => $this->no_int,
                'email' => $this->email,
                'user_id' => auth()->user()->id,
            ]);

        } else {
            School::create([
                'nombre' => $this->nombre,
                'direccion' => $this->direccion,
                'colonia' => $this->colonia,
                'telefono' => $this->telefono,
                'celular' => $this->celular,
                'no_ext' => $this->no_ext,
                'no_int' => $this->no_int,
                'email' => $this->email,
                'user_id' => auth()->user()->id,
            ]);
        }

        if ($school) {
            session()->flash('mensajeActualizar', 'Datos actualizados correctamente');
        } else {
            session()->flash('mensaje', 'Datos agregados correctamente');
        }
        
    }

    public function render()
    {
        return view('livewire.admin.school.mostrar-escuela');
    }
}
