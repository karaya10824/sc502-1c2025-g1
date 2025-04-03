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

class PedidoController extends Controller{
    public function index(){
        // Obtener todos los productos
        $productos = Producto::all();
        $categorias = Categoria::all();
        $descuentos = Descuento::all();
        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('pedido.listado', ['Productos' => $productos, 'Categorias' => $categorias, 'Descuentos' => $descuentos]);
    }

    public function indexAdd(){
        // Obtener todos los productos
        //$productos = Producto::all();
        //$categorias = Categoria::all();
        //$descuentos = Descuento::all();
        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('pedido.agregar');
    }

    public function vista(){
        $user = auth()->guard('usuarios')->user();

        // Obtener todos los productos
        $productos = Producto::all();
        $categorias = Categoria::all();
        $descuentos = Descuento::all();

        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('pedido.agregar', ['Productos' => $productos, 'Categorias' => $categorias, 'Descuentos' => $descuentos]);
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
}
