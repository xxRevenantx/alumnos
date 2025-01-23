<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tutor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Student $student)
    {
        // return view('admin.tutor.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Tutor $tutor)
    {
        return view('admin.tutor.show', compact('tutor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tutor $tutor)
    {
        return view('admin.tutor.edit', compact('tutor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tutor $tutor)
    {
       $data  = $request->validate([
            'curp' => 'required|size:18|unique:tutors,curp,'.$tutor->id,
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'calle' => 'nullable',
            'exterior' => 'nullable',
            'interior' => 'nullable',
            'localidad' => 'nullable',
            'colonia' => 'nullable',
            'cp' => 'nullable',
            'municipio' => 'nullable',
            'estado' => 'nullable',
            'telefono' => 'nullable',
            'celular' => 'nullable',
            'email' => 'nullable',
            'parentesco' => 'nullable',
            'ocupacion' => 'nullable',

        ]);



        $tutor->update($data);

        return redirect()->route('admin.tutors.edit', $tutor)->with('info', 'El tutor se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tutor $tutor)
    {
        //
    }
}
