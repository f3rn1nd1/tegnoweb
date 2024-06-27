<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['ofertas']=Oferta::paginate(10);
        return view('ofertas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ofertas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'correo' => 'required|email',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validación de imagen
            'link' => 'nullable|url',
            'descripcion' => 'required',
        ]);

        $datosOferta = $request->except('_token');

        if ($request->hasFile('imagen')) {
            $datosOferta['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }

        Oferta::create($datosOferta);

        return redirect()->route('ofertas.index')
            ->with('Mensaje', 'Oferta laboral creada correctamente.');
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
        $oferta=Oferta::findOrFail($id);
        return view('ofertas.edit',compact('oferta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $datosOferta = $request->except('_token', '_method');

        if ($request->hasFile('imagen')) {
            $oferta=Oferta::findOrFail($id);
            Storage::delete('public/'.$oferta->imagen);
            $datosOferta['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }

        Oferta::where('id', $id)->update($datosOferta);

        return redirect()->route('ofertas.index')
            ->with('Mensaje', 'Oferta actualizada correctamente.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Oferta::destroy($id);
        return redirect('ofertas');
        
    }
}
