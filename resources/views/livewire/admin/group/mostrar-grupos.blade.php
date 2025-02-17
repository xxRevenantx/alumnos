<div>
    <div class="card">
        <div class="card-header">
            @if(session()->has('mensaje'))
                <x-adminlte-alert theme="success" title="Ok!" dismissable>
                  {{  session('mensaje')}}
                </x-adminlte-alert>
              @endif

            <a href="{{ route('admin.groups.create') }}" class="btn btn-info"> <i class="fas fa-users"></i> Nuevo Grupo</a>
        </div>

        <div class="card-body">
            <table class="table table-striped" id="grupos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Grupo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grupos as $key => $grupo)
                    <tr :key="{{ $grupo->id }}">
                        <td>{{ $key+1 }}</td>
                        <td>{{ $grupo->grupo }}</td>
                        <td>
                            <a href="{{ route('admin.groups.edit', $grupo) }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i> Editar</a>
                            <x-adminlte-button onclick="eliminarGrupo({{ $grupo->id }})" class="btn-md" type="button" label="Eliminar" theme="outline-danger" icon="fas fa-lg fa-trash"/>
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
    let eliminarGrupo = (id) => {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "El grupo se eliminará de forma permanente",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Sí, eliminar"
        }).then((result) => {
            if (result.isConfirmed) {
               @this.call('eliminarGrupo', id);
            }
        });
    };

    // Escuchar el evento para recargar la tabla después de la eliminación
    Livewire.on('grupoEliminado', () => {
      location.reload();
    });
</script>

@include('admin.partials.tablejs')

<script>
    new DataTable('#grupos', {
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
                    sheetName: 'Grupos'
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
            "lengthMenu": "Mostrar _MENU_ grupos por página",
            "zeroRecords": "No se encuentran grupos",
            "info": " _TOTAL_ grupos totales",
            "infoEmpty": "No hay grupos",
            "search": "Buscar Grupo:",
            "infoFiltered": "(filtrado de un total de _MAX_ grupos)",
            'paginate': {
                'next': 'Siguiente',
                'previous': 'Anterior'
            }
        },
    });
</script>
@endsection
