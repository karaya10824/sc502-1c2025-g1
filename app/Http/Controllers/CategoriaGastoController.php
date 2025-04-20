<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
<<<<<<< HEAD
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

    public function modificar(Request $request, $id){
        // Buscar el producto en la base de datos
        $categoria = Categoria::findOrFail($id);

        // Actualizar los campos con los nuevos valores
        $categoria->nombre_categoria = $request->input('nombre_categoria');
        $categoria->descripcion_categoria = $request->input('descripcion_categoria');
        $categoria->activo = $request->input('activo');

        $categoria->save();
        return redirect('/producto');
    }
=======
//use App\Models\*;
use Exception;
use Illuminate\Support\Facades\DB;

class CategoriaGastoController extends Controller{

>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
}