@extends('layouts.app')


@section('subtitle', 'Directores')
@section('content_header_title', 'Directores')
@section('content_header_subtitle', 'Directores')

@section('css')
@include('admin.partials.tablecss')
@endsection

@section('content_body')

    @livewire('admin.director.mostrar-directores')

@stop
