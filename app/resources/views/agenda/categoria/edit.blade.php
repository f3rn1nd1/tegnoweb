@extends('layouts.app')

@section('content')
<form action="{{url('/categorias/'. $categoria->id)}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <div>
        <h1>Informacion de categoria</h1>
    </div>
    <div class="group mt-3">
        <label for="nombre" class="form-label"> {{'nombre'}}</label>
        <input type="text" name="nombre" id="nombre" value="{{$categoria->nombre}}" class="form-control">
    </div>
    <div class="group-1 mt-3">
        <label for="descripcion"  class="form-label">{{'Descripcion'}}</label>
        <textarea name="descripcion" id="descripcion" class="form-control" rows="5">{{$categoria->descripcion}}</textarea>
    </div>
    <input type="submit" value="Editar" class="btn btn-primary mt-3">
</form>
@endsection