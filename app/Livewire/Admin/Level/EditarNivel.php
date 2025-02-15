<?php

namespace App\Livewire\Admin\Level;

use App\Models\Director;
use App\Models\Level;
use App\Models\Supervisor;
use Livewire\Component;

class EditarNivel extends Component
{

    public $level;
    public $level_id;
    public $slug;
    public $color;
    public $cct;
    public $director_id;
    public $supervisor_id;
    public $imagen;
    public $imagen_nueva;



    protected $rules = [
        'level' => 'required',
        'imagen' =>  'image|max:5120|mimes:jpeg,jpg,png',
        'imagen_nueva' =>  'image|max:5120|mimes:jpeg,jpg,png',

    ];

    public function mount($level)
    {
        $this->level_id = $level->id;
        $this->level = trim($level->level);
        $this->slug = $level->slug;
        $this->color = $level->color;
        $this->cct = $level->cct;
        $this->director_id = $level->director_id;
        $this->supervisor_id = $level->supervisor_id;

        $this->imagen = $level->imagen;

    }

    public function actualizarNivel()
    {
        $this->validate();

        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('levels');
            $datos['imagen'] = str_replace('levels/', '', $imagen);
        }

        // ENCONRAR EL NIVEL

        // $level = Level::find($this->level_id);


        $this->level->update([
            'level' => trim($this->level),
            'slug' => $this->slug,
            'color' => $this->color,
            'cct' => $this->cct,
            'director_id' => $this->director_id,
            'supervisor_id' => $this->supervisor_id,
            'imagen' => $datos['imagen'] ?? $this->imagen,

        ]);

        session()->flash('mensaje', 'Nivel actualizado con éxito');
        $this->reset();

        return redirect()->route('admin.levels.index');
    }



    public function render()
    {
        $directores = Director::all();
        $supervisores = Supervisor::all();

        return view('livewire.admin.level.editar-nivel', compact('directores', 'supervisores'));
    }
}
