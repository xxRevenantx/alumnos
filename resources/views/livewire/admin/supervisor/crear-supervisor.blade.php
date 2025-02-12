<div>
    @if(session()->has('mensaje'))
        <div class="alert alert-success">{{ session('mensaje') }}</div>

    @endif
    <form wire:submit.prevent="guardarSupervisor">
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
        <div class="form-group">
            <label for="zona">Zona</label>
            <input type="text" wire:model.live="zona" class="form-control" id="zona" placeholder="Ingrese su zona">
            @error('zona') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="sector">Sector</label>
            <input type="text" wire:model.live="sector" class="form-control" id="sector" placeholder="Ingrese su sector">
            @error('sector') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            Enviar
            <div wire:loading>
            <svg wire:load xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" style="width: 30px; height: 40px; margin-left: 10px;">
            <linearGradient id="a6">
                <stop offset="0" stop-color="#FFFFFF" stop-opacity="0"></stop>
                <stop offset="1" stop-color="#FFFFFF"></stop>
            </linearGradient>
            <circle fill="none" stroke="url(#a6)" stroke-width="15" stroke-linecap="round" stroke-dasharray="0 44 0 44 0 44 0 44 0 360" cx="100" cy="100" r="70" transform-origin="center">
                <animateTransform type="rotate" attributeName="transform" calcMode="discrete" dur="2" values="360;324;288;252;216;180;144;108;72;36" repeatCount="indefinite"></animateTransform>
            </circle>
            </svg>
        </div>
        </button>
    </form>
</div>
