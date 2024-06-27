<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['categorias'] = Categoria::paginate(8);
        return view('agenda.categoria.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agenda.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Categoria = new Categoria;
        $Categoria->nombre = $request->nombre;
        $Categoria->descripcion = $request->descripcion;
        $Categoria->save();
        return redirect()->route('categorias.index')->with('datos', 'Registro guardado correctamente!');
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
        $categoria = Categoria::findOrfail($id);
        return view('agenda.categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datosCategoria = request()->except(['_token', '_method']);
        Categoria::where('id', '=', $id)->update($datosCategoria);

        $categoria = Categoria::findOrfail($id);
        return view('agenda.categoria.edit', compact('categoria'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Categoria::destroy($id);
        return redirect('categorias');
    }
    public function serviciosPorCategoria(Categoria $categoria)
    {
        $servicios = $categoria->servicios()->paginate(10);
        return view('servicios.index', compact('servicios'));
    }
}
