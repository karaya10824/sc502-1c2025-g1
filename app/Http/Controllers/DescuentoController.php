<?php

namespace App\Http\Controllers;

use App\Models\Descuento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DescuentoController extends Controller{

    public function create(Request $request){
        // Validar los datos
<<<<<<< HEAD

        // Obtener todos los productos
        $Descuento = Descuento::create(['porcentaje_descuento' => $request->porcentaje_descuento,
        'codigo_de_descuento' => $request->codigo_de_descuento,
        'descripcion_descuento' => $request->descripcion_descuento,
        'fk_id_estado' => $request->fk_id_estado]);

        return redirect()->route('productos-vista');
    }

    public function eliminar($id_descuento){       
=======
        /* $request->validate([
            'nombre_producto' => 'required',
            'descripcion' => 'required',
            'id_Descuento' => 'required',
            'cantidad' => 'required',
            'imagen' => 'required',
            'precio_costo' => 'required',
            'precio_venta' => 'required',
            'precio_por_mayor' => 'required',
            'activo' => 'required'
        ]);*/

        // Obtener todos los productos
        $Descuento = Descuento::create(['porcentaje' => $request->porcentaje,
        'codigo_descuento' => $request->codigo_descuento,
        'descripcion_descuento' => $request->descripcion_descuento,
        'activo' => $request->activo]);

        return redirect('/producto');
    }

    public function destroy($id_descuento){       
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
        // Buscar el producto
        $descuento = Descuento::find($id_descuento);
        // Eliminar el producto
        $descuento->delete();
<<<<<<< HEAD
        return redirect()->route('productos-vista');
    }

    public function modificar(Request $request, $id){
=======
        return redirect('/producto');
    }

    public function update(Request $request, $id){
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
        // Buscar el producto en la base de datos
        $descuento = Descuento::find($id);

        // Actualizar los campos con los nuevos valores
<<<<<<< HEAD
        $descuento->porcentaje_descuento = $request->input('porcentaje_descuento');
        $descuento->codigo_de_descuento = $request->input('codigo_de_descuento');
        $descuento->descripcion_descuento = $request->input('descripcion_descuento');
        $descuento->fk_id_estado = $request->input('fk_id_estado');

        $descuento->save();
        return redirect()->route('productos-vista');
=======
        $descuento->porcentaje = $request->input('porcentaje');
        $descuento->codigo_descuento = $request->input('codigo_descuento');
        $descuento->descripcion_descuento = $request->input('descripcion_descuento');
        $descuento->activo = $request->input('activo');

        $descuento->save();
        return redirect('/producto');
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
    }
}
