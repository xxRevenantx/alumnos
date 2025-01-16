<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Generation;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Level;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('id', 'DESC')->where('status', 1)->get();

        return view('admin.students.index', compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::all();
        $grades = Grade::all();
        $groups = Group::all();
        $generations = Generation::all();
        $tutors = Tutor::all();


        return view('admin.students.create', compact('levels', 'grades', 'groups', 'generations', 'tutors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Student $student)
    {
       $data = $request->validate([
            'curp' => 'required|unique:students|size:18',
            'matricula' => 'required|unique:students|size:14',
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'edad' => 'required|min:1|max:50', // Campo obligatorio, con un mínimo de 1 y un máximo de 100
            'sexo' => 'required|in:H,M', // Campo obligatorio, con valores permitidos H y M            'fechaNacimiento' => 'required',
            'level_id' => 'required|exists:levels,id',
            'grade_id' => 'required|exists:grades,id',
            'group_id' => 'required|exists:groups,id',
            'generation_id' => 'required|exists:generations,id',
            'tutor_id' => 'required|exists:tutors,id',
            'file'=> 'image',
            'status' => 'required|in:1'


        ],
        [
            'curp.required' => 'El campo CURP es obligatorio',
            'curp.unique' => 'El CURP ya existe',
            'curp.size' => 'El CURP debe tener 18 caracteres',
            'matricula.required' => 'El campo matricula es obligatorio',
            'nombre.required' => 'El campo nombre es obligatorio',
            'apellidoP.required' => 'El campo apellido paterno es obligatorio',
            'apellidoM.required' => 'El campo apellido materno es obligatorio',
            'edad.required' => 'El campo edad es obligatorio',
            'edad.min' => 'La edad debe ser mayor a 1',
            'edad.max' => 'La edad debe ser menor a 50',
            'sexo.required' => 'El campo sexo es obligatorio',
            'fechaNacimiento.required' => 'El campo fecha de nacimiento es obligatorio',
            'level_id.required' => 'El campo nivel es obligatorio',
            'grade_id.required' => 'El campo grado es obligatorio',
            'group_id.required' => 'El campo grupo es obligatorio',
            'generation_id.required' => 'El campo generación es obligatorio',
            'tutor_id.required' => 'El campo tutor es obligatorio',
            'file.required' => 'El campo imagen es obligatorio'


        ]
    );
         $students = Student::create($data);  // Creamos el post

        // Creamos la imagen
        if($request->file('file')){  // Depues de crear el post, si hay una imagen, la guardamos en la carpeta posts y creamos un registro en la tabla images con la url de la imagen guardada en la carpeta posts
            $url = Storage::put('students', $request->file('file'));
            $students->image()->create([
                'url' => $url
            ]);
        }   
        // Redirección según la acción seleccionada
        switch ($request->action) {
            case 'guardar':
                return redirect()->route('admin.students.index')->with('info', 'El estudiante se creó con éxito');
            case 'guardar_editar':
                return redirect()->route('admin.students.edit', $students)->with('info', 'El estudiante se creó con éxito y ahora puedes editarlo');
            default:
                return redirect()->route('admin.students.index')->with('info', 'Acción no reconocida');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $levels = Level::all();
        $grades = Grade::all();
        $groups = Group::all();
        $generations = Generation::all();
        return view('admin.students.edit', compact('student', 'levels', 'grades', 'groups', 'generations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'curp' => 'required|size:18,unique:students,'.$student->id,
            'matricula' => 'required|size:14,unique:students,matricula,'.$student->id,
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'edad' => 'required',
            'sexo' => 'required',
            'fechaNacimiento' => 'required',
            'level_id' => 'required|exists:levels,id',
            'grade_id' => 'required|exists:grades,id',
            'group_id' => 'required|exists:groups,id',
            'generation_id' => 'required|exists:generations,id',
            'file'=> 'image',
            'status' => 'required|in:1,2'


        ],
        [
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
            'grade_id.required' => 'El campo grado es obligatorio',
            'group_id.required' => 'El campo grupo es obligatorio',
            'generation_id.required' => 'El campo generación es obligatorio',
            'file.required' => 'El campo imagen es obligatorio'

        ]
    );


     $student->update($data);  // Actualizamos el post

    if($request->file('file')){  // Depues de crear el post, si hay una imagen, la guardamos en la carpeta posts y creamos un registro en la tabla images con la url de la imagen guardada en la carpeta posts
        $url = Storage::put('students', $request->file('file'));
        if($student->image){
            Storage::delete($student->image->url);
            $student->image->update([
                'url' => $url
            ]);
        }else{
            $student->image()->create([
                'url' => $url
            ]);
        }
    }
    return redirect()->route('admin.students.index')->with('info', 'El estudiante se actualizó con éxito');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')->with('info', 'El estudiante se eliminó con éxito');
    }


    public function tutor(Student $student)
    {
        return view('admin.students.tutor', compact('student'));
    }

  
}
