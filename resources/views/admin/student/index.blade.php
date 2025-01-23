@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
    <h1>Estudiantes</h1>
@stop

@section('css')
@include('admin.partials.tablecss')
@endsection

@section('content')

    <div class="card">
        <div class="card-header">

            @if (session('info'))
                <div class="alert alert-success">{{ session('info') }}</div>
            @endif


            <a href="{{ route('admin.students.create') }}" class="btn btn-primary">Crear Estudiante</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="students">
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
                    @foreach ($students as $key => $student)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                @if($student->image)
                                <img src="{{ Storage::url($student->image->url) }}" alt="{{ $student->nombre }}" width="50">
                                @else
                                <img  src="https://cdn.pixabay.com/photo/2021/08/25/20/42/field-6574455_960_720.jpg" width="50" alt="">
                                @endif
                            </td>
                            <td>{{ $student->curp }}</td>
                            <td>{{ $student->matricula }}</td>
                            <td>{{ $student->nombre }}</td>
                            <td>{{ $student->apellidoP }}</td>
                            <td>{{ $student->apellidoM }}</td>
                            <td>{{ $student->edad }}</td>
                            <td>{{ $student->fechaNacimiento }}</td>
                            <td>{{ $student->sexo }}</td>

                            <td>
                                <a href="{{ route('admin.students.edit', $student) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('admin.students.destroy', $student) }}" method="POST" class="d-inline" id="delete-form-{{ $student->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="button" onclick="confirmDelete({{ $student->id }})">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
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
