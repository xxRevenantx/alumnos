@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo estudiante</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.students.index') }}" class="btn btn-primary">Volver</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="status" value="1" hidden>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="curp">CURP</label>
                            <input type="text" name="curp" class="form-control" value="{{ old('curp') }}" placeholder="CURP">
                            @error('curp')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            
                            <label for="matricula">Matricula</label>
                            <input type="text" name="matricula" class="form-control" value="{{ old('matricula') }}" placeholder="Matricula">
                            @error('matricula')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
        
                        </div>
        
                        <div class="form-group">
        
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="Nombre">
                            @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
        
                        </div>
                        <div class="form-group">
        
                            <label for="apellidoP">Apellido Paterno</label>
                            <input type="text" name="apellidoP" class="form-control" value="{{ old('apellidoP') }}" placeholder="Apellido Paterno">
                            @error('apellidoP')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="apellidoM">Apellido Materno</label>
                            <input type="text" name="apellidoM" class="form-control" value="{{ old('apellidoM') }}" placeholder="Apellido Materno">
                            @error('apellidoM')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
        
                            <label for="edad">Edad</label>
                            <input type="number" name="edad" class="form-control" value="{{ old('edad') }}" placeholder="Edad">
                            @error('edad')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="fechaNacimiento">Fecha de Nacimiento</label>
                            <input type="date" name="fechaNacimiento" class="form-control" value="{{ old('fechaNacimiento') }}" placeholder="Fecha de Nacimiento">
                            @error('fechaNacimiento')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="H" {{ old('sexo') == 'H' ? 'checked' : '' }}>
                                <label class="form-check-label" for="sexoM">
                                    HOMBRE
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexoF" value="M" {{ old('sexo') == 'M' ? 'checked' : '' }}>
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
                                    <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
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
                                    <option value="{{ $grade->id }}" {{ old('grade_id') == $grade->id ? 'selected' : '' }}>{{ $grade->name }}</option>
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
                                    <option value="{{ $group->id }}" {{ old('group_id') == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
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
                                    <option value="{{ $generation->id }}" {{ old('generation_id') == $generation->id ? 'selected' : '' }}>{{ $generation->name }}</option>
                                @endforeach
                            </select>
                            @error('generation_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    

                          <div class="mb-3">
                            <div class="form-group p-3" style="border: thin solid rgba(0,0,0,0.25); border-radius: 5px; position:relative; margin-top: 30px">
                        <h6 style="padding: 0 5px ;position:absolute; top: -10px; left: 20px; background:#fff;"><b>FOTO</b></h6>
        
                        <div class="row">
                            <div class="col-md-2 col-lg-2">
                                <div class="image-wrapper">
                                    <img id="picture"
                                        src=" https://cdn.pixabay.com/photo/2023/12/12/15/36/sea-8445435_960_720.jpg">
                                      
                                    </div>
        
                              </div>
        
                            <div class="col-md-10 col-lg-10" style="overflow: hidden">
                                <h5>SUBIR FOTO</h5>
                                <div class="form-group">
                                    <label for="file">Imagen del alumno</label>
                                    <input type="file" accept="image/*" name="file" id="file" class="form-control">
                                    @error('file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
    
                                <hr>
        
                            </div>
                        </div>

                    </div>
    
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Acciones
                                </button>
                                <div class="dropdown-menu">
                                    <button type="submit" name="action" value="guardar" class="dropdown-item">Guardar</button>
                                    <button type="submit" name="action" value="guardar_editar" class="dropdown-item">Guardar y editar</button>
                                    <button type="submit" name="action" value="guardar_agregar_tutor" class="dropdown-item">Guardar y agregar tutor</button>
                                </div>
                            </div>


                           
                 

                        
                    </div>

                </div>

     

                  

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