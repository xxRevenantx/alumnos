@extends('layouts.app')


@section('subtitle', 'Supervisores')
@section('content_header_title', 'Supervisores')
@section('content_header_subtitle', 'Supervisores')

@section('css')
@include('admin.partials.tablecss')
@endsection

@section('content_body')

    @livewire('admin.supervisor.mostrar-supervisores')

@stop
