<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Servicio;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
        $clientes=Cliente::all();
        return view('agenda.clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicios=Servicio::all();
        return view('agenda.clientes.create',compact('servicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Cliente = new Cliente;
        $Cliente->nombre = $request->nombre;
        $Cliente->apellido = $request->apellido;
        $Cliente->ciudad = $request->ciudad;
        $Cliente->direccion = $request->direccion;
        $Cliente->email = $request->email;
        $Cliente->telefono = $request->telefono;
        $Cliente->servicio_id = $request->servicio_id;
        $Cliente->save();
        return redirect()->route('clientes.index')->with('datos','Registro guardado correctamente!');
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
    public function edit(string $id)
    {
        $cliente = Cliente::findOrfail($id);
        return view('agenda.cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datosCliente = request()->except(['_token', '_method']);
        Cliente::where('id', '=', $id)->update($datosCliente);

        $cliente = Cliente::findOrfail($id);
        return view('agenda.cliente.edit', compact('cliente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cliente::destroy($id);
        return redirect('clientes');
    }
}
