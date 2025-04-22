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

    public function vistaModificar(Request $request, $id_compra){
        // Buscar el producto en la base de datos
        $compra = Compra::findOrFail($id_compra);
        $Proveedores = Proveedor::all();

        $active = "proveedor";

        return view('compra.modificar', ['Compra' => $compra, 'Proveedores' => $Proveedores, 'active' => $active]);
        //return redirect()->route('productos-modificar-vista', compact('producto', 'categorias', 'active'));
    }
    
    public function modificar(Request $request, $id_compra){
        $compra = Compra::findOrFail($id_compra);

        $compra->fecha_compra = $request->input('fecha_compra');
        $compra->total_compra = $request->input('total_compra');
        $compra->detalle_compra = $request->input('detalle_compra');
        if($request->input('fk_id_proveedor') != null){
            $compra->fk_id_proveedor = $request->input('fk_id_proveedor');
        }

        $compra->save();

        return redirect()->route('proveedor-vista');
    }
}