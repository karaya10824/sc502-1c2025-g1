<?php

namespace App\Http\Controllers;

use App\Models\Descuento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DescuentoController extends Controller{

    public function create(Request $request){
        // Validar los datos
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
        // Buscar el producto
        $descuento = Descuento::find($id_descuento);
        // Eliminar el producto
        $descuento->delete();
        return redirect('/producto');
    }

    public function update(Request $request, $id){
        // Buscar el producto en la base de datos
        $descuento = Descuento::find($id);

        // Actualizar los campos con los nuevos valores
        $descuento->porcentaje = $request->input('porcentaje');
        $descuento->codigo_descuento = $request->input('codigo_descuento');
        $descuento->descripcion_descuento = $request->input('descripcion_descuento');
        $descuento->activo = $request->input('activo');

        $descuento->save();
        return redirect('/producto');
    }
}
