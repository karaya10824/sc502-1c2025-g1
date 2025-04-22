<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\CategoriaGasto;
use Illuminate\Http\Request;


class CategoriaGastoController extends Controller{
    public function create(Request $request){
        // Validar los datos

        // Obtener todos los productos
        $categoria = CategoriaGasto::create(['descripcion_categoria_gasto' => $request->descripcion_categoria_gasto,
        'fk_id_estado' => $request->fk_id_estado]);

        return redirect()->route('gastos-vista');
    }

    public function eliminar($id_categoria_gasto){       
        // Buscar el producto
        $categoria = CategoriaGasto::find($id_categoria_gasto);
        // Eliminar el producto
        $categoria->delete();
        return redirect()->route('gastos-vista');
    }

    public function vistaModificar(Request $request, $id){
        // Buscar el producto en la base de datos
        $categoria = CategoriaGasto::findOrFail($id);
        $active = "gasto";

        return view('categoria.gasto.modificar', ['Categoria' => $categoria, 'active' => $active]);
        //return redirect()->route('productos-modificar-vista', compact('producto', 'categorias', 'active'));
    }

    public function modificar(Request $request, $id){
        // Buscar el producto en la base de datos
        $categoria = CategoriaGasto::findOrFail($id);

        // Actualizar los campos con los nuevos valores
        $categoria->descripcion_categoria_gasto = $request->input('descripcion_categoria_gasto');
        if($request->input('fk_id_estado') != null){
            $categoria->fk_id_estado = $request->input('fk_id_estado');
        }

        $categoria->save();
        return redirect()->route('gastos-vista');
    }
}