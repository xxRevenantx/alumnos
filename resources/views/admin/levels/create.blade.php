@extends('layouts.app')


@section('subtitle', 'Niveles')
@section('content_header_title', 'Niveles')
@section('content_header_subtitle', 'Nuevo nivel')

@section('css')
@include('admin.partials.tablecss')
@endsection

@section('content_body')


<div class="card card-navy mt-4">

    <div class="card-header">
        <h3 class="card-title m-0">
          <i class="fas fa-user"></i>
          AGREGAR NUEVO NIVEL
        </h3>
      </div>
      <div class="card-body">
    @livewire('admin.level.crear-nivel')


      </div>

</div>



@stop
