@extends('layouts.app')


@section('subtitle', 'Supervisores')
@section('content_header_title', 'Supervisores')
@section('content_header_subtitle', 'Nuevo supervisor')

@section('css')
@include('admin.partials.tablecss')
@endsection

@section('content_body')


<div class="card card-navy mt-4">

    <div class="card-header">
        <h3 class="card-title m-0">
          <i class="fas fa-user"></i>
          AGREGAR NUEVO SUPERVISOR
        </h3>
      </div>
      <div class="card-body">
    @livewire('admin.supervisor.crear-supervisor')


      </div>

</div>



@stop

