@extends('layouts.app')


@section('subtitle', 'Supervisores')
@section('content_header_title', 'Supervisores')
@section('content_header_subtitle', 'Supervisores')

@section('css')
@include('admin.partials.tablecss')
@endsection

@section('content_body')

    <div class="card">
        <div class="card-header">

            @if(session()->has('mensaje'))
            <div class="alert alert-success">{{ session('mensaje') }}</div>

        @endif


            <a href="{{ route('admin.supervisores.create') }}" class="btn btn-primary">Nuevo supervisor</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="supervisores">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>CURP</th>
                        <th>Matrícula</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Edad</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Sexo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

@stop

@section('js')
@include('admin.partials.tablejs')

<script>
new DataTable('#students', {
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

<script>
    function confirmDelete(studentId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Envía el formulario
                document.getElementById(`delete-form-${studentId}`).submit();
            }
        });
    }
</script>






@endsection
