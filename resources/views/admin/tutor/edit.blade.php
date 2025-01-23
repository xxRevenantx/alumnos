@extends('adminlte::page')

@section('title', 'Tutor')

@section('content_header')
    <h1>Editar tutor  <span class="badge badge-primary">{{$tutor->nombre}} {{ $tutor->apellidoP }} {{ $tutor->apellidoM }} | CURP: {{ $tutor->curp }}</span></h1>
@stop


@section('content')
<div class="card">
    <div class="card-body">


        <a class="btn btn-primary my-3" href="{{route('admin.tutors.index')}}"><i class="fas fa-reply"></i> Volver</a>
        <a class="btn btn-success my-3" href="{{route('admin.tutors.index')}}"><i class="fas fa-edit"></i> Crear nuevo tutor</a>


             @if (session('info'))
                <div class="alert alert-success">
                    {{ session('info') }}
                </div>

             @endif

            <form action="{{ route('admin.tutors.update', $tutor) }}" method="POST">
                @method('put')
                @csrf
                <div class="row">

                    <div class="col-12 col-md-6">

                              <div class="form-group">
                            <label for="curp" >CURP</label>
                            <input type="text" name="curp" class="form-control" value="{{ $tutor->curp }}" >
                            @error('curp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                              <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ $tutor->nombre }}" >
                            @error('nombre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                              <div class="form-group">
                            <label for="apellidoP">Apellido Paterno</label>
                            <input type="text" name="apellidoP" class="form-control"
                               placeholder="Apellido Paterno" value="{{ $tutor->apellidoP }}">
                            @error('apellidoP')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                              <div class="form-group">
                            <label for="apellidoM">Apellido Materno</label>
                            <input type="text" name="apellidoM" class="form-control" placeholder="Apellido Materno" value="{{ $tutor->apellidoM }}">
                            @error('apellidoM')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                              <div class="form-group">
                            <label for="calle">Calle</label>
                            <input type="text" name="calle" class="form-control" value="{{ $tutor->calle }}"
                                placeholder="Calle" >
                            @error('calle')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                              <div class="form-group">
                            <label for="interior">No interior</label>
                            <input type="text" name="interior" class="form-control" value="{{ $tutor->interior }}"
                                placeholder="No. interior">
                            @error('interior')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                              <div class="form-group">
                            <label for="localidad">Localidad</label>
                            <input type="text" name="localidad" class="form-control" value="{{ $tutor->localidad }}"
                                placeholder="Localidad"
                                >
                            @error('localidad')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                              <div class="form-group">
                            <label for="colonia">Colonia</label>
                            <input type="text" name="colonia" class="form-control" value="{{ $tutor->colonia }}"
                                placeholder="Colonia">
                            @error('colonia')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>

                    <div class="col-12 col-md-6">

                              <div class="form-group">
                            <label for="cp">Código Póstal</label>
                            <input type="text" name="cp" class="form-control" value="{{ $tutor->cp }}"
                                placeholder="Código postal"  >
                            @error('cp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                              <div class="form-group">
                            <label for="municipio">Municipio</label>
                            <input type="text" name="municipio" class="form-control"   placeholder="Municipio" value="{{ $tutor->municipio }}">
                            @error('municipio')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                              <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" name="estado" class="form-control" value="{{ $tutor->estado }}"  placeholder="Estado">
                            @error('estado')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                              <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" class="form-control"  placeholder="Teléfono"  value="{{ $tutor->telefono }}"
                                >
                            @error('telefono')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                              <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="text" name="celular" class="form-control" placeholder="Celular" value="{{ $tutor->celular }}"
                                >
                            @error('celular')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                              <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $tutor->email }}"
                                placeholder="Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                              <div class="form-group">
                            <label for="parentesco">Parentesco</label>
                            <input type="text" name="parentesco" class="form-control" placeholder="Parentesco" value="{{ $tutor->parentesco }}"
                               >
                            @error('parentesco')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                              <div class="form-group">
                            <label for="ocupacion">Ocupación</label>
                            <input type="text" name="ocupacion" class="form-control"  placeholder="Ocupación" value="{{ $tutor->ocupacion }}"
                                >
                            @error('ocupacion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-12 my-4">
                            <button type="submit" class="btn btn-success"> Guardar cambios</button>
                        </div>

                    </div>


                </div>



            </form>
    </div>
</div>

@stop
