<div>

   
    <x-adminlte-card class="m-0" title="Mi escuela" theme="info" icon="fas fa-school"   maximizable>
    <form wire:submit.prevent="actualizarEscuela" enctype="multipart/form-data">     
        <div class="row">
        <hr class="my-3">
        
        <div class="mb-3 col-md-4">
          <label class="form-label" for="escuela">Nombre de la escuela </label>
          <input type="text" wire:model="nombre" class="form-control" placeholder="Nombre de la escuela">             
          @error('nombre')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3 col-md-4">
          <label class="form-label" for="direccion">Dirección</label>
          <input type="text" wire:model="direccion" class="form-control" placeholder="Dirección">
          @error('direccion')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3 col-md-4">
          <label class="form-label" for="colonia">Colonia</label>
          <input type="text" wire:model="colonia" class="form-control" placeholder="Colonia">
          @error('colonia')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3 col-md-4">
          <label class="form-label" for="telefono">Teléfono</label>
          <input type="text" wire:model="telefono" class="form-control" placeholder="Teléfono">
          @error('telefono')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3 col-md-4">
          <label class="form-label" for="celular">Celular</label>
          <input type="text" wire:model="celular" class="form-control" placeholder="Celular">
          @error('celular')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3 col-md-4">
          <label class="form-label" for="no_int">No. Interior</label>
          <input type="text" wire:model="no_int" class="form-control" placeholder="No. Interior">
          @error('no_int')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3 col-md-4">
          <label class="form-label" for="no_ext">No. Exterior</label>
          <input type="text" wire:model="no_ext" class="form-control" placeholder="No. Exterior">
          @error('no_ext')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3 col-md-4">
          <label class="form-label" for="email">Email</label>
          <input type="email" wire:model="email" class="form-control" placeholder="Email">
          @error('email')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        </div>


    

        <div class="mt-2">
          <button type="submit" class="btn btn-primary ">Guardar cambios</button>
        </div>
      
    </form>


</x-adminlte-card>

</div>
