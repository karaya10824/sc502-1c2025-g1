<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Compra;
use App\Models\Proveedor;
use Illuminate\Http\Request;
//use App\Models\*;
use Exception;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller{
    public function index(){
        $Compra = Compra::obtenerComprasConProveedores();
        $active = "proveedor";

        return view('proveedor.listado', compact('Compra', 'active'));
    }

    public function create(Request $request){
        $compra = Compra::create([
            'fecha_compra' => $request->fecha_compra,
            'total_compra' => $request->total_compra,
            'detalle_compra' => $request->detalle_compra,
            'fk_id_proveedor' => $request->fk_id_proveedor,
            'fk_id_estado' => 1,
        ]);

        return redirect()->route('proveedor-vista');
    }

    public function eliminar($id_compra){
        // Buscar el proovedor
        $compra = Compra::find($id_compra);
        // Eliminar el proovedor
        $compra->delete();

        return redirect()->route('proveedor-vista');
    }
    
    public function modificar(){

        return view('proveedor.listado');
    }
}