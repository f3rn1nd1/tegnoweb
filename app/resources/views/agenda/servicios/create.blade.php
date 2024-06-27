@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="titulo pt-3 pb-3">
        Creación de servicios
    </div>
    <form action="{{ route('servicios.store') }}" method="POST" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Seleccione una categoría</label>
            <select name="categoria_id" id="categoria_id" class="form-control">
                @foreach($categorias as $categoria)
                <option value="disabled">Seleccione</option> 
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="servicio" class="form-label">Servicio</label>
            <input type="text" name="servicio" id="servicio" class="form-control">
        </div>
        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" name="ubicacion" id="ubicacion" class="form-control">
        </div>
        <div class="mb-3">
            <label for="duracion" class="form-label">Duración</label>
            <input type="text" name="duracion" id="duracion" class="form-control">
        </div>
        <div class="mb-3">
            <label for="descr" class="form-label">Descripción</label>
            <textarea name="descr" id="descr" class="form-control" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>
@endsection