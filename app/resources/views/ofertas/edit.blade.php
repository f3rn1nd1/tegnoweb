@extends('layouts.app')

@section('content')
<form action="{{url('/ofertas/' .$oferta->id)}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <label for="titulo">{{'titulo'}}</label>
    <input type="text" name="titulo" id="titulo" value="{{$oferta->titulo}}" class="form-control">

    <label for="correo">{{'Correo'}}</label>
    <input type="text" name="correo" id="correo" value="{{$oferta->correo}}" class="form-control">
    <label for="link">{{'Link'}}</label>
    <input type="text" name="link" id="link" value="{{$oferta->link}}" class="form-control">
    <label for="descripcion">{{'Descripcion'}}</label>
    <input type="text" name="descripcion" id="descripcion" value="{{$oferta->descripcion}}" class="form-control">

    <label for="imagen">Imagen</label>
    <img src="{{ asset('storage/' . $oferta->imagen) }}" alt="" width="100" height="100">
    <input type="file" name="imagen" id="imagen"> 
    <input type="submit" value="Editar" class="btn btn-primary form-control ">
</form>
@endsection