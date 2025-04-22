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
            'fk_id_estado' => $request->fk_id_estado,
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

    public function vistaModificar(Request $request, $id_proveedor){
        // Buscar el producto en la base de datos
        $proovedor = Proveedor::findOrFail($id_proveedor);
        $active = "proveedor";

        return view('proveedor.modificar', ['Proveedor' => $proovedor, 'active' => $active]);
        //return redirect()->route('productos-modificar-vista', compact('producto', 'categorias', 'active'));
    }
    
    public function modificar(Request $request, $id_proveedor){
        $proovedor = Proveedor::findOrFail($id_proveedor);

        $proovedor->nombre_proveedor = $request->input('nombre_proveedor');
        $proovedor->direccion_proveedor = $request->input('direccion_proveedor');
        $proovedor->telefono_proveedor = $request->input('telefono_proveedor');
        $proovedor->correo_proveedor = $request->input('correo_proveedor');
        if($request->input('fk_id_estado') != null){
            $proovedor->fk_id_estado = $request->input('fk_id_estado');
        }


        $proovedor->save();

        return redirect()->route('proveedor-vista');
    }
}