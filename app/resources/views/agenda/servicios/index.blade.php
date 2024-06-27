@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-4">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <div class="col-6 d-flex justify-content-start">
            <a class="btn btn-primary me-2" href="{{route('servicios.create')}}"><i class="bi bi-plus-circle"></i> Agregar</a>

        </div>
    </div>
    <div class="row">
        <!-- Columna de Clientes -->
        <div class="col-md-12">
            <div class="nav pt-5 mt-3">
                <h5>Servicios</h5>
            </div>
            <!-- <div class="card no-margin" style="width: 18rem;" >
            @foreach($servicios as $servicio)
                <div class="card-body ">
                    <h5 class="card-title">{{$servicio->servicio}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$servicio->fecha_inic}}</h6>
                    <a href="#" class="card-link">Ver</a>
    
                </div>
                @endforeach
            </div> -->

            <table class="table">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Servicio</th>
                        <th>Ubicacion</th>
                        <th>Duracion(Minutos)</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servicios as $servicio)
                    <tr>

                        <td>{{$loop->iteration}}</td>
                        <td>{{$servicio->servicio}}</td>
                        <td>{{$servicio->ubicacion}}</td>
                        <td>{{$servicio->duracion}}</td>
                        <td>{{$servicio->descr}}</td>
                        <td>
                            <a href="{{url('/servicios/'.$servicio->id.'/edit')}}" class="btn btn-outline-primary">Editar</a>
                            <form action="{{ url('/servicios/'.$servicio->id) }}" method="POST" style="display:inline">
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
    </div>

</div>
@endsection