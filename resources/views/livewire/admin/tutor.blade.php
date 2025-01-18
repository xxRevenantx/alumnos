    <x-adminlte-modal id="modalPurple" title="Theme Purple" theme="purple" icon="fas fa-bolt" size='lg'
        disable-animations>
        <form wire:submit.prevent="saveTutor" enctype="multipart/form-data">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" wire:model.live.debounce.500ms="nombre"
                placeholder="Nombre" wire:model.live.debounce.500ms="nombre">
                @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <label for="apellidoP">Apellido Paterno</label>
            <input type="text" name="apellidoP" class="form-control" wire:model.live.debounce.500ms="apellidoP"
                placeholder="Apellido Paterno" wire:model.live.debounce.500ms="apellidoP">
                @error('apellidoP')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <label for="apellidoM">Apellido Materno</label>
            <input type="text" name="apellidoM" class="form-control" wire:model.live.debounce.500ms="apellidoM"
                placeholder="Apellido Materno" wire:model.live.debounce.500ms="apellidoM">
                @error('apellidoM')
                <span class="text-danger">{{ $message }}</span>
            @enderror


            <button type="submit" class="btn btn-primary">Agrega tutor</button>

        </form>

    </x-adminlte-modal>
