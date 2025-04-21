<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CategoriaProducto;
use App\Models\Descuento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use PDF;

class ProductoController extends Controller{
    public function index(){
        // Obtener todos los productos
        $productos = Producto::with(['media'])->get();
        $categorias = CategoriaProducto::all();
        $descuentos = Descuento::all();
        $active = "inventario";

        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('dashboard.Inventario', ['Productos' => $productos, 'Categorias' => $categorias, 'Descuentos' => $descuentos, 'active' => $active]);
    }

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
        $productos = Producto::create([
            'nombre_producto' => $request->nombre_producto,
            'descripcion_producto' => $request->descripcion_producto,
            'cantidad_producto' => $request->cantidad_producto,
            'precio_costo_producto' => $request->precio_costo_producto,
            'precio_venta_producto' => $request->precio_venta_producto,
            'precio_por_mayor_producto' => $request->precio_por_mayor_producto,
            'FK_id_categoria_prod' => 1,
            'FK_id_estado' => $request->fk_id_estado,
        ]);

        if ($request->hasFile('imagenes')) {
            $productos->addMultipleMediaFromRequest(['imagenes'])
                ->each(function ($fileAdder){
                    $fileAdder->toMediaCollection('productos');
                });
        }

        return redirect()->route('productos-vista');
    }

    public function eliminar($id_producto){       
        // Buscar el producto
        $producto = Producto::find($id_producto);
        // Eliminar el producto
        $producto->delete();
        return redirect()->route('productos-vista');
    }

    public function modificar(Request $request, $id){
        // Buscar el producto en la base de datos
        $producto = Producto::find($id);

        // Actualizar los campos con los nuevos valores
        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->descripcion_producto = $request->input('descripcion_producto');
        $producto->cantidad_producto = $request->input('cantidad_producto');
        $producto->precio_costo_producto = $request->input('precio_costo_producto');
        $producto->precio_venta_producto = $request->input('precio_venta_producto');
        $producto->precio_por_mayor_producto = $request->input('precio_por_mayor_producto');
        $producto->fk_id_estado =  $request->input('fk_id_estado');

        if ($request->hasFile('imagenes')) {
            $producto->clearMediaCollection();

            $producto->addMultipleMediaFromRequest(['imagenes'])
                ->each(function ($fileAdder){
                    $fileAdder->toMediaCollection('productos');
                });
        }

        $producto->save();
        return redirect()->route('productos-vista');
    }
}
