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
            <a class="btn btn-primary me-2" href="{{route('categorias.create')}}"><i class="bi bi-plus-circle"></i> Agregar</a>
        </div>
    </div>
    <div class="row">
        <!-- Columna de Clientes -->
        <div class="col-md-12">
            <div class="nav pt-5 mt-3">
                <h3>Categorias</h3>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                    <tr>

                        <td>{{$loop->iteration}}</td>
                        <td>{{$categoria->nombre}}</td>
                        <td>{{$categoria->descripcion}}</td>
                        <td><a href="{{url('/categorias/'.$categoria->id.'/edit')}}" class="btn btn-outline-primary">Editar</a>
                            <form action="{{ url('/categorias/'.$categoria->id) }}" method="POST" style="display:inline">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Eliminar?')">Borrar</button>
                            </form>
                        </td>
                        <td><a href="{{route('servicios.index', ['categoria_id' => $categoria->id])}}"><i class="bi bi-eye-fill"></i></a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection