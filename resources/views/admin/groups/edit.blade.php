@extends('layouts.app')


@section('subtitle', 'Grupos')
@section('content_header_title', 'Grupos')
@section('content_header_subtitle', 'Editar Grupo')
@section('content_body')

<div class="card card-info mt-4">
    <div class="card-header">
        <h3 class="card-title m-0">
          <i class="fas fa-user"></i> EDITAR GRUPO | <span class="badge bg-navy">{{ $grupo->grupo }}</span>
        </h3>
      </div>
      <div class="card-body">
            <livewire:admin.group.editar-grupo :grupo="$grupo" />
      </div>

</div>



@stop

