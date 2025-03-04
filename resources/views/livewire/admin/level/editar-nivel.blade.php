<div>
    @if(session()->has('mensaje'))
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif

    <form wire:submit.prevent="actualizarNivel" enctype="multipart/form-data">

        <div class="d-flex justify-content-center  align-items-center">
            <div class="upload-area mr-4" id="uploadArea" wire:ignore>
                <h5 class="mb-3">Arrastra y suelta tu logo aquí</h5>
                <p class="text-muted">o</p>
    
                <label for="fileInput" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Nuevo logo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input type="file" wire:model="imagen_nueva" id="fileInput"
                     accept="image/png, image/jpeg" hidden="hidden"></label> <br>
    
                {{-- <button class="btn btn-primary" onclick="document.getElementById('fileInput').click()">Seleccionar archivo</button> --}}
                <img id="preview" class="mt-3 d-none ">
            </div>

            <div class="logo-anterior">
                <h5 class="text-center">Vista previa del logo</h5>
                <img src="{{ asset('storage/levels/'.$imagen) }}" alt="Vista previa" style="max-width: 300px;">
            </div>
        </div>

        @error('imagen') <span class="text-danger">{{ $message }}</span> @enderror

   <hr>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="level">Nivel</label>
                    <input type="text" wire:model.live="level" class="form-control" id="level" placeholder="Ingrese el nivel">
                    @error('level') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" readonly wire:model="slug" class="form-control" id="slug" placeholder="Ingrese el slug">
                    @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="color" wire:model.live="color" class="form-control" id="color" placeholder="Ingrese el color">
                    @error('color') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cct">CCT</label>
                    <input type="text" wire:model.live="cct" class="form-control" id="cct" placeholder="Ingrese el CCT">
                    @error('cct') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="director_id">Director</label>
                    <select name="director_id" id="director_id" class="form-control" wire:model="director_id">
                        <option value="">Seleccione un director</option>
                        @foreach ($directores as $director)
                            <option value="{{ $director->id }}">{{ $director->nombre }} {{ $director->apellido_paterno }} {{ $director->apellido_materno }}</option>
                        @endforeach
                    </select>
                    @error('director_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="supervisor_id">Supervisor</label>
                    <select name="supervisor_id" id="supervisor_id" class="form-control" wire:model="supervisor_id">
                        <option value="">Seleccione un supervisor</option>
                        @foreach ($supervisores as $supervisor)
                            <option value="{{ $supervisor->id }}">{{ $supervisor->nombre }} {{ $supervisor->apellido_paterno }} {{ $supervisor->apellido_materno }}</option>
                        @endforeach
                    </select>
                    @error('supervisor_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>



        <div>
            <x-adminlte-button class="btn-flat" type="submit" label="Guardar Nivel" theme="primary" icon="fas fa-lg fa-save"/>
            <div wire:loading>
                <svg  style="width: 30px; height: 40px; margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path fill="#0A6EFF" stroke="#0A6EFF" stroke-width="15" transform-origin="center" d="m148 84.7 13.8-8-10-17.3-13.8 8a50 50 0 0 0-27.4-15.9v-16h-20v16A50 50 0 0 0 63 67.4l-13.8-8-10 17.3 13.8 8a50 50 0 0 0 0 31.7l-13.8 8 10 17.3 13.8-8a50 50 0 0 0 27.5 15.9v16h20v-16a50 50 0 0 0 27.4-15.9l13.8 8 10-17.3-13.8-8a50 50 0 0 0 0-31.7Zm-47.5 50.8a35 35 0 1 1 0-70 35 35 0 0 1 0 70Z"><animateTransform type="rotate" attributeName="transform" calcMode="spline" dur="2" values="0;120" keyTimes="0;1" keySplines="0 0 1 1" repeatCount="indefinite"></animateTransform></path></svg>
            </div>
        </div>
    </form>
</div>
