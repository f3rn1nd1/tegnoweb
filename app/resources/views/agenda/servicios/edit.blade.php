@extends('layouts.app')

@section('content')
<form action="{{url('/servicios/'. $servicio->id)}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <div class="group mt-3">
        <label for="servicio" class="form-label">{{'servicio'}}</label>
        <input type="text" name="servicio" id="servicio" value="{{$servicio->servicio}}" class="form-control">
    </div>
    <div class="group mt-3">
        <label for="ubicacion" class="form-label">{{'Ubicacion'}}</label>
        <input type="text" name="ubicacion" id="ubicacion" value="{{$servicio->ubicacion}}" class="form-control">
    </div>
    <div class="group mt-3">
        <label for="duracion" class="form-label">{{'Duracion'}}</label>
        <input type="text" name="duracion" id="duracion" value="{{$servicio->duracion}}" class="form-control">
    </div>
    <div class="group mt-3">
        <label for="descr" class="form-label">{{'Descripcion'}}</label>
        <textarea name="descripcion" id="descripcion" class="form-control" rows="5">{{$servicio->descr}}</textarea>

    </div>

    <input type="submit" value="Modificar" class="btn btn-primary mt-3">
    <a href="{{ route('servicios.index') }}" class="btn btn-secondary mt-3">Regresar</a>

</form>

@endsection