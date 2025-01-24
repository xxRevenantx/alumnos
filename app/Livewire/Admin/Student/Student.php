<?php

namespace App\Livewire\Admin\Student;

use App\Models\Generation;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Level;
use App\Models\Student as ModelsStudent;
use App\Models\Tutor;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Student extends Component
{

    use WithFileUploads;

    public $tutors; // Almacenará la lista de tutores

    public $status = 1;
    public $curp;
    public $matricula;
    public $nombre;
    public $apellidoP;
    public $apellidoM;
    public $edad;
    public $sexo;
    public $fechaNacimiento;
    public $level_id;
    public $grade_id;
    public $group_id;
    public $generation_id;
    public $tutor_id;
    public $file;


    protected $rules = [
        'status' => 'required|in:1',
        'curp' => 'required|unique:students|size:18',
        'matricula' => 'required|unique:students|size:14',
        'nombre' => 'required',
        'apellidoP' => 'required',
        'apellidoM' => 'required',
        'edad' => 'required|integer|min:1|max:50',
        'sexo' => 'required|in:H,M',
        'fechaNacimiento' => 'required',
        'level_id' => 'required|exists:levels,id',
        'grade_id' => 'required|exists:grades,id',
        'group_id' => 'required|exists:groups,id',
        'generation_id' => 'required|exists:generations,id',
        'file'=>  'image|max:1024', // 1MB Max

    ];

    protected $messages =[
        'status.required' => 'El campo estatus es obligatorio',
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
        'grade_id.required' =>  'El campo grado es obligatorio',
        'group_id.required' => 'El campo grupo es obligatorio',
        'generation_id.required' => 'El campo generación es obligatorio',
        'file.required'=> 'El campo foto debe ser una imagen',

    ];

    public function updated($propertyName) // ACTUALIZAR EN TIEMPO REAL
    {
        $this->validateOnly($propertyName);
    }



    public function save(){

                        // Validar los datos
                $this->validate();


                 // Crear el registro del estudiante
                    $student = ModelsStudent::create([
                        'status' => $this->status,
                        'curp' => $this->curp,
                        'matricula' => $this->matricula,
                        'nombre' => $this->nombre,
                        'apellidoP' => $this->apellidoP,
                        'apellidoM' => $this->apellidoM,
                        'edad' => $this->edad,
                        'sexo' => $this->sexo,
                        'fechaNacimiento' => $this->fechaNacimiento,
                        'level_id' => $this->level_id,
                        'grade_id' => $this->grade_id,
                        'group_id' => $this->group_id,
                        'generation_id' => $this->generation_id,
                        'tutor_id' => $this->tutor_id,
                    ]);

                if ($this->file) {
                    $url = $this->file->store('students', 'public');
                    $student->image()->create([
                        'url' => $url,
                    ]);
                }


                // Mostrar un mensaje de éxito
               return redirect()->route('admin.students.index')->with('success', '¡Estudiante registrado con éxito!');


    }


    #[On('tutor-created')]
    public function updateStudent($tutor  = null){
        dd($tutor);
    }

    #[On('tutor-created')]
    public function mount(){
        $this->tutors = Tutor::orderBy('id', 'DESC')->get();
    }




    #[On('tutor-created')]
    public function render()
    {
        $levels = Level::all();
        $grades = Grade::all();
        $groups = Group::all();
        $generations = Generation::all();

        return view('livewire.admin.student.create', compact('levels', 'grades', 'groups', 'generations'));
    }


}
