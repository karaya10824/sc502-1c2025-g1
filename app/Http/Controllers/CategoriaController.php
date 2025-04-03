<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaController extends Controller{

    public function create(Request $request){
        // Validar los datos
        /* $request->validate([
            'nombre_producto' => 'required',
            'descripcion' => 'required',
            'id_categoria' => 'required',
            'cantidad' => 'required',
            'imagen' => 'required',
            'precio_costo' => 'required',
            'precio_venta' => 'required',
            'precio_por_mayor' => 'required',
            'activo' => 'required'
        ]);*/

        // Obtener todos los productos
        $categoria = Categoria::create(['nombre_categoria' => $request->nombre_categoria,
        'descripcion_categoria' => $request->descripcion_categoria,
        'activo' => $request->activo]);

        return redirect('/producto');
    }

    public function destroy($id_categoria){       
        // Buscar el producto
        $categoria = Categoria::find($id_categoria);
        // Eliminar el producto
        $categoria->delete();
        return redirect('/producto');
    }

    public function update(Request $request, $id){
        // Buscar el producto en la base de datos
        $categoria = Categoria::findOrFail($id);

        // Actualizar los campos con los nuevos valores
        $categoria->nombre_categoria = $request->input('nombre_categoria');
        $categoria->descripcion_categoria = $request->input('descripcion_categoria');
        $categoria->activo = $request->input('activo');

        $categoria->save();
        return redirect('/producto');
    }
}
