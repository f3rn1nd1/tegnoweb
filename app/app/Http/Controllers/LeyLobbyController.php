<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeyLobbyController extends Controller
{
    public function obtenerDatos()
    {
        $apiKey = '$2y$10$p.FKOkt07SJ1bwKQI4GTwug6togUOKWmd/x3FtK70xe'; // Asegúrate de reemplazar esto con tu API key real
        $response = Http::withHeaders([
            'Api-Key' => $apiKey
        ])->get('https://www.leylobby.gob.cl/api/audiencias');

        if ($response->successful()) {
            $audiencias = $response->json();

            // Procesa los datos aquí para extraer la información necesaria
            $cargos = $this->extraerCargosDeAudiencias($audiencias['data']);

            // Retorna o procesa los cargos como necesites
            return view('audiencias.index', compact('cargos'));
        } else {
            // Manejo de errores
            return response()->json(['error' => 'No se pudo obtener los datos de las audiencias'], 500);
        }
    }
    
}
