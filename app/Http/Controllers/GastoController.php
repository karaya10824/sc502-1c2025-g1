<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\Gasto;
use App\Models\CategoriaGasto;
=======
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
//use App\Models\*;
use Exception;
use Illuminate\Support\Facades\DB;

class GastoController extends Controller{
    public function index(){
<<<<<<< HEAD
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

    public function eliminar($id_gastos){
        $gasto = Gasto::find($id_gastos);
        // Eliminar el producto
        $gasto->delete();

        return redirect()->route('gastos-vista');
    }
    
    public function modificar(){

        return view('gasto.listado');
=======


        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('dashboard.Gastos');
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
    }
}