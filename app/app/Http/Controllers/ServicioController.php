<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Categoria;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtener el ID de la categoría
        $categoriaId = $request->input('categoria_id');

        // Si se proporciona un ID de categoría, filtrar los servicios por esa categoría
        if ($categoriaId) {
            $servicios = Servicio::where('categoria_id', $categoriaId)->paginate(5);
        } else {
            // Si no se proporciona un ID de categoría, mostrar todos los servicios
            $servicios = Servicio::paginate(5);
        }

        // Obtener todas las categorías para el filtro
        $categorias = Categoria::all();

        return view('agenda.servicios.index', compact('servicios', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias=Categoria::all();
        return view('agenda.servicios.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Servicio = new Servicio;
        $Servicio->servicio = $request->servicio;
        $Servicio->ubicacion = $request->ubicacion;
        $Servicio->duracion = $request->duracion;
        $Servicio->descr = $request->descr;
        $Servicio->categoria_id = $request->categoria_id;
        $Servicio->save();
        return redirect()->route('servicios.index')->with('datos','Registro guardado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $servicio=Servicio::findOrfail($id);
        return view('agenda.servicios.edit',compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datosServicio=request()->except(['_token','_method']);
        Servicio::where('id','=',$id)->update($datosServicio);

        $servicio=Servicio::findOrfail($id);
        return view('agenda.servicios.edit',compact('servicio'));
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Servicio::destroy($id);
       return redirect('servicios');
    }
}
