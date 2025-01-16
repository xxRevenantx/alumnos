<?php

namespace App\Livewire\Admin;

use App\Models\Generation;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Level;
use App\Models\Tutor;
use Livewire\Component;

class Student extends Component
{   


    public $curp;
    public $matricula;
    public $nombre;
    public $apellidoP;
    public $apellidoM;
    public $edad;
    public $sexo;
    public $fechaNacimiento;
    public $level_id;

    protected $rules = [
        'curp' => 'required|unique:students|size:18',
        'matricula' => 'required|unique:students|size:14',
        'nombre' => 'required',
        'apellidoP' => 'required',
        'apellidoM' => 'required',
        'edad' => 'required|integer|min:1|max:50',
        'sexo' => 'required|in:H,M',
        'fechaNacimiento' => 'required',
        'level_id' => 'required|exists:levels,id',
    ];

    protected $messages =[
        'curp.required' => 'El campo CURP es obligatorio',
        'curp.unique' => 'El CURP ya existe',
        'curp.size' => 'El CURP debe tener 18 caracteres',
        'matricula.required' => 'El campo matricula es obligatorio',
        'nombre.required' => 'El campo nombre es obligatorio',
        'apellidoP.required' => 'El campo apellido paterno es obligatorio',
        'apellidoM.required' => 'El campo apellido materno es obligatorio',
        'edad.required' => 'El campo edad es obligatorio',
        'sexo.required' => 'El campo sexo es obligatorio',
        'fechaNacimiento.required' => 'El campo fecha de nacimiento es obligatorio',
        'level_id.required' => 'El campo nivel es obligatorio',
    ];

    public function updated($propertyName) // ACTUALIZAR EN TIEMPO REAL
    {
        $this->validateOnly($propertyName);
    }



        public function save(){

            $validatedData = $this->validate();

    
            // // VALIDAR CAMPOS
            // $data = $this->validate([
            //     'curp' => 'required|unique:students|size:18',
            //     'matricula' => 'required|unique:students|size:14',
            //     'nombre' => 'required',
            //     'apellidoP' => 'required',
            //     'apellidoM' => 'required',
            //     'edad' => 'required|integer|min:1|max:50', // Edad entre 1 y 50, obligatorio y numérico
            //     'sexo' => 'required|in:H,M',
            //     'fechaNacimiento' => 'required',
            //     'level_id' => 'required|exists:levels,id',
            //     // 'grade_id' => 'required|exists:grades,id',
            //     // 'group_id' => 'required|exists:groups,id',
            //     // 'generation_id' => 'required|exists:generations,id',
            //     // 'tutor_id' => 'required|exists:tutors,id',
            //     // 'file'=> 'image',
            //     // 'status' => 'required|in:1'
    
    
            // ],
            // [
            //     'curp.required' => 'El campo CURP es obligatorio',
            //     'curp.unique' => 'El CURP ya existe',
            //     'curp.size' => 'El CURP debe tener 18 caracteres',
            //     'matricula.required' => 'El campo matricula es obligatorio',
            //     'nombre.required' => 'El campo nombre es obligatorio',
            //     'apellidoP.required' => 'El campo apellido paterno es obligatorio',
            //     'apellidoM.required' => 'El campo apellido materno es obligatorio',
            //     'edad.required' => 'El campo edad es obligatorio',
            //     'sexo.required' => 'El campo sexo es obligatorio',
            //     'fechaNacimiento.required' => 'El campo fecha de nacimiento es obligatorio',
            //     'level_id.required' => 'El campo nivel es obligatorio',
            //     // 'grade_id.required' => 'El campo grado es obligatorio',
            //     // 'group_id.required' => 'El campo grupo es obligatorio',
            //     // 'generation_id.required' => 'El campo generación es obligatorio',
            //     // 'tutor_id.required' => 'El campo tutor es obligatorio',
            //     // 'file.required' => 'El campo imagen es obligatorio'
    
    
            
    
            // ]);
    
   
    
    
        }


    public function render()
    {
        $levels = Level::all();
        $grades = Grade::all();
        $groups = Group::all();
        $generations = Generation::all();
        $tutors = Tutor::all();


        return view('livewire.admin.student', compact('levels', 'grades', 'groups', 'generations', 'tutors'));
    }


}
