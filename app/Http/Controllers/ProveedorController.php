<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Compra;
use Illuminate\Http\Request;
use App\Models\Proveedor;
//use App\Models\*;
use Exception;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller{
    public function index(){
        $Proveedores = Proveedor::all();
        $Compras = Compra::with('Proveedor')->get();
        $active = "proveedor";

        return view('proveedor.listado', compact('Compras', 'Proveedores', 'active'));
    }

    public function create(Request $request){
        // Obtener todos los productos
        $proovedor = Proveedor::create([
            'nombre_proveedor' => $request->nombre_proveedor,
            'direccion_proveedor' => $request->direccion_proveedor,
            'telefono_proveedor' => $request->telefono_proveedor,
            'correo_proveedor' => $request->correo_proveedor,
            'FK_id_estado' => 1,
        ]);

        return redirect()->route('proveedor-vista');
    }

    public function eliminar($id_proveedor){
        // Buscar el proovedor
        $proovedor = Proveedor::find($id_proveedor);
        // Eliminar el proovedor
        $proovedor->delete();
        
        return redirect()->route('proveedor-vista');
    }
    
    public function modificar(){

        return redirect()->route('proveedor-vista');
    }
}