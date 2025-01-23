@extends('adminlte::page')

@section('title', 'Tutor')

@section('content_header')
    <h1>Tutor  <span class="badge badge-secondary">{{$tutor->nombre}} {{ $tutor->apellidoP }} {{ $tutor->apellidoM }} | CURP: {{ $tutor->curp }}</span></h1>
@stop


@section('content')
<div class="card">
    <div class="card-body">

       <a class="btn btn-primary my-3" href="{{route('admin.tutors.index')}}"><i class="fas fa-reply"></i> Volver</a>
       <a class="btn btn-success my-3" href="{{route('admin.tutors.edit', $tutor)}}"><i class="fas fa-edit"></i> Editar tutor</a>

       <div class="row">
        <div class="col-12 col-md-6">
            <div class="callout callout-info">
                <div class="card-header">
                    <h3 class="card-title">DATOS DEL TUTOR</h3>
                </div>

                <p class="mt-3"><b>Nombre del tutor:</b> {{ $tutor->nombre }} {{ $tutor->apellidoP}} {{$tutor->apellidoM}}</p>
                <p><b>CURP:</b> {{ $tutor->curp }}</p>
                <p><b>Parentesco:</b> {{ $tutor->parentesco }}</p>
                <p><b>Ocupación:</b> {{ $tutor->ocupacion }}</p>
                <p><b>Domicilio:</b> {{$tutor->calle}} ext.{{$tutor->exterior }} int. {{$tutor->interior}} CP. {{$tutor->cp}} Col. {{$tutor->colonia}}</p>
                <p><b>Localidad:</b> {{$tutor->localidad}} </p>
                <p><b>Municipio:</b> {{$tutor->municipio}} </p>
                <p><b>Estado:</b> {{$tutor->estado}} </p>
                <p><b>Teléfono:</b> {{$tutor->telefono}} </p>
                <p><b>Celular:</b> {{$tutor->celular}} </p>
                <p><b>Correo:</b> {{$tutor->email}} </p>



              </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="callout callout-success">
                <div class="card-header mb-4">
                    <h3 class="card-title">ALUMNOS ASIGNADOS</h3>
                </div>
                @foreach ($tutor->students as $student)
                    <div class="card">
                        <div class="card-body">
                            <p><b>Nombre del alumno:</b> {{ $student->nombre }} {{ $student->apellidoP}} {{$student->apellidoM}}</p>
                            <p><b>CURP:</b>{{$student->curp}}</p>
                            <p><b>Matrícula:</b> {{ $student->matricula }}</p>
                            <p><b>Grado:</b> {{ $student->grade_id }}°</p>
                            <p><b>Grupo:</b> {{ $student->group_id }}</p>

                         
                        </div>
                    </div>
                    @endforeach


              </div>
        </div>
    </div>


    </div>
</div>

@stop
