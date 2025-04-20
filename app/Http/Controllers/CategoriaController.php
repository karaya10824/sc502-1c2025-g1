<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\CategoriaProducto;
=======
use App\Models\Categoria;
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaController extends Controller{

    public function create(Request $request){
        // Validar los datos
<<<<<<< HEAD

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
=======
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
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3

        // Actualizar los campos con los nuevos valores
        $categoria->nombre_categoria = $request->input('nombre_categoria');
        $categoria->descripcion_categoria = $request->input('descripcion_categoria');
<<<<<<< HEAD
        $categoria->fk_id_estado = $request->input('fk_id_estado');

        $categoria->save();
        return redirect()->route('productos-vista');
=======
        $categoria->activo = $request->input('activo');

        $categoria->save();
        return redirect('/producto');
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
    }
}
