@extends('layouts.app')


@section('subtitle', 'Tutores')
@section('content_header_title', 'Tutores')
@section('content_header_subtitle', 'Listado de tutores')


@section('css')
@include('admin.partials.tablecss')
@endsection

@section('content_body')
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
                sheetName: 'Tutores'

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
                    "lengthMenu": "Mostrar _MENU_ tutores por página",
                    "zeroRecords": "No se encuentran tutores",
                    // "info": "Página _PAGE_ de _PAGES_",
                    "info":" _TOTAL_ tutores totales",
                    "infoEmpty": "No hay tutores",
                    "search":         "Buscar Tutor:",

                    "infoFiltered": "(filtrado de un total de _MAX_ tutores )",
                    'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                },

});
</script>



@endsection
