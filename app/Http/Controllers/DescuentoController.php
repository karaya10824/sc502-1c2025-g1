<?php

namespace App\Http\Controllers;

use App\Models\Descuento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DescuentoController extends Controller{

    public function create(Request $request){
        // Validar los datos

        // Obtener todos los productos
        $Descuento = Descuento::create(['porcentaje_descuento' => $request->porcentaje_descuento,
        'codigo_de_descuento' => $request->codigo_de_descuento,
        'descripcion_descuento' => $request->descripcion_descuento,
        'fk_id_estado' => $request->fk_id_estado]);

        return redirect()->route('productos-vista');
    }

    public function eliminar($id_descuento){       
        // Buscar el producto
        $descuento = Descuento::find($id_descuento);
        // Eliminar el producto
        $descuento->delete();
        return redirect()->route('productos-vista');
    }

    public function modificar(Request $request, $id){
        // Buscar el producto en la base de datos
        $descuento = Descuento::find($id);

        // Actualizar los campos con los nuevos valores
        $descuento->porcentaje_descuento = $request->input('porcentaje_descuento');
        $descuento->codigo_de_descuento = $request->input('codigo_de_descuento');
        $descuento->descripcion_descuento = $request->input('descripcion_descuento');
        $descuento->fk_id_estado = $request->input('fk_id_estado');

        $descuento->save();
        return redirect()->route('productos-vista');
    }
}
