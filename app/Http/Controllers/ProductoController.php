<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Descuento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PDF;

class ProductoController extends Controller{


    public function index(){

        // Obtener todos los productos
        $productos = Producto::all();
        $categorias = Categoria::all();
        $descuentos = Descuento::all();

        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('dashboard.Inventario', ['Productos' => $productos, 'Categorias' => $categorias, 'Descuentos' => $descuentos]);
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


        // Subir la imagen
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
        } else {
            $imagenPath = null;
        }

        // Obtener todos los productos
        $productos = Producto::create([
            'nombre_producto' => $request->nombre_producto,
            'descripcion' => $request->descripcion,
            'id_categoria' => 4,
            'cantidad' => $request->cantidad,
            'imagen' => $request->imagen,
            'precio_costo' => $request->precio_costo,
            'precio_venta' => $request->precio_venta,
            'precio_por_mayor' => $request->precio_por_mayor,
            'activo' => $request->activo
        ]);

        return redirect('/producto');
    }

    public function destroy($id_producto){       
        // Buscar el producto
        $producto = Producto::find($id_producto);
        // Eliminar el producto
        $producto->delete();
        return redirect('/producto');
    }

    public function update(Request $request, $id){
        // Buscar el producto en la base de datos
        $producto = Producto::find($id);

        // Actualizar los campos con los nuevos valores
        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->descripcion = $request->input('descripcion');
        $producto->id_categoria = 4;
        $producto->cantidad = $request->input('cantidad');
        $producto->imagen = $request->input('imagen');
        $producto->precio_costo = $request->input('precio_costo');
        $producto->precio_venta = $request->input('precio_venta');
        $producto->precio_por_mayor = $request->input('precio_por_mayor');
        $producto->activo =  $request->input('activo');

        $producto->save();
        return redirect('/producto');
    }
}
