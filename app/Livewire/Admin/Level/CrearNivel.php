<?php

namespace App\Livewire\Admin\Level;

use App\Models\Director;
use App\Models\Level;
use App\Models\Supervisor;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearNivel extends Component
{
    use WithFileUploads;

    public $level;
    public $slug;
    public $imagen;
    public $color;
    public $cct;
    public $director_id;
    public $supervisor_id;



    protected $rules = [
        'level' => 'required',
        // 'slug' => 'required|unique:levels',
        'imagen' =>  'image|max:5120|mimes:jpeg,jpg,png',
    ];

    public function guardarNivel()
    {

        $datos = $this->validate();

        // $imagen = Storage::putFile('public/vacantes', new File($this->imagen[0]['path']));
        $imagen = $this->imagen->store('levels');
        $datos["imagen"] = str_replace('levels/', '', $imagen);


        Level::create([
            'level' => $this->level,
            'slug' => $this->slug,
            'imagen' => $datos["imagen"],
            'color' => $this->color,
            'cct' => $this->cct,
            'director_id' => $this->director_id,
            'supervisor_id' => $this->supervisor_id,

        ]);

        $this->reset();

        session()->flash('mensaje', 'Nivel creado con éxito');

        return redirect()->route('admin.levels.index');

    }

    public function mount(){
        $this->level = $this->slug;
    }


    public function render()
    {
        $directores = Director::all();
        $supervisores = Supervisor::all();

        return view('livewire.admin.level.crear-nivel', compact('directores', 'supervisores'));
    }
}
