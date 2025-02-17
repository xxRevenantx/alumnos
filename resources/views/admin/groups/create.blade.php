@extends('layouts.app')


@section('subtitle', 'Grupos')
@section('content_header_title', 'Grupos')
@section('content_header_subtitle', 'Nuevo Grupo')

@section('css')
@include('admin.partials.tablecss')
@endsection

@section('content_body')


<div class="card card-navy mt-4">

    <div class="card-header">
        <h3 class="card-title m-0">
          <i class="fas fa-user"></i>
          AGREGAR NUEVO GRUPO
        </h3>
      </div>
      <div class="card-body">
    @livewire('admin.group.crear-grupo')


      </div>

</div>



@stop

