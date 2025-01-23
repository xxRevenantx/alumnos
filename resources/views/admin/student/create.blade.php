@extends('adminlte::page')

@section('title', 'Dashboard')


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



<div class="card card-info mt-4">

        <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-user"></i>
              INSCRIBIR ESTUDIANTE
            </h3>
          </div>
          <div class="card-body">
        @livewire('admin.student.student')


          </div>

</div>





@stop




@section('js')


<script src="{{asset('vendor/adminlte/dist/js/select2/select2.full.min.js')}}"></script>

<script>

    document.querySelector('input[type="file"]').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const validImageTypes = ['image/jpeg', 'image/png'];
            if (!validImageTypes.includes(file.type)) {
                Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "La imagen no es válida!",
                });
                e.target.value = ''; // Limpia el input
            } else if (file.size > 1024 * 1024) {
                Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "La imagen no debe pesar más de 1MB!",
                });
                e.target.value = ''; // Limpia el input
            }
        }
    });

</script>


<script>


    // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
    });

</script>



@stop
