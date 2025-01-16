@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo estudiante</h1>
@stop

@section('css')

<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/select2/select2-bootstrap4.min.css') }}">


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

@section('content')

   @livewire('admin.student')

@stop




@section('js')


<script src="{{asset('vendor/adminlte/dist/js/select2/select2.full.min.js')}}"></script>


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


    // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
    });


</script>
@stop