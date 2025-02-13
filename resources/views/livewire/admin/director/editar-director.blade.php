<div>

    <form wire:submit.prevent="actualizarDirector">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" wire:model.live="nombre" class="form-control" id="nombre" placeholder="Ingrese su nombre">
            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="apellido_paterno">Apellido Paterno</label>
            <input type="text" wire:model.live="apellido_paterno" class="form-control" id="apellido_paterno" placeholder="Ingrese su apellido paterno">
            @error('apellido_paterno') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="apellido_materno">Apellido Materno</label>
            <input type="text" wire:model.live="apellido_materno" class="form-control" id="apellido_materno" placeholder="Ingrese su apellido materno">
            @error('apellido_materno') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" wire:model.live="email" class="form-control" id="email" placeholder="Ingrese su email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" wire:model.live="telefono" class="form-control" id="telefono" placeholder="Ingrese su teléfono">
            @error('telefono') <span class="text-danger">{{ $message }}</span> @enderror
        </div>


        <div>

            <x-adminlte-button class="btn-flat" type="submit" label="Guardar director" theme="success" icon="fas fa-lg fa-save"/>
            <div wire:loading>
                <svg  style="width: 30px; height: 40px; margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path fill="#0A6EFF" stroke="#0A6EFF" stroke-width="15" transform-origin="center" d="m148 84.7 13.8-8-10-17.3-13.8 8a50 50 0 0 0-27.4-15.9v-16h-20v16A50 50 0 0 0 63 67.4l-13.8-8-10 17.3 13.8 8a50 50 0 0 0 0 31.7l-13.8 8 10 17.3 13.8-8a50 50 0 0 0 27.5 15.9v16h20v-16a50 50 0 0 0 27.4-15.9l13.8 8 10-17.3-13.8-8a50 50 0 0 0 0-31.7Zm-47.5 50.8a35 35 0 1 1 0-70 35 35 0 0 1 0 70Z"><animateTransform type="rotate" attributeName="transform" calcMode="spline" dur="2" values="0;120" keyTimes="0;1" keySplines="0 0 1 1" repeatCount="indefinite"></animateTransform></path></svg>
            </div>
        </div>

    </form>





</div>
