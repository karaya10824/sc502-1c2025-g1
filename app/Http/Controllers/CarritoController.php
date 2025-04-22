<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
//use App\Models\*;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function guardar(Request $request)
    {
        // Guardar el carrito en la sesión
        session(['carrito' => $request->input('carrito')]);

        return response()->json(['success' => true, 'message' => 'Carrito guardado correctamente.']);
    }

    public function mostrar()
    {
        // Obtener el carrito desde la sesión
        $Carrito = session('carrito', []);

        return view('carrito', compact('Carrito'));
    }
}