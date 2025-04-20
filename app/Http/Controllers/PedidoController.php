<?php

namespace App\Http\Controllers;

use App\Models\Producto;
<<<<<<< HEAD
use App\Models\MetodoPago;
use App\Models\CategoriaProducto;
use App\Models\Descuento;
use App\Models\Pedido;
use App\Models\DetallePedido;
=======
use App\Models\Categoria;
use App\Models\Descuento;
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PDF;

class PedidoController extends Controller{
    public function index(){
        // Obtener todos los productos
        $productos = Producto::all();
<<<<<<< HEAD
        $categorias = CategoriaProducto::all();
        $descuentos = Descuento::all();
        $pedidos = Pedido::with(['detallePedido.producto.media', 'metodoPago'])->get();

        $active = "pedido";

        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('pedido.listado', ['Productos' => $productos, 'Categorias' => $categorias, 'Descuentos' => $descuentos, 'Pedidos' => $pedidos, 'active' => $active]);
    }

    public function vistaAgregar(){
        // Obtener todos los productos
        $productos = Producto::all();
        $categorias = CategoriaProducto::all();
        $descuentos = Descuento::all();
        $metodosPago = MetodoPago::all();
        $active = "pedido";
        
        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('pedido.agregar', ['Productos' => $productos, 'Categorias' => $categorias, 'Descuentos' => $descuentos, 'active' => $active, 'metodosPago' => $metodosPago]);
=======
        $categorias = Categoria::all();
        $descuentos = Descuento::all();
        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('pedido.listado', ['Productos' => $productos, 'Categorias' => $categorias, 'Descuentos' => $descuentos]);
    }

    public function indexAdd(){
        // Obtener todos los productos
        $productos = Producto::all();
        $categorias = Categoria::all();
        $descuentos = Descuento::all();
        
        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('pedido.agregar', ['Productos' => $productos, 'Categorias' => $categorias, 'Descuentos' => $descuentos]);
    }

    public function vista(){

        // Obtener todos los productos
        $productos = Producto::all();
        $categorias = Categoria::all();
        $descuentos = Descuento::all();

        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('pedido.agregar', ['Productos' => $productos, 'Categorias' => $categorias, 'Descuentos' => $descuentos]);
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
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

<<<<<<< HEAD
        $productos = json_decode($request->input('productos'), true);
        $cantidades = json_decode($request->input('cantidades'), true);
        $precios = json_decode($request->input('precios'), true);
        $descuentos = json_decode($request->input('descuentos'), true);
        
        $pedido = Pedido::create([
            'fecha_pedido' => $request->fecha_pedido,
            'subtotal_pedido' => 10000,//$request->subtotal_pedido,
            'total_pedido' => 100,//$request->total_pedido,
            'detalle_pedido' => $request->detalle_pedido,
            #'fk_id_cliente' => $request->fk_id_cliente,
            'fk_id_descuento' => $request->fk_id_descuento,
            'fk_id_metodo_de_pago' => $request->fk_id_metodo_de_pago,
            'fk_id_estado' => $request->fk_id_estado,
        ]);
        $idPedido = $pedido->id_pedido;

        foreach ($productos as $index => $productoId) {
            $cantidad = $cantidades[$index];
            $precio = $precios[$index];
            $descuento = $descuentos[$index];
            $detallePedidos = DetallePedido::create([
                'cantidad' => $cantidad,
                'subtotal' => $precio,
                'detalle' => $request->detalle_pedido,
                'fk_id_pedido' => $idPedido,
                'fk_id_producto' => $productoId,
            ]);
        }

        return redirect()->route('pedidos-vista');
    }
    public function vistaModificar($id_pedido){
        $active = "pedido";
        
        return view('pedido.modificar', compact('active'));    
    }

    public function eliminar($id_pedido){     
        $detallePedidos = DetallePedido::where('fk_id_pedido', $id_pedido)->get();

        foreach ($detallePedidos as $detallePedido) {
            $detallePedido->delete();
        }

        // Buscar el producto
        $pedido = Pedido::find($id_pedido);
        // Eliminar el producto
        $pedido->delete();

        return redirect()->route('pedidos-vista');
=======

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
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
    }
}
