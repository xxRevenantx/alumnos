@extends('adminlte::page')

@section('title', 'Tutor')

@section('content_header')
<h1>Agregar Tutor para | <span class="badge badge-success">{{ $student->nombre }} {{ $student->apellidoP }}  {{ $student->apellidoM }}</span></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            {{-- <a href="{{ route('admin.tutors.index') }}" class="btn btn-primary">Volver</a> --}}
        </div>
        <div class="card-body">
            {{-- <form action="{{ route('admin.tutors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

            </form> --}}
  

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