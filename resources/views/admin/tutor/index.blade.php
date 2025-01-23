@extends('adminlte::page')

@section('title', 'Tutor')

@section('content_header')
    <h1>Listado de tutores</h1>
@stop

@section('css')
@include('admin.partials.tablecss')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @livewire('admin.tutor.tutor')
    </div>
</div>



@stop

@section('js')
@include('admin.partials.tablejs')

<script>
new DataTable('#tutors', {
    layout: {
        topStart: {
            buttons: [{
                extend: 'pdf',
                text: 'Exportar PDF',
                download: 'open',
                exportOptions: {
                    columns: [2, ':visible']
                    }
            }, {
                extend: 'excel',
                text: 'Exportar Excel',
                autoFilter: true,
                sheetName: 'Estudiantes'

            }, {
                extend: 'print',
                text: 'Imprimir'
            }, {
                extend: 'colvis',
                text: 'Columnas Visibles'
            }],

        }
    },

    responsive: true,
    autoWidth: false,
    "language": {
                    "lengthMenu": "Mostrar _MENU_ estudiantes por página",
                    "zeroRecords": "No se encuentran estudiantes",
                    // "info": "Página _PAGE_ de _PAGES_",
                    "info":" _TOTAL_ estudiantes totales",
                    "infoEmpty": "No hay estudiantes",
                    "search":         "Buscar Estudiante:",
                    
                    "infoFiltered": "(filtrado de un total de _MAX_ estudiantes )",
                    'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                },
                
});
</script>
@endsection