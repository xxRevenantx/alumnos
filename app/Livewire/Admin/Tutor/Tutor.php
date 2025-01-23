<?php

namespace App\Livewire\Admin\Tutor ;

use App\Models\Student;
use App\Models\Tutor as ModelsTutor;
use Livewire\Component;

class Tutor extends Component
{

        public $tutors; // Almacenará la lista de tutores
        public $students; // Almacenará la lista de estudiantes




        public $curp;
        public $nombre;
        public $apellidoP;
        public $apellidoM;
        public $calle;
        public $exterior;
        public $interior;
        public $localidad;
        public $colonia;
        public $cp;
        public $municipio;
        public $estado;
        public $telefono;
        public $celular;
        public $email;
        public $parentesco;
        public $ocupacion;

        protected $messages = [
            'curp.required' => 'El campo CURP es obligatorio',
            'curp.unique' => 'El CURP ya existe',
            'curp.size' => 'El CURP debe tener 18 caracteres',
            'nombre.required' => 'El campo nombre es obligatorio',
            'apellidoP.required' => 'El campo apellido paterno es obligatorio',
            'apellidoM.required' => 'El campo apellido materno es obligatorio',
        ];

        protected $rules = [
            'curp' => 'required|unique:tutors|size:18',
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',


        ];

        public function updated($propertyName) // ACTUALIZAR EN TIEMPO REAL
        {
            $this->validateOnly($propertyName);
        }

        public function mount()
        {
            // Cargar los tutores al montar el componente
            $this->getTutors();
        }

    public function saveTutor(){
        $this->validate();

        $tutor = ModelsTutor::create([
            'curp' => $this->curp,
            'nombre' => $this->nombre,
            'apellidoP' => $this->apellidoP,
            'apellidoM' => $this->apellidoM,
            'calle' => $this->calle,
            'exterior' => $this->exterior,
            'interior' => $this->interior,
            'localidad' => $this->localidad,
            'colonia' => $this->colonia,
            'cp' => $this->cp,
            'municipio' => $this->municipio,
            'estado' => $this->estado,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'email' => $this->email,
            'parentesco' => $this->parentesco,
            'ocupacion' => $this->ocupacion,
        ]);

        $this->reset([
            'curp',
            'nombre',
            'apellidoP',
            'apellidoM',
            'calle',
            'exterior',
            'interior',
            'localidad',
            'colonia',
            'cp',
            'municipio',
            'estado',
            'telefono',
            'celular',
            'email',
            'parentesco',
            'ocupacion',
        ]);

            $this->getTutors();



            $this->dispatch('tutorRegistered', tutor: $this->tutors);



           // O puedes mostrar un mensaje de éxito
           session()->flash('message', '¡Tutor creado correctamente!');



    }



    public function destroyTutor(ModelsTutor $tutor)
    {

        // if ($tutor) {
        //     // Verifica si el tutor tiene dependencias
        //     if ($tutor->students()->count() > 0) {
        //         $this->dispatch('swal', [
        //             'title' => 'Error',
        //             'text' => 'El tutor no se puede eliminar.',
        //             'icon' => 'error'
        //         ]);
        //         return;
        // }



        $tutor->delete();
        $this->getTutors();


        $this->dispatch('swal', [
            'title' => 'Eliminado',
            'text' => 'Tutor eliminado correctamente.',
            'icon' => 'success'
        ]);


    // }

    }


    public function getTutors(){
        $this->tutors = ModelsTutor::orderBY('id', 'DESC')->get();
    }





    public function render()
    {
        return view('livewire.admin.tutor.tutor');
    }







}
