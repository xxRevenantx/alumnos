@extends('layouts.app')


@section('subtitle', 'Supervisores')
@section('content_header_title', 'Supervisores')
@section('content_header_subtitle', 'Editar supervisor')
@section('content_body')

<div class="card card-navy mt-4">
   {{ $supervisor }}
    <div class="card-header">
        <h3 class="card-title m-0">
          <i class="fas fa-user"></i> EDITAR SUPERVISOR | {{ $supervisor->nombre }} {{ $supervisor->apellido_paterno }} {{ $supervisor->apellido_materno }}
        </h3>
      </div>
      <div class="card-body">
            <livewire:admin.supervisor.editar-supervisor :supervisor = $supervisor />
      </div>

</div>



@stop

