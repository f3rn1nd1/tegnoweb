@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="titulo pt-3 pb-3">
        Creación de categoría
    </div>
    <form action="{{ url('/ofertas') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">{{'Titulo'}}</label>
            <input type="text" name="titulo" id="titulo" class="form-control">
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">{{'Correo'}}</label>
            <input type="text" name="correo" id="correo" class="form-control">
        </div>
         <div class="mb-3">
            <label for="descripcion" class="form-label">{{'Descripción'}}</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control">
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">{{'Imagen'}}</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">{{'URL'}}</label>
            <input type="text" name="link" id="link" class="form-control">
        </div>

       
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>

@endsection