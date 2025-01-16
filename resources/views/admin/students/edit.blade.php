@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Estudiante | <span class="badge badge-success">{{ $student->nombre }} {{ $student->apellidoP }}  {{ $student->apellidoM }}</span></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.students.index') }}" class="btn btn-primary">Volver</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.students.update', $student) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="curp">CURP</label>
                            <input type="text" name="curp" class="form-control" value="{{ $student->curp }}" placeholder="CURP">
                            @error('curp')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            
                            <label for="matricula">Matricula</label>
                            <input type="text" name="matricula" class="form-control" value="{{ $student->matricula }}" placeholder="Matricula">
                            @error('matricula')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
        
                        </div>
        
                        <div class="form-group">
        
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $student->nombre }}" placeholder="Nombre">
                            @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
        
                        </div>
                        <div class="form-group">
        
                            <label for="apellidoP">Apellido Paterno</label>
                            <input type="text" name="apellidoP" class="form-control" value="{{  $student->apellidoP }}" placeholder="Apellido Paterno">
                            @error('apellidoP')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="apellidoM">Apellido Materno</label>
                            <input type="text" name="apellidoM" class="form-control" value="{{  $student->apellidoM }}" placeholder="Apellido Materno">
                            @error('apellidoM')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
        
                            <label for="edad">Edad</label>
                            <input type="number" name="edad" class="form-control" value="{{ $student->edad }}" placeholder="Edad">
                            @error('edad')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="fechaNacimiento">Fecha de Nacimiento</label>
                            <input type="date" name="fechaNacimiento" class="form-control" value="{{$student->fechaNacimiento }}" placeholder="Fecha de Nacimiento">
                            @error('fechaNacimiento')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                        





                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="H" {{ $student->sexo == 'H' ? 'checked' : '' }}>
                                <label class="form-check-label" for="sexoM">
                                    HOMBRE
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexoF" value="M" {{ $student->sexo == 'M' ? 'checked' : '' }}>
                                <label class="form-check-label" for="sexoF">
                                    MUJER
                                </label>
                            </div>
                            @error('sexo')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="level_id">Nivel</label>
                            <select name="level_id" id="level_id" class="form-control">
                                <option value="">Seleccione un nivel</option>
                                @foreach($levels as $level)
                                    <option value="{{ $level->id }}" {{ $student->level_id == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                                @endforeach
                            </select>
                            @error('level_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="grade_id">Grado</label>
                            <select name="grade_id" id="grade_id" class="form-control">
                                <option value="">Seleccione un grado</option>
                                @foreach($grades as $grade)
                                    <option value="{{ $grade->id }}" {{ $student->grade_id == $grade->id ? 'selected' : '' }}>{{ $grade->name }}</option>
                                @endforeach
                            </select>
                            @error('grade_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="group_id">Grupo</label>
                            <select name="group_id" id="group_id" class="form-control">
                                <option value="">Seleccione un grupo</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}" {{ $student->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                                @endforeach
                            </select>
                            @error('group_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="generacion">Generación</label>
                            <select name="generation_id" id="generation_id" class="form-control">
                                <option value="">Seleccione una generación</option>
                                @foreach($generations as $generation)
                                    <option value="{{ $generation->id }}" {{ $student->generation_id == $generation->id ? 'selected' : '' }}>{{ $generation->name }}</option>
                                @endforeach
                            </select>
                            @error('generation_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">


                            <div class="col-2">
                                   <div class="image-wrapper">
                                    @if ($student->image)
                                        <img id="picture" src="{{ Storage::url($student->image->url) }}" alt="">
                                    @else
                                        <img id="picture" src="https://cdn.pixabay.com/photo/2021/08/25/20/42/field-6574455_960_720.jpg" alt="">
                                    @endif

                                </div>
                            </div>

                            <div class="col-10">
                                <div class="form-group">
                                <label for="file">Imagen del alumno</label>
                                <input type="file" accept="image/*" name="file" id="file" class="form-control">
                                @error('file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            </div>
                        </div>

    

                            <div class="form-group mt-5">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $student->status == '1' ? 'selected' : '' }}>ACTIVO</option>
                                    <option value="2" {{ $student->status == '2' ? 'selected' : '' }}>BAJA</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                 
                 

                        
                    </div>

                </div>

     

                <button type="submit" class="btn btn-primary">Guardar</button>

            </form>
  

@stop


@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 2cm;
            height: 3.5cm;
        }
    </style>
@stop

@section('js')
<script>
    // Cambiar la imagen

    document.getElementById("file").addEventListener('change', cambiar);

    function cambiar(event) {

        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("picture").setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(file);

    }
</script>
@stop