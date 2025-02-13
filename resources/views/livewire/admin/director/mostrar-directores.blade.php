<div>
    <div class="card">
        <div class="card-header">
            @if(session()->has('mensaje'))
                <x-adminlte-alert theme="success" title="Ok!" dismissable>
                  {{  session('mensaje')}}
                </x-adminlte-alert>
              @endif

            <a href="{{ route('admin.directores.create') }}" class="btn btn-info"> <i class="fas fa-user"></i> Nuevo Director</a>
        </div>

        <div class="card-body">


            <table class="table table-striped" id="directores">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $directores as $key =>  $director)
                    <tr :key = "{{ $director->id }}">
                        <td>{{ $key+1}}</td>
                        <td>{{ $director->nombre }} {{ $director->apellido_paterno }} {{ $director->apellido_materno }}</td>
                        <td>{{ $director->email }}</td>
                        <td>{{ $director->telefono }}</td>

                        <td>

                            <a href="{{ route('admin.directores.edit',$director) }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i> Editar</a>
                            <x-adminlte-button onclick="eliminarDirector({{ $director->id }})" class="btn-md" type="button" label="Eliminar" theme="outline-danger" icon="fas fa-lg fa-trash"/>

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
    let eliminarDirector = (id) => {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "El director se eliminará de forma permanente",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Sí, eliminar"
        }).then((result) => {
            if (result.isConfirmed) {
               @this.call('eliminarDirector', id );
            }
        });
    };

    // Escuchar el evento para recargar la tabla después de la eliminación
    Livewire.on('directorEliminado', () => {
      location.reload()
    });
</script>


@include('admin.partials.tablejs')

<script>

    new DataTable('#directores', {
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
                        "lengthMenu": "Mostrar _MENU_ directores por página",
                        "zeroRecords": "No se encuentran directores",
                        // "info": "Página _PAGE_ de _PAGES_",
                        "info":" _TOTAL_ directores totales",
                        "infoEmpty": "No hay directores",

                        "search":         "Buscar Director:",

                        "infoFiltered": "(filtrado de un total de _MAX_ directores )",
                        'paginate': {
                            'next': 'Siguiente',
                            'previous': 'Anterior'
                        }
                    },

    });

    </script>



@endsection
