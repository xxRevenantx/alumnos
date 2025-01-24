@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Inscribir estudiante')
@section('content_header_title', 'Inscribir estudiante')
@section('content_header_subtitle', 'Inscribir estudiante')

{{-- Push extra CSS --}}

{{-- Content body: main page content --}}

@section('content_body')
    <p>Welcome to this beautiful admin panel.</p>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@endpush
