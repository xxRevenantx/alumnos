@extends('layouts.app')


@section('subtitle', 'Grupos')
@section('content_header_title', 'Grupos')
@section('content_header_subtitle', 'Grupos')

@section('css')
@include('admin.partials.tablecss')
@endsection

@section('content_body')

    @livewire('admin.group.mostrar-grupos')

@stop
