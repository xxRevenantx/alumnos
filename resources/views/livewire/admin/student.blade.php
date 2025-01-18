<div>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.students.index') }}" class="btn btn-primary">Volver</a>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="status" value="1" wire:model.live.debounce.500ms="status" hidden>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="curp">CURP</label>
                            <input type="text" name="curp" class="form-control" wire:model.live.debounce.500ms="curp" 
                                placeholder="CURP">
                                @error('curp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <label for="matricula">Matricula</label>
                            <input type="text" name="matricula" class="form-control" wire:model.live.debounce.500ms="matricula"
                                placeholder="Matricula">
                            @error('matricula')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" wire:model.live.debounce.500ms="nombre"
                                placeholder="Nombre">
                            @error('nombre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="form-group">

                            <label for="apellidoP">Apellido Paterno</label>
                            <input type="text" name="apellidoP" class="form-control" wire:model.live.debounce.500ms="apellidoP"
                                placeholder="Apellido Paterno">
                            @error('apellidoP')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="apellidoM">Apellido Materno</label>
                            <input type="text" name="apellidoM" class="form-control" wire:model.live.debounce.500ms="apellidoM"
                                placeholder="Apellido Materno">
                            @error('apellidoM')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">

                            <label for="edad">Edad</label>
                            <input type="number" name="edad" class="form-control" wire:model.live.debounce.500ms="edad"
                                placeholder="Edad">
                            @error('edad')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="fechaNacimiento">Fecha de Nacimiento</label>
                            <input type="date" name="fechaNacimiento" class="form-control" wire:model.live.debounce.500ms="fechaNacimiento"  placeholder="Fecha de Nacimiento">
                            @error('fechaNacimiento')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                    
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="H" wire:model.live.debounce.500ms="sexo">
                                <label class="form-check-label" for="sexoM">
                                    HOMBRE
                                </label>
                            </div>
                    
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexoF" value="M" wire:model.live.debounce.500ms="sexo">
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
                            <select name="level_id" id="level_id" class="form-control" wire:model.live.debounce.500ms="level_id">
                                <option value="">Seleccione un nivel</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('level_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="grade_id">Grado</label>
                            <select name="grade_id" id="grade_id" class="form-control"  wire:model.live.debounce.500ms="grade_id">
                                <option value="">Seleccione un grado</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('grade_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="group_id">Grupo</label>
                            <select name="group_id" id="group_id" class="form-control"  wire:model.live.debounce.500ms="group_id">
                                <option value="">Seleccione un grupo</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('group_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="generacion">Generación</label>
                            <select name="generation_id" id="generation_id" class="form-control"  wire:model.live.debounce.500ms="generation_id">
                                <option value="">Seleccione una generación</option>
                                @foreach ($generations as $generation)
                                    <option value="{{ $generation->id }}">
                                        {{ $generation->name }}</option>
                                @endforeach
                            </select>
                            @error('generation_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                      
                            <div class="row justify-center d-flex align-items-center">
                                <div class="col-md-9">
                                    <div class="form-group">

                                    <label for="tutor_id">Tutor</label>
                                    <select name="tutor_id" id="tutor_id" class="form-control select2bs4"
                                        style="width: 100%;"  wire:model.live.debounce.500ms="tutor_id">
                                        <option value="">Seleccione un tutor</option>
                                        @foreach ($tutors as $tutor)
                                            <option value="{{ $tutor->id }}">{{ $tutor->nombre }}
                                                {{ $tutor->apellidoP }} {{ $tutor->apellidoM }} => {{ $tutor->curp }}</option>
                                        @endforeach
                                    </select>
        
                                    @error('tutor_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
        
                                </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                 <label for=""></label>
                                    {{-- <a target="_blank" href="{{ route('admin.tutors.create') }}" class="btn btn-success d-block">Nuevo tutor</a> --}}
                                     {{-- Example button to open modal --}}
                                    <x-adminlte-button label="Agrega tutor" data-toggle="modal" data-target="#modalPurple" class="bg-purple d-block"/>
                                </div>
                                </div>


                            </div>

                     
                        <div class="mb-3">
                            <div class="form-group p-3"
                                style="border: thin solid rgba(0,0,0,0.25); border-radius: 5px; position:relative; margin-top: 30px">
                                <h6
                                    style="padding: 0 5px ;position:absolute; top: -10px; left: 20px; background:#fff;">
                                    <b>SUBIR FOTO</b></h6>

                                <div class="row">
                                    <div class="col-md-2 col-lg-2">
                                        <div class="image-wrapper">

                                              <!-- Mensajes de éxito -->
                                                @if (session()->has('message'))
                                                <div class="alert alert-success">{{ session('message') }}</div>
                                                  @endif

                                                <!-- Vista previa -->
                                                @if ($file)
                                                <img src="{{ $file->temporaryUrl() }}" alt="Vista previa" style="max-width: 300px;">
                                                @else
                                                <img id="picture"
                                                src=" https://cdn.pixabay.com/photo/2023/12/12/15/36/sea-8445435_960_720.jpg">
                                                @endif


                                          

                                        </div>

                                    </div>



                                    <div class="col-md-10 col-lg-10" style="overflow: hidden">
                                        <div class="form-group">
                                            <label for="file">Imagen del alumno</label>
                                            <input type="file" wire:model="file" id="file" class="form-control" accept="image/*">
                                         
                                            <div wire:loading wire:target="file" class="alert alert-primary mt-3 w-100">Cargando...</div>
                                            <span>Tamaño de imagen 2.3cm x 3cm. Máximo 1mb.</span> <br>
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
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu">
                                <button type="submit" name="action" value="guardar"
                                    class="dropdown-item">Guardar</button>
                                <button type="submit" name="action" value="guardar_editar"
                                    class="dropdown-item">Guardar y editar</button>
                            </div>
                        </div>

                       






                    </div>

                </div>
            </form>

            
            

            @livewire('admin.tutor')
                               





        </div>
    </div>
</div>
