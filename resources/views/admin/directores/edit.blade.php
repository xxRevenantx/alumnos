@extends('layouts.app')


@section('subtitle', 'Directores')
@section('content_header_title', 'Directores')
@section('content_header_subtitle', 'Editar Director')
@section('content_body')

<div class="card card-navy mt-4">
    <div class="card-header">
        <h3 class="card-title m-0">
          <i class="fas fa-user"></i> EDITAR DIRECTOR | <span class="badge bg-primary">{{ $director->nombre }} {{ $director->apellido_paterno }} {{ $director->apellido_materno }}</span>
        </h3>
      </div>
      <div class="card-body">
            <livewire:admin.director.editar-director :director="$director" />
      </div>

</div>



@stop

