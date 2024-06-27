@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-4">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
        <div class="col-6 d-flex justify-content-start">
            <a class="btn btn-primary me-2" href="{{route('clientes.create')}}"><i class="bi bi-plus-circle"></i> Agregar</a>
        </div>
    </div>
    <div class="row">
        <!-- Columna de Clientes -->
        <div class="col-md-12">
            <div class="nav pt-5 mt-3">
                <h3>Categorias</h3>
            </div>
           

            <table class="table">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Direccion</th>
                        <th>Ciudad</th>
                        <th>Correo electronico</th>
                        <th>Telefono</th>
                        <th>Servicio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>

                        <td>{{$loop->iteration}}</td>
                        <td>{{$cliente->nombre}}</td>
                        <td>{{$cliente->apellido}}</td>
                        <td>{{$cliente->direccion}}</td>
                        <td>{{$cliente->ciudad}}</td>
                        <td>{{$cliente->email}}</td>
                        <td>{{$cliente->telefono}}</td>
                        
                        <td>
                            <a href="{{url('/clientes/'.$cliente->id.'/edit')}}" class="btn btn-outline-primary">Editar</a>
                            <form action="{{ url('/clientes/'.$cliente->id) }}" method="POST" style="display:inline">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Eliminar?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Columna de Detalles -->

        <!-- Columna de Citas -->
    </div>

</div>
@endsection