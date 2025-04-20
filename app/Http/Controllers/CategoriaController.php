<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaController extends Controller{

    public function create(Request $request){
        // Validar los datos

        // Obtener todos los productos
        $categoria = CategoriaProducto::create(['nombre_categoria' => $request->nombre_categoria,
        'descripcion_categoria' => $request->descripcion_categoria,
        'fk_id_estado' => $request->fk_id_estado]);

        return redirect()->route('productos-vista');
    }

    public function eliminar($id_categoria){       
        // Buscar el producto
        $categoria = CategoriaProducto::find($id_categoria);
        // Eliminar el producto
        $categoria->delete();
        return redirect()->route('productos-vista');
    }

    public function modificar(Request $request, $id){
        // Buscar el producto en la base de datos
        $categoria = CategoriaProducto::findOrFail($id);

        // Actualizar los campos con los nuevos valores
        $categoria->nombre_categoria = $request->input('nombre_categoria');
        $categoria->descripcion_categoria = $request->input('descripcion_categoria');
        $categoria->fk_id_estado = $request->input('fk_id_estado');

        $categoria->save();
        return redirect()->route('productos-vista');
    }
}
