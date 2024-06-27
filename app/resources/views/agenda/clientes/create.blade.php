@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="titulo pt-3 pb-3">
        Registro
    </div>
    <form action="{{ route('clientes.store') }}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="mb-3">
            <label for="servicio_id" class="form-label">Seleccione un servicio</label>
            <select name="servicio_id" id="servicio_id" class="form-control">
                @foreach($servicios as $servicio)
                <option value="disabled">Elija una opcion</option>
                <option value="{{ $servicio->id }}" >{{ $servicio->servicio }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">{{'Nombre'}}</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">{{'Apellido'}}</label>
            <input type="text" name="apellido" id="apellido" class="form-control">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{'Correo electronico'}}</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="ciudad" class="form-label">{{'Ciudad'}}</label>
            <input type="text" name="ciudad" id="ciudad" class="form-control">
        </div>
        <div class="mb-3">

            <label for="direccion" class="form-label">{{'Direccion'}}</label>
            <input type="text" name="direccion" id="direccion" class="form-control">
        </div>
        <div class="mb-3">

            <label for="telefono" class="form-label">{{'Telefono'}}</label>
            <input type="text" name="telefono" id="telefono" class="form-control">
        </div>
        <input type="submit" value="Agregar" class="btn btn-primary">
    </form>

</div>
@endsection