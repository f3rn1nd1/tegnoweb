@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="titulo pt-3 pb-3">
        Creación de categoría
    </div>
    <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="mb-3">
            <label for="nombre" class="form-label">{{'Nombre'}}</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">{{'Descripción'}}</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="5"></textarea>

        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>

@endsection