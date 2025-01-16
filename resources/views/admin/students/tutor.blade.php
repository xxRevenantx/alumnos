@extends('adminlte::page')

@section('title', 'Tutor')

@section('content_header')
<h1>Agregar Tutor para | <span class="badge badge-success">{{ $student->nombre }} {{ $student->apellidoP }}  {{ $student->apellidoM }}</span></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
        <a href="" class="btn btn-primary">Volver</a>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                </div>

                <div class="form-group">
                    <label for="apellidoP">Apellido Paterno</label>
                    <input type="text" name="apellidoP" class="form-control" id="apellidoP" placeholder="Apellido Paterno" value="{{ old('apellidoP') }}">
                    @error('apellidoP')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    
                    
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