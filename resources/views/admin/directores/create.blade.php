@extends('layouts.app')


@section('subtitle', 'Directores')
@section('content_header_title', 'Directores')
@section('content_header_subtitle', 'Nuevo director')

@section('css')
@include('admin.partials.tablecss')
@endsection

@section('content_body')


<div class="card card-navy mt-4">

    <div class="card-header">
        <h3 class="card-title m-0">
          <i class="fas fa-user"></i>
          AGREGAR NUEVO DIRECTOR
        </h3>
      </div>
      <div class="card-body">
    @livewire('admin.director.crear-director')


      </div>

</div>



@stop

