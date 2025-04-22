<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use Illuminate\Http\Request;
use App\Models\Gasto;
use App\Models\CategoriaGasto;
//use App\Models\*;
use Exception;
use Illuminate\Support\Facades\DB;

class GastoController extends Controller{
    public function index(){
        $Categorias = CategoriaGasto::all();
        $Gastos = Gasto::with('categoriagasto')->get();
        $active = "gasto";

        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('gasto.listado', compact('Gastos', 'Categorias', 'active'));
    }

    public function create(Request $request){
        $gasto = Gasto::create([
            'fecha_gasto' => $request->fecha_gasto,
            'descripcion_gasto' => $request->descripcion_gasto,
            'monto_gasto' => $request->monto_gasto,
            'fk_id_categoria_gasto' => $request->fk_id_categoria_gasto,
            'fk_id_estado' => 1,
        ]);

        return redirect()->route('gastos-vista');
    }

    public function vistaModificar(Request $request, $id_gasto){
        // Buscar el producto en la base de datos
        $gasto = Gasto::findOrFail($id_gasto);
        $categorias = CategoriaGasto::all();
        $active = "gasto";

        return view('gasto.modificar', ['Gasto' => $gasto, 'Categorias' => $categorias, 'active' => $active]);
        //return redirect()->route('productos-modificar-vista', compact('producto', 'categorias', 'active'));
    }

    public function modificar(Request $request, $id_gasto){
        $gasto = Gasto::findOrFail($id_gasto);

        $gasto->monto_gasto = $request->input('monto_gasto');
        $gasto->descripcion_gasto = $request->input('descripcion_gasto');
        $gasto->fecha_gasto = $request->input('fecha_gasto');
        if($request->input('fk_id_categoria_gasto') != null){
            $gasto->fk_id_categoria_gasto = $request->input('fk_id_categoria_gasto');
        }
        #$gasto->fk_id_estado =  $request->input('fk_id_estado');

        $gasto->save();

        return redirect()->route('gastos-vista');
    }

    public function eliminar($id_gasto){
        $gasto = Gasto::find($id_gasto);
        // Eliminar el producto
        $gasto->delete();

        return redirect()->route('gastos-vista');
    }
}