<div x-data="{ deleteTutor(id){
              Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta operación no podrá revertirse',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar'
                }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('destroyTutor', id)
                }
                });
                } }">

    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="saveTutor" enctype="multipart/form-data">
        <div class="row">

            <div class="col-12 col-md-6">
             <div class="form-group">
                    <label for="curp">CURP</label>
                    <input type="text" name="curp" class="form-control text-uppercase" wire:model.live.debounce.500ms="curp"
                        placeholder="curp" wire:model.live.debounce.500ms="curp">
                    @error('curp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
             <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" wire:model.live.debounce.500ms="nombre"
                        placeholder="Nombre" wire:model.live.debounce.500ms="nombre">
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
             <div class="form-group">
                    <label for="apellidoP">Apellido Paterno</label>
                    <input type="text" name="apellidoP" class="form-control"
                        wire:model.live.debounce.500ms="apellidoP" placeholder="Apellido Paterno">
                    @error('apellidoP')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

             <div class="form-group">
                    <label for="apellidoM">Apellido Materno</label>
                    <input type="text" name="apellidoM" class="form-control"
                        wire:model.live.debounce.500ms="apellidoM" placeholder="Apellido Materno">
                    @error('apellidoM')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
             <div class="form-group">
                    <label for="calle">Calle</label>
                    <input type="text" name="calle" class="form-control" wire:model.live.debounce.500ms="calle"
                        placeholder="Calle">
                    @error('calle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
             <div class="form-group">
                    <label for="interior">No interior</label>
                    <input type="text" name="interior" class="form-control" wire:model.live.debounce.500ms="interior"
                        placeholder="No. interior">
                    @error('interior')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
             <div class="form-group">
                    <label for="localidad">Localidad</label>
                    <input type="text" name="localidad" class="form-control"
                        wire:model.live.debounce.500ms="localidad" placeholder="Localidad"
                        >
                    @error('localidad')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
             <div class="form-group">
                    <label for="colonia">Colonia</label>
                    <input type="text" name="colonia" class="form-control" wire:model.live.debounce.500ms="colonia"
                        placeholder="Colonia">
                    @error('colonia')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


            </div>

            <div class="col-12 col-md-6">
             <div class="form-group">
                    <label for="cp">Código Póstal</label>
                    <input type="text" name="cp" class="form-control"
                        placeholder="Código postal" wire:model.live.debounce.500ms="cp">
                    @error('cp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
             <div class="form-group">
                    <label for="municipio">Municipio</label>
                    <input type="text" name="municipio" class="form-control"
                        wire:model.live.debounce.500ms="municipio" placeholder="Municipio">
                    @error('municipio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


             <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" class="form-control" wire:model.live.debounce.500ms="estado"
                        placeholder="Estado">
                    @error('estado')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

             <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" name="telefono" class="form-control"
                        wire:model.live.debounce.500ms="telefono" placeholder="Teléfono"
                        >
                    @error('telefono')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

             <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" class="form-control"
                        wire:model.live.debounce.500ms="celular" placeholder="Celular">
                    @error('celular')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-group">
                <label for="email">Email</label>

                    <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1"    placeholder="Email" wire:model.live.debounce.500ms="email">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                  </div>



             <div class="form-group">
                    <label for="parentesco">Parentesco</label>
                    <input type="text" name="parentesco" class="form-control"
                        wire:model.live.debounce.500ms="parentesco" placeholder="Parentesco"
                       >
                    @error('parentesco')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


             <div class="form-group">
                    <label for="ocupacion">Ocupación</label>
                    <input type="text" name="ocupacion" class="form-control"
                        wire:model.live.debounce.500ms="ocupacion" placeholder="Ocupación"
                        >
                    @error('ocupacion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12 my-4">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                </div>

            </div>


        </div>



    </form>


    {{-- <table class="table table-striped" id="tutors">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">CURP</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Estudiantes asignados</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tutors as $key => $tutor)
                <tr>
                    <td class="text-center">{{ ($key+1) }}</td>
                    <td class="text-center">{{ $tutor->curp }}</td>
                    <td class="text-center">{{ $tutor->nombre }} {{ $tutor->apellidoP }} {{ $tutor->apellidoM }} </td>
                    <td class="text-center">
                        <span class="badge badge-primary" >{{ $tutor->students->count() }}</span>
                    </td>


                    <td>
                        <a href="{{ route('admin.tutors.show', $tutor) }}" class="btn btn-success"><i class="fa fa-eye"></i> Ver</a>
                        <a href="{{ route('admin.tutors.edit', $tutor) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
                        <button class="btn btn-danger" x-on:click="deleteTutor({{$tutor->id}})" type="button">
                            <i class="fa fa-trash"></i> Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
</div>
