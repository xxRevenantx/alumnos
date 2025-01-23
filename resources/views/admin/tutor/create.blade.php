@extends('adminlte::page')

@section('title', 'Tutor')

@section('content_header')
    <h1>Agregar tutor {{ $student->id }}</h1>
@stop

@section('content')

{{-- @livewire('admin.tutor') --}}


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