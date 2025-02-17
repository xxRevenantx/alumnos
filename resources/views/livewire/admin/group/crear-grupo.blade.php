<div>
    @if(session()->has('mensaje'))
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif

    <form wire:submit.prevent="guardarGrupo">
        <div class="form-group">
            <label for="grupo">grupo</label>
            <input type="text" wire:model.live="grupo" class="form-control" id="grupo" placeholder="Ingrese el grupo">
            @error('grupo') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div>

            <x-adminlte-button class="btn-flat" type="submit" label="Guardar Grupo" theme="primary" icon="fas fa-lg fa-save"/>
            <div wire:loading>
                <svg  style="width: 30px; height: 40px; margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path fill="#0A6EFF" stroke="#0A6EFF" stroke-width="15" transform-origin="center" d="m148 84.7 13.8-8-10-17.3-13.8 8a50 50 0 0 0-27.4-15.9v-16h-20v16A50 50 0 0 0 63 67.4l-13.8-8-10 17.3 13.8 8a50 50 0 0 0 0 31.7l-13.8 8 10 17.3 13.8-8a50 50 0 0 0 27.5 15.9v16h20v-16a50 50 0 0 0 27.4-15.9l13.8 8 10-17.3-13.8-8a50 50 0 0 0 0-31.7Zm-47.5 50.8a35 35 0 1 1 0-70 35 35 0 0 1 0 70Z"><animateTransform type="rotate" attributeName="transform" calcMode="spline" dur="2" values="0;120" keyTimes="0;1" keySplines="0 0 1 1" repeatCount="indefinite"></animateTransform></path></svg>
            </div>
        </div>
    </form>
</div>
