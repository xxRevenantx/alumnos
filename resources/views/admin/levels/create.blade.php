@extends('layouts.app')


@section('subtitle', 'Niveles')
@section('content_header_title', 'Niveles')
@section('content_header_subtitle', 'Nuevo nivel')

@section('css')
@include('admin.partials.tablecss')

<style>
  .upload-area {
      border: 2px dashed #0d6efd;
      border-radius: 10px;
      padding: 30px;
      text-align: center;
      cursor: pointer;
      transition: 0.3s;
  }
  .upload-area:hover {
      background-color: #f8f9fa;
  }
  .upload-area img {
      max-width: 300px;
      width: 100%;
      display: block
      margin-top: 10px;
      border-radius: 10px;
  }
  </style>
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




@section('js')
<script>
    const uploadArea = document.getElementById("uploadArea");
    const fileInput = document.getElementById("fileInput");
    const preview = document.getElementById("preview");

    uploadArea.addEventListener("dragover", (e) => {
        e.preventDefault();
        uploadArea.style.backgroundColor = "#e9ecef";
    });

    uploadArea.addEventListener("dragleave", () => {
        uploadArea.style.backgroundColor = "transparent";
    });

    uploadArea.addEventListener("drop", (e) => {
        e.preventDefault();
        uploadArea.style.backgroundColor = "transparent";
        const file = e.dataTransfer.files[0];
        if (file) {
            showPreview(file);
        }
    });

    fileInput.addEventListener("change", () => {
        const file = fileInput.files[0];
        if (file) {
            showPreview(file);
        }
    });

    function showPreview(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            preview.src = e.target.result;
            preview.classList.remove("d-none");
        };
        reader.readAsDataURL(file);
    }
</script>



@endsection