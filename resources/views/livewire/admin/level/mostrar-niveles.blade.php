<div>
    <div class="card">
        <div class="card-header">
            @if(session()->has('mensaje'))
                <x-adminlte-alert theme="success" title="Ok!" dismissable>
                  {{  session('mensaje')}}
                </x-adminlte-alert>
              @endif

            <a href="{{ route('admin.levels.create') }}" class="btn btn-primary"> <i class="fas fa-user"></i> Nuevo Nivel</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="levels">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nivel</th>
                        <th>Logo</th>
                        <th>Color</th>
                        <th>C.C.T.</th>
                        <th>Director</th>
                        <th>Supervisor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $niveles as $key =>  $nivel)
                    <tr :key = "{{ $nivel->id }}">
                        <td>{{ $key+1}}</td>
                        <td>{{ $nivel->level }}</td>
                        <td><img src="{{ asset('storage/levels/'.$nivel->imagen) }}" alt="{{ $nivel->level }}" width="50"></td>
                        <td><span class="badge badge-primary" style="background-color: {{ $nivel->color }}">{{ $nivel->color }}</span></td>
                        <td>{{ $nivel->cct }}</td>
                        <td>
                            @if($nivel->director)
                                <a href="{{route('admin.directores.edit', $nivel->director->id)}}">
                                    {{ $nivel->director->nombre }} {{ $nivel->director->apellido_paterno }} {{ $nivel->director->apellido_materno }}
                                </a>
                            @else
                                Sin Director
                            @endif
                        </td>
                        <td>
                            @if($nivel->supervisor)
                                <a href="{{route('admin.supervisores.edit', $nivel->supervisor->id)}}">
                                    {{ $nivel->supervisor->nombre }} {{ $nivel->supervisor->apellido_paterno }} {{ $nivel->supervisor->apellido_materno }}
                                </a>
                            @else
                                Sin Supervisor
                            @endif
                        </td>

                        <td>

                            <a href="{{ route('admin.levels.edit',$nivel) }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i> Editar</a>
                            <x-adminlte-button onclick="eliminarNivel({{ $nivel->id }})" class="btn-md" type="button" label="Eliminar" theme="outline-danger" icon="fas fa-lg fa-trash"/>

                            {{-- <button onclick="eliminarnivel({{ $supervisor->id }})" class="btn btn-danger">Eliminar</button> --}}
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
    let eliminarNivel = (id) => {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "El nivel se eliminará de forma permanente",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Sí, eliminar"
        }).then((result) => {
            if (result.isConfirmed) {
               @this.call('eliminarNivel', id );
            }
        });
    };

    // Escuchar el evento para recargar la tabla después de la eliminación
    Livewire.on('nivelEliminado', () => {
      location.reload()
    });
</script>


@include('admin.partials.tablejs')

<script>

new DataTable('#levels', {
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
                    "lengthMenu": "Mostrar _MENU_ niveles por página",
                    "zeroRecords": "No se encuentran niveles",
                    // "info": "Página _PAGE_ de _PAGES_",
                    "info":" _TOTAL_ niveles totales",
                    "infoEmpty": "No hay niveles",

                    "search":         "Buscar Nivel:",

                    "infoFiltered": "(filtrado de un total de _MAX_ niveles )",
                    'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                },

});

</script>


@endsection
