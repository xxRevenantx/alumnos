<div>
    <div class="card">
        <div class="card-header">
            @if(session()->has('mensaje'))
                <x-adminlte-alert theme="success" title="Ok!" dismissable>
                  {{  session('mensaje')}}
                </x-adminlte-alert>
              @endif

            <a href="{{ route('admin.supervisores.create') }}" class="btn btn-primary"> <i class="fas fa-user"></i> Nuevo Supervisor</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="supervisores">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Zona</th>
                        <th>Sector</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $supervisores as $key =>  $supervisor)
                    <tr :key = "{{ $supervisor->id }}">
                        <td>{{ $key+1}}</td>
                        <td>{{ $supervisor->nombre }} {{ $supervisor->apellido_paterno }} {{ $supervisor->apellido_materno }}</td>
                        <td>{{ $supervisor->email }}</td>
                        <td>{{ $supervisor->telefono }}</td>
                        <td>{{ $supervisor->zona }}</td>
                        <td>{{ $supervisor->sector }}</td>
                        <td>

                            <a href="{{ route('admin.supervisores.edit',$supervisor) }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i> Editar</a>
                            <x-adminlte-button onclick="eliminarSupervisor({{ $supervisor->id }})" class="btn-md" type="button" label="Eliminar" theme="outline-danger" icon="fas fa-lg fa-trash"/>

                            {{-- <button onclick="eliminarSupervisor({{ $supervisor->id }})" class="btn btn-danger">Eliminar</button> --}}
                        </td>
                    </tr>
                   @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>



@section('js')


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let eliminarSupervisor = (id) => {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "El supervisor se eliminará de forma permanente",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Sí, eliminar"
        }).then((result) => {
            if (result.isConfirmed) {
               @this.call('eliminarSupervisor', id );
            }
        });
    };

    // Escuchar el evento para recargar la tabla después de la eliminación
    Livewire.on('supervisorEliminado', () => {
      location.reload()
    });
</script>


@include('admin.partials.tablejs')

<script>

new DataTable('#supervisores', {
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
                sheetName: 'Supervisores'

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
                    "lengthMenu": "Mostrar _MENU_ supervisores por página",
                    "zeroRecords": "No se encuentran supervisores",
                    // "info": "Página _PAGE_ de _PAGES_",
                    "info":" _TOTAL_ supervisores totales",
                    "infoEmpty": "No hay supervisores",

                    "search":         "Buscar Supervisor:",

                    "infoFiltered": "(filtrado de un total de _MAX_ supervisores )",
                    'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                },

});

</script>


@endsection
