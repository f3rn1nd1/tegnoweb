@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4 pb-2">
        <div class="col-4">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
        <div class="col-6 d-flex justify-content-start">
            <a class="btn btn-primary me-2" href="{{route('ofertas.create')}}"><i class="bi bi-plus-circle"></i> Agregar</a>
        </div>
    </div>
    @if(Session::has('Mensaje'))
    <div class="alert alert-success pt-2" role="alert">
        {{Session::get('Mensaje')}}  
    </div>
  
    @endif

    <div class="row">
        <!-- Columna de Clientes -->
        <div class="col-md-12">
            <div class="nav pt-5 mt-3">
                <h5>Puestos de trabajo</h5>
            </div>


            <table class="table">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Imagen</th>
                        <th>Titulo</th>

                        <th>Correo</th>
                        <th>Descripcion</th>
                        <th>Link</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ofertas as $oferta)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <img src="{{ asset('storage/' . $oferta->imagen) }}" alt="" width="100" height="100">
                        </td>
                        <td>{{$oferta->titulo}}</td>

                        <td>{{$oferta->correo}}</td>
                        <td>{{$oferta->descripcion}}</td>
                        <td>{{$oferta->link}}</td>
                        <td><a href="{{url('/ofertas/'.$oferta->id.'/edit')}}" class="btn btn-warning">
                                Editar
                            </a>
                            <form action="{{url('/ofertas/'.$oferta->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" onclick="return confirm('¿Estas seguro de borrar este registro?')" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection