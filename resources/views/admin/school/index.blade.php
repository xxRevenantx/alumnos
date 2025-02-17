@extends('layouts.app')


@section('subtitle', 'Mi escuela')
@section('content_header_title', 'Mi escuela')
@section('content_header_subtitle', 'Mi escuela')

@section('css')
@include('admin.partials.tablecss')
@endsection

@section('content_body')





    @livewire('admin.school.mostrar-escuela')



@stop
