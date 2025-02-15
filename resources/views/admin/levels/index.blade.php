@extends('layouts.app')


@section('subtitle', 'Niveles')
@section('content_header_title', 'Niveles')
@section('content_header_subtitle', 'Niveles')

@section('css')
@include('admin.partials.tablecss')
@endsection

@section('content_body')

    @livewire('admin.level.mostrar-niveles')

@stop
