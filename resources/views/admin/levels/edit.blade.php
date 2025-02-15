@extends('layouts.app')


@section('subtitle', 'Niveles')
@section('content_header_title', 'Niveles')
@section('content_header_subtitle', 'Editar Nivel')
@section('content_body')

<div class="card card-navy mt-4">
    <div class="card-header">
        <h3 class="card-title m-0">
          <i class="fas fa-user"></i> EDITAR NIVEL | <span class="badge bg-primary">{{ $level->level }}</span>
        </h3>
      </div>
      <div class="card-body">
            <livewire:admin.level.editar-nivel :level="$level" />
      </div>

</div>



@stop

